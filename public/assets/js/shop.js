// Shop JavaScript Functionality

// Product Data - Load from Laravel
let products = [];

// Load products from Laravel data
if (window.laravelData && window.laravelData.products) {
  products = window.laravelData.products;
} else {
  // Fallback to fetch from API if Laravel data not available
  fetch('/api/products')
    .then(response => response.json())
    .then(data => {
      products = data.products;
      renderProducts(products);
      updateCartUI();
    })
    .catch(error => {
      console.error('Error loading products:', error);
    });
}

// Cart functionality
let cart = JSON.parse(localStorage.getItem('emergeCart')) || [];

// DOM Elements
const productsGrid = document.getElementById('productsGrid');
const cartSidebar = document.getElementById('cartSidebar');
const cartOverlay = document.getElementById('cartOverlay');
const cartCount = document.getElementById('cartCount');
const cartBody = document.getElementById('cartBody');
const cartFooter = document.getElementById('cartFooter');
const cartTotal = document.getElementById('cartTotal');
const categoryFilter = document.getElementById('categoryFilter');
const sortFilter = document.getElementById('sortFilter');
const productCount = document.getElementById('productCount');

// Initialize shop
document.addEventListener('DOMContentLoaded', function() {
  // Wait for Laravel data to be available
  if (products.length > 0) {
    renderProducts(products);
    updateCartUI();
    setupEventListeners();
  } else {
    // Fallback: try to load from API
    setTimeout(() => {
      if (products.length === 0) {
        fetch('/api/products')
          .then(response => response.json())
          .then(data => {
            products = data.products;
            renderProducts(products);
            updateCartUI();
            setupEventListeners();
          })
          .catch(error => {
            console.error('Error loading products:', error);
            setupEventListeners();
          });
      }
    }, 100);
  }
});

// Setup event listeners
function setupEventListeners() {
  // Cart toggle
  document.getElementById('cartToggle').addEventListener('click', toggleCart);
  document.getElementById('cartClose').addEventListener('click', toggleCart);
  document.getElementById('cartOverlay').addEventListener('click', toggleCart);
  
  // Filters
  categoryFilter.addEventListener('change', filterProducts);
  sortFilter.addEventListener('change', sortProducts);
  
  // Prevent cart sidebar from closing when clicking inside
  cartSidebar.addEventListener('click', function(e) {
    e.stopPropagation();
  });
}

// Render products
function renderProducts(productsToRender) {
  if (!productsGrid) return;
  
  productsGrid.innerHTML = '';
  
  if (productsToRender.length === 0) {
    productsGrid.innerHTML = `
      <div class="col-12 text-center py-5">
        <h4>No products found</h4>
        <p>Try adjusting your filters or search criteria.</p>
      </div>
    `;
    return;
  }
  
  productsToRender.forEach(product => {
    const productCard = createProductCard(product);
    productsGrid.appendChild(productCard);
  });
  
  // Initialize lazy loading for new images
  initializeLazyLoading();
  
  // Update product count
  updateProductCount(productsToRender.length);
}

// Create product card
function createProductCard(product) {
  const col = document.createElement('div');
  col.className = 'col-lg-4 col-md-6 col-sm-12 mb-4';
  
  const discountPercentage = product.originalPrice ? 
    Math.round(((product.originalPrice - product.price) / product.originalPrice) * 100) : 0;
  
  col.innerHTML = `
    <div class="product-card fade-in">
      <div class="product-image">
        <img data-src="${product.image}" alt="${product.name}" class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='200'%3E%3Crect width='100%25' height='100%25' fill='%23f0f0f0'/%3E%3C/svg%3E">
        ${product.badge ? `<div class="product-badge">${product.badge}</div>` : ''}
        <div class="product-actions">
          <button class="action-btn" onclick="quickView(${product.id})" title="Quick View">
            <i class="fas fa-eye"></i>
          </button>
          <button class="action-btn" onclick="addToWishlist(${product.id})" title="Add to Wishlist">
            <i class="fas fa-heart"></i>
          </button>
        </div>
      </div>
      <div class="product-info">
        <div class="product-category">${getCategoryName(product.category)}</div>
        <h5 class="product-title">${product.name}</h5>
        <p class="product-description">${product.description.substring(0, 80)}...</p>
        <div class="product-price">
          <span class="price">MWK ${product.price.toLocaleString()}</span>
          ${product.originalPrice ? `<span class="original-price">MWK ${product.originalPrice.toLocaleString()}</span>` : ''}
        </div>
        <div class="product-footer">
          <button class="btn-add-cart" onclick="addToCart(${product.id})">
            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
          </button>
          <button class="btn-quick-view" onclick="quickView(${product.id})">
            View Details
          </button>
        </div>
      </div>
    </div>
  `;
  
  return col;
}

