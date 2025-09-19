// Checkout JavaScript Functionality

// Get cart from localStorage
let cart = JSON.parse(localStorage.getItem('emergeCart')) || [];

// DOM Elements
const orderSummary = document.getElementById('orderSummary');
const subtotalElement = document.getElementById('subtotal');
const orderTotalElement = document.getElementById('orderTotal');
const checkoutForm = document.getElementById('checkoutForm');

// Initialize checkout page
document.addEventListener('DOMContentLoaded', function() {
  // Redirect to shop if cart is empty
  if (cart.length === 0) {
    alert('Your cart is empty. Redirecting to shop...');
    window.location.href = 'shop';
    return;
  }
  
  renderOrderSummary();
  setupEventListeners();
});

// Setup event listeners
function setupEventListeners() {
  if (checkoutForm) {
    checkoutForm.addEventListener('submit', handleCheckoutSubmit);
  }
  
  // Payment method change handlers
  const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]');
  paymentMethods.forEach(method => {
    method.addEventListener('change', handlePaymentMethodChange);
  });
}

// Render order summary
function renderOrderSummary() {
  if (!orderSummary) return;
  
  let summaryHTML = '';
  let subtotal = 0;
  
  cart.forEach(item => {
    const itemTotal = item.price * item.quantity;
    subtotal += itemTotal;
    
    summaryHTML += `
      <div class="order-item d-flex align-items-center mb-3">
        <img src="${item.image}" alt="${item.name}" class="order-item-image me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
        <div class="flex-grow-1">
          <h6 class="mb-1">${item.name}</h6>
          <small class="text-muted">Qty: ${item.quantity}</small>
        </div>
        <div class="text-end">
          <strong>MWK ${itemTotal.toLocaleString()}</strong>
        </div>
      </div>
    `;
  });
  
  orderSummary.innerHTML = summaryHTML;
  
  // Update totals
  if (subtotalElement) {
    subtotalElement.textContent = `MWK ${subtotal.toLocaleString()}`;
  }
  if (orderTotalElement) {
    orderTotalElement.textContent = `MWK ${subtotal.toLocaleString()}`;
  }
}

// Handle payment method change
function handlePaymentMethodChange(e) {
  const selectedMethod = e.target.value;
  
  // You can add specific handling for different payment methods here
  switch (selectedMethod) {
    case 'cod':
      // Cash on delivery - no additional fields needed
      break;
    case 'mobile':
      // Mobile money - could add phone number field
      break;
    case 'bank':
      // Bank transfer - could add bank details
      break;
  }
}

// Handle checkout form submission
function handleCheckoutSubmit(e) {
  e.preventDefault();
  
  // Get form data
  const formData = new FormData(checkoutForm);
  const orderData = {
    customer: {
      firstName: formData.get('firstName'),
      lastName: formData.get('lastName'),
      email: formData.get('email'),
      phone: formData.get('phone'),
      address: formData.get('address'),
      city: formData.get('city'),
      district: formData.get('district')
    },
    paymentMethod: formData.get('paymentMethod'),
    orderNotes: formData.get('orderNotes'),
    items: cart,
    total: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0),
    orderDate: new Date().toISOString(),
    orderId: generateOrderId()
  };
  
  // Validate form
  if (!validateCheckoutForm(orderData)) {
    return;
  }
  
  // Show loading state
  const submitButton = checkoutForm.querySelector('button[type="submit"]');
  const originalText = submitButton.innerHTML;
  submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
  submitButton.disabled = true;
  
  // Simulate order processing
  setTimeout(() => {
    processOrder(orderData);
  }, 200);
}

// Validate checkout form
function validateCheckoutForm(orderData) {
  const required = ['firstName', 'lastName', 'email', 'phone', 'address', 'city', 'district'];
  
  for (let field of required) {
    if (!orderData.customer[field] || orderData.customer[field].trim() === '') {
      showToast(`Please fill in the ${field.replace(/([A-Z])/g, ' $1').toLowerCase()}`, 'error');
      return false;
    }
  }
  
  // Validate email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(orderData.customer.email)) {
    showToast('Please enter a valid email address', 'error');
    return false;
  }
  
  // Validate phone
  const phoneRegex = /^[0-9+\-\s()]+$/;
  if (!phoneRegex.test(orderData.customer.phone)) {
    showToast('Please enter a valid phone number', 'error');
    return false;
  }
  
  return true;
}

