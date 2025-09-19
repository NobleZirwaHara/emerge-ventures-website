<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="Emerge Ventures, checkout, payment, Malawi crafts">
  <meta name="description" content="Complete your purchase of authentic Malawian crafts and products from local entrepreneurs.">
  <meta name="author" content="Emerge Ventures">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- site Favicon -->
  <link rel="icon" href="assets/img/favicon/favicon.png" sizes="32x32">

  <!-- css Icon Font -->
  <link rel="stylesheet" href="assets/css/vendor/msicons.min.css">

  <!-- css All Plugins Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Main Style -->
  <link rel="stylesheet" id="main_style" href="assets/css/demo-1.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/css/standard-navbar.css">
  <link rel="stylesheet" href="assets/css/shop.css">
  <link rel="stylesheet" href="assets/css/contact.css">

  <title>Checkout - Emerge Ventures</title>
</head>

<body>
  <!-- Loader -->
  <div id="ms-overlay">
    <div class="loader"></div>
  </div>

  <!-- Standard Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
      <!-- Brand/Logo -->
      <a class="navbar-brand" href="/">
        <img src="assets/img/logo/logov.png" alt="Site Logo" height="45" class="critical-img">
      </a>

      <!-- Mobile menu toggle button -->
      <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <div class="hamburger-lines">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </div>
      </button>

      <!-- Navigation Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="fas fa-home me-1"></i>Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop">
              <i class="fas fa-store me-1"></i>Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">
              <i class="fas fa-envelope me-1"></i>Contact
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Checkout Section -->
  <section class="checkout-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
          
          <div class="checkout-header text-center mb-5">
            <h2>Checkout</h2>
            <p class="lead">Complete your order</p>
          </div>
          
          <div class="contact-wrapper">
            <div class="row g-0 align-items-stretch">
              <!-- Checkout Form -->
              <div class="col-lg-7">
                <div class="contact-form-card">
                  <div class="form-header">
                    <h3>Billing Information</h3>
                    <p>Please fill in your details to complete the order</p>
                  </div>

                  <form class="modern-form" id="checkoutForm">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                          <label for="firstName">First Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                          <label for="lastName">Last Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                          <label for="email">Email Address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                          <label for="phone">Phone Number</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" required>
                          <label for="address">Street Address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                          <label for="city">City</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="district" name="district" placeholder="District" required>
                          <label for="district">District</label>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <h5 class="mb-3">Payment Method</h5>
                        <div class="payment-methods mb-4">
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" value="cod" checked>
                            <label class="form-check-label" for="cashOnDelivery">
                              <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery
                            </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="mobileMoney" value="mobile">
                            <label class="form-check-label" for="mobileMoney">
                              <i class="fas fa-mobile-alt me-2"></i>Mobile Money (Airtel/TNM)
                            </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" value="bank">
                            <label class="form-check-label" for="bankTransfer">
                              <i class="fas fa-university me-2"></i>Bank Transfer
                            </label>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="orderNotes" name="orderNotes" style="height: 100px" placeholder="Order Notes (Optional)"></textarea>
                          <label for="orderNotes">Order Notes (Optional)</label>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <button type="submit" class="btn-modern-primary w-100">
                          <span>Place Order</span>
                          <i class="fas fa-check"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Order Summary -->
              <div class="col-lg-5">
                <div class="contact-info-card">
                  <div class="info-header">
                    <h4>Order Summary</h4>
                    <p>Review your items</p>
                  </div>

                  <div id="orderSummary" class="order-summary">
                    <!-- Order items will be loaded here -->
                  </div>

                  <div class="order-totals mt-4">
                    <div class="d-flex justify-content-between mb-2">
                      <span>Subtotal:</span>
                      <span id="subtotal">MWK 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>Delivery:</span>
                      <span class="text-success">Free</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                      <strong>Total:</strong>
                      <strong id="orderTotal">MWK 0</strong>
                    </div>
                  </div>

                  <div class="delivery-info mt-4">
                    <h6><i class="fas fa-truck me-2"></i>Delivery Information</h6>
                    <ul class="list-unstyled small">
                      <li>• Free delivery within Mzuzu</li>
                      <li>• Delivery within 2-3 business days</li>
                      <li>• Cash on delivery available</li>
                      <li>• Contact us for delivery outside Mzuzu</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Start -->
  <footer class="ms-footer m-t-30">
    <div class="footer-container">
      <div class="footer-top padding-tb-60">
        <div class="container">
          <div class="row m-minus-991">
            <div class="col-sm-12 col-lg-3 ms-footer-cat">
              <div class="ms-footer-widget ms-footer-company">
                <img src="assets/img/logo/logov.png" class="ms-footer-logo" alt="footer logo">
                <p class="ms-footer-detail">Emerge Ventures is the biggest market of innovative products. Get your daily needs from our Gift Shop.</p>
              </div>
            </div>
            <div class="col-sm-12 col-lg-3 ms-footer-cont-social">
              <div class="ms-footer-contact">
                <div class="ms-footer-widget">
                  <h4 class="ms-footer-heading">Contact</h4>
                  <div class="ms-footer-links ms-footer-dropdown">
                    <ul class="align-items-center">
                      <li class="ms-footer-link ms-foo-location"><span><img src="assets/img/icons/foo-location.svg"
                            class="svg_img foo_svg" alt=""></span>
                        <p>Emerge Hub - Mzuzu<br />
                          Kwawala House, First Floor<br />
                          P.O. Box 20094
                          Mzuzu, Malawi</p>
                      </li>
                      <li class="ms-footer-link ms-foo-call"><span><img src="assets/img/icons/foo-wp.svg"
                            class="svg_img foo_svg" alt=""></span><a href="tel:+265881404393">+265 881 404 393</a>
                      </li>
                      <li class="ms-footer-link ms-foo-mail"><span><img src="assets/img/icons/foo-mail.svg"
                            class="svg_img foo_svg" alt=""></span><a
                          href="mailto:hello@emergeventures.com">hello@emergeventures.com</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Secure Payment</h4>
                <p>We accept various payment methods for your convenience:</p>
                <div class="payment-icons">
                  <i class="fas fa-money-bill-wave me-3" title="Cash on Delivery"></i>
                  <i class="fas fa-mobile-alt me-3" title="Mobile Money"></i>
                  <i class="fas fa-university me-3" title="Bank Transfer"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="ms-bottom-info">
              <div class="footer-copy">
                <div class="footer-bottom-copy">
                  <div class="ms-copy">©<a class="site-name" href="index.html">Emerge Ventures 2025</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to top  -->
  <a class="ms-back-to-top"></a>

  <!-- Plugins JS -->
  <script src="assets/js/plugins/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main Js -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/demo-1.js"></script>
  <script src="assets/js/standard-navbar.js"></script>
  <script src="assets/js/lazy-loading.js"></script>
  <script src="assets/js/performance-optimizer.js"></script>
  <script src="assets/js/checkout.js"></script>
</body>

</html>