// Get category display name
function getCategoryName(category) {
  const categoryNames = {
    'bags': 'Bags & Accessories',
    'honey': 'Honey & Food',
    'pottery': 'Pottery & Crafts',
    'beauty': 'Beauty Products',
    'art': 'Art & Portraits'
  };
  return categoryNames[category] || category;
}

// Add to cart
function addToCart(productId) {
  const product = products.find(p => p.id === productId);
  if (!product) return;
  // Enforce stock limits
  if (product.manageStock) {
    const existing = cart.find(item => item.id === productId);
    const currentQty = existing ? existing.quantity : 0;
    if (currentQty + 1 > product.stockQuantity) {
      showToast('Not enough stock available', 'error');
      return;
    }
  }
  
  const existingItem = cart.find(item => item.id === productId);
  
  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      ...product,
      quantity: 1
    });
  }
  
  saveCart();
  updateCartUI();
  showToast(`${product.name} added to cart!`, 'success');
  
  // Add animation to cart icon
  const cartIcon = document.getElementById('cartToggle');
  cartIcon.classList.add('bounce-in');
  setTimeout(() => cartIcon.classList.remove('bounce-in'), 600);
}

// Remove from cart
function removeFromCart(productId) {
  cart = cart.filter(item => item.id !== productId);
  saveCart();
  updateCartUI();
  showToast('Item removed from cart', 'success');
}

// Update quantity
function updateQuantity(productId, newQuantity) {
  if (newQuantity <= 0) {
    removeFromCart(productId);
    return;
  }
  
  const item = cart.find(item => item.id === productId);
  if (item) {
    // Enforce stock limits
    const product = products.find(p => p.id === productId);
    if (product && product.manageStock && newQuantity > product.stockQuantity) {
      showToast('Quantity exceeds available stock', 'error');
      newQuantity = product.stockQuantity;
    }
    item.quantity = newQuantity;
    saveCart();
    updateCartUI();
  }
}

// Save cart to localStorage
function saveCart() {
  localStorage.setItem('emergeCart', JSON.stringify(cart));
}

// Update cart UI
function updateCartUI() {
  // Update cart count
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  if (cartCount) {
    cartCount.textContent = totalItems;
    cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
  }
  
  // Update cart body
  if (cartBody) {
    if (cart.length === 0) {
      cartBody.innerHTML = `
        <div class="empty-cart">
          <i class="fas fa-shopping-cart"></i>
          <p>Your cart is empty</p>
        </div>
      `;
      cartFooter.style.display = 'none';
    } else {
      cartBody.innerHTML = cart.map(item => createCartItem(item)).join('');
      cartFooter.style.display = 'block';
      
      // Initialize lazy loading for cart images
      setTimeout(() => initializeLazyLoading(), 50);
      
      // Update total
      const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
      if (cartTotal) {
        cartTotal.textContent = total.toLocaleString();
      }
    }
  }
}

// Create cart item HTML
function createCartItem(item) {
  return `
    <div class="cart-item">
      <div class="cart-item-image">
        <img data-src="${item.image}" alt="${item.name}" class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Crect width='100%25' height='100%25' fill='%23f0f0f0'/%3E%3C/svg%3E">
      </div>
      <div class="cart-item-info">
        <div class="cart-item-title">${item.name}</div>
        <div class="cart-item-price">MWK ${item.price.toLocaleString()}</div>
        <div class="quantity-controls">
          <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">
            <i class="fas fa-minus"></i>
          </button>
          <input type="number" class="quantity-input" value="${item.quantity}" 
                 onchange="updateQuantity(${item.id}, parseInt(this.value))" min="1">
          <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">
            <i class="fas fa-plus"></i>
          </button>
          <button class="remove-item" onclick="removeFromCart(${item.id})" title="Remove item">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
    </div>
  `;
}

// Toggle cart sidebar
function toggleCart() {
  cartSidebar.classList.toggle('active');
  cartOverlay.classList.toggle('active');
  document.body.style.overflow = cartSidebar.classList.contains('active') ? 'hidden' : '';
}

// Filter products
function filterProducts() {
  const selectedCategory = categoryFilter.value;
  let filteredProducts = selectedCategory === 'all' ? 
    products : products.filter(product => product.category === selectedCategory);
  
  // Apply current sort
  filteredProducts = applySorting(filteredProducts);
  renderProducts(filteredProducts);
}

// Filter by category (for footer links)
function filterByCategory(category) {
  categoryFilter.value = category;
  filterProducts();
  
  // Scroll to products section
  document.querySelector('.products-section').scrollIntoView({ 
    behavior: 'smooth' 
  });
}

// Sort products
function sortProducts() {
  const currentProducts = getCurrentFilteredProducts();
  const sortedProducts = applySorting(currentProducts);
  renderProducts(sortedProducts);
}