// Process order
function processOrder(orderData) {
  try {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/api/orders', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': token
      },
      body: JSON.stringify(orderData)
    })
      .then(async (res) => {
        const body = await res.json().catch(() => ({}));
        if (!res.ok) {
          throw new Error(body.error || body.message || 'Failed to place order');
        }
        return body;
      })
      .then((data) => {
        // Clear cart on success
        localStorage.removeItem('emergeCart');
        // Reflect server order in the success screen
        const serverOrder = {
          ...orderData,
          orderId: data.order.order_number,
          total: data.order.total
        };
        showOrderSuccess(serverOrder);
      })
      .catch((error) => {
        console.error('Order processing error:', error);
        // Do not clear cart; show specific reason if present
        showToast(error.message || 'There was an error processing your order. Please adjust your cart.', 'error');
        const submitButton = checkoutForm.querySelector('button[type="submit"]');
        submitButton.innerHTML = '<span>Place Order</span><i class="fas fa-check"></i>';
        submitButton.disabled = false;
      });
  } catch (error) {
    console.error('Order processing error:', error);
    showToast('There was an error processing your order. Please try again.', 'error');
    const submitButton = checkoutForm.querySelector('button[type="submit"]');
    submitButton.innerHTML = '<span>Place Order</span><i class="fas fa-check"></i>';
    submitButton.disabled = false;
  }
}

// Show order success
function showOrderSuccess(orderData) {
  const paymentMethodText = {
    'cod': 'Cash on Delivery',
    'mobile': 'Mobile Money',
    'bank': 'Bank Transfer'
  };
  
  const successHTML = `
    <div class="order-success text-center py-5">
      <div class="success-icon mb-4">
        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
      </div>
      <h2 class="text-success mb-3">Order Placed Successfully!</h2>
      <p class="lead mb-4">Thank you for your order, ${orderData.customer.firstName}!</p>
      
      <div class="order-details bg-light p-4 rounded mb-4">
        <h5>Order Details</h5>
        <p><strong>Order ID:</strong> ${orderData.orderId}</p>
        <p><strong>Total:</strong> MWK ${orderData.total.toLocaleString()}</p>
        <p><strong>Payment Method:</strong> ${paymentMethodText[orderData.paymentMethod]}</p>
        <p><strong>Delivery Address:</strong> ${orderData.customer.address}, ${orderData.customer.city}, ${orderData.customer.district}</p>
      </div>
      
      <div class="next-steps mb-4">
        <h6>What happens next?</h6>
        <ul class="list-unstyled">
          <li>✓ We'll send you an order confirmation email</li>
          <li>✓ Your order will be prepared within 1-2 business days</li>
          <li>✓ We'll contact you to arrange delivery</li>
          <li>✓ Free delivery within Mzuzu (2-3 business days)</li>
        </ul>
      </div>
      
      <div class="action-buttons">
        <a href="shop" class="btn btn-primary me-3">Continue Shopping</a>
        <a href="/" class="btn btn-outline-primary">Back to Home</a>
      </div>
    </div>
  `;
  
  // Replace the entire checkout content with success message
  const container = document.querySelector('.checkout-section .container');
  container.innerHTML = successHTML;
  
  // Send confirmation email (simulation)
  sendOrderConfirmation(orderData);
}

// Generate order ID
function generateOrderId() {
  const timestamp = Date.now().toString();
  const random = Math.random().toString(36).substr(2, 5).toUpperCase();
  return `EV${timestamp.slice(-6)}${random}`;
}

// Send order confirmation (simulation)
function sendOrderConfirmation(orderData) {
  // In a real application, this would send an actual email
  console.log('Order confirmation sent to:', orderData.customer.email);
  console.log('Order data:', orderData);
  
  // Show toast notification
  setTimeout(() => {
    showToast('Order confirmation email sent!', 'success');
  }, 3000);
}

// Show toast message
function showToast(message, type = 'success') {
  // Remove existing toast
  const existingToast = document.querySelector('.toast-message');
  if (existingToast) {
    existingToast.remove();
  }
  
  // Create new toast
  const toast = document.createElement('div');
  toast.className = `toast-message ${type}`;
  toast.textContent = message;
  
  document.body.appendChild(toast);
  
  // Show toast
  setTimeout(() => toast.classList.add('show'), 100);
  
  // Hide toast after 4 seconds
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}

// Utility function to format currency
function formatCurrency(amount) {
  return `MWK ${amount.toLocaleString()}`;
}

// Auto-fill form for testing (remove in production)
function fillTestData() {
  if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
    document.getElementById('firstName').value = 'John';
    document.getElementById('lastName').value = 'Banda';
    document.getElementById('email').value = 'john.banda@example.com';
    document.getElementById('phone').value = '+265 881 234 567';
    document.getElementById('address').value = 'Area 10, Plot 123';
    document.getElementById('city').value = 'Mzuzu';
    document.getElementById('district').value = 'Mzimba';
  }
}

// Call fillTestData on development environments
document.addEventListener('DOMContentLoaded', function() {
  // Uncomment the line below for testing
  // fillTestData();
});