// Apply sorting
function applySorting(productsArray) {
  const sortValue = sortFilter.value;
  
  switch (sortValue) {
    case 'price-low':
      return [...productsArray].sort((a, b) => a.price - b.price);
    case 'price-high':
      return [...productsArray].sort((a, b) => b.price - a.price);
    case 'name':
      return [...productsArray].sort((a, b) => a.name.localeCompare(b.name));
    case 'newest':
      return [...productsArray].sort((a, b) => b.id - a.id);
    default:
      return productsArray;
  }
}

// Get currently filtered products
function getCurrentFilteredProducts() {
  const selectedCategory = categoryFilter.value;
  return selectedCategory === 'all' ? 
    products : products.filter(product => product.category === selectedCategory);
}

// Update product count display
function updateProductCount(count) {
  if (productCount) {
    const selectedCategory = categoryFilter.value;
    const categoryText = selectedCategory === 'all' ? 'all products' : getCategoryName(selectedCategory);
    productCount.textContent = `Showing ${count} ${categoryText}`;
  }
}

// Quick view modal
function quickView(productId) {
  const product = products.find(p => p.id === productId);
  if (!product) return;
  
  const modalBody = document.getElementById('modalBody');
  const modalLabel = document.getElementById('productModalLabel');
  
  modalLabel.textContent = product.name;
  
  modalBody.innerHTML = `
    <div class="row">
      <div class="col-md-6">
        <img data-src="${product.image}" alt="${product.name}" class="modal-product-image lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect width='100%25' height='100%25' fill='%23f0f0f0'/%3E%3C/svg%3E">
      </div>
      <div class="col-md-6">
        <div class="modal-product-info">
          <h4>${product.name}</h4>
          <div class="modal-product-price">
            MWK ${product.price.toLocaleString()}
            ${product.originalPrice ? `<small class="original-price ms-2">MWK ${product.originalPrice.toLocaleString()}</small>` : ''}
          </div>
          <p class="modal-product-description">${product.description}</p>
          <div class="mb-3">
            <strong>Category:</strong> ${getCategoryName(product.category)}
          </div>
          <div class="mb-3">
            <strong>Entrepreneur:</strong> ${product.entrepreneur}
          </div>
          <div class="mb-3">
            <strong>Availability:</strong> 
            <span class="text-success">${product.inStock ? 'In Stock' : 'Out of Stock'}</span>
          </div>
          <button class="modal-add-to-cart" onclick="addToCart(${product.id}); bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();">
            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
          </button>
        </div>
      </div>
    </div>
  `;
  
  // Show modal
  const modal = new bootstrap.Modal(document.getElementById('productModal'));
  modal.show();
  
  // Initialize lazy loading for modal image
  setTimeout(() => initializeLazyLoading(), 100);
}

// Add to wishlist (placeholder)
function addToWishlist(productId) {
  const product = products.find(p => p.id === productId);
  if (product) {
    showToast(`${product.name} added to wishlist!`, 'success');
  }
}

// Proceed to checkout
function proceedToCheckout() {
  if (cart.length === 0) {
    showToast('Your cart is empty!', 'error');
    return;
  }
  
  // Show loading message
  showToast('Redirecting to checkout...', 'success');
  
  // Redirect to checkout page
  setTimeout(() => {
    window.location.href = 'checkout';
  }, 1000);
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
  
  // Hide toast after 3 seconds
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// Show login modal (placeholder)
function showLoginModal() {
  showToast('Login functionality would be implemented here', 'success');
}

// Search functionality (can be added later)
function searchProducts(query) {
  const filteredProducts = products.filter(product => 
    product.name.toLowerCase().includes(query.toLowerCase()) ||
    product.description.toLowerCase().includes(query.toLowerCase()) ||
    product.entrepreneur.toLowerCase().includes(query.toLowerCase())
  );
  renderProducts(filteredProducts);
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
  // Press 'C' to toggle cart
  if (e.key === 'c' || e.key === 'C') {
    if (!e.target.matches('input, textarea')) {
      toggleCart();
    }
  }
  
  // Press 'Escape' to close cart
  if (e.key === 'Escape') {
    if (cartSidebar.classList.contains('active')) {
      toggleCart();
    }
  }
});

// Initialize lazy loading for new images
function initializeLazyLoading() {
  // Use the global lazy loader if available
  if (window.lazyLoader) {
    const newImages = document.querySelectorAll('img.lazy:not([data-observed])');
    newImages.forEach(img => {
      img.setAttribute('data-observed', 'true');
      window.lazyLoader.addImage(img);
    });
  }
}

// Initialize lazy loading after DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  // Wait for lazy loader to be available
  setTimeout(() => {
    initializeLazyLoading();
  }, 100);
});

// Export functions for global access
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;
window.updateQuantity = updateQuantity;
window.toggleCart = toggleCart;
window.quickView = quickView;
window.addToWishlist = addToWishlist;
window.proceedToCheckout = proceedToCheckout;
window.filterByCategory = filterByCategory;
window.showLoginModal = showLoginModal;