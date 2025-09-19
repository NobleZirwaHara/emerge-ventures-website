<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords"
    content="Emerge Ventures, shop, Malawi crafts, handmade products, local artisans, honey, bags, pottery, gifts">
  <meta name="description"
    content="Shop authentic Malawian crafts and products from local entrepreneurs. Support community artisans with handmade bags, organic honey, pottery, and unique gifts.">
  <meta name="author" content="Emerge Ventures">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- site Favicon -->
  <link rel="icon" href="assets/img/favicon/favicon.png" sizes="32x32">

  <!-- css Icon Font -->
  <link rel="stylesheet" href="assets/css/vendor/msicons.min.css">

  <!-- css All Plugins Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Main Style -->
  <link rel="stylesheet" id="main_style" href="assets/css/demo-1.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/css/standard-navbar.css">
  <link rel="stylesheet" href="assets/css/box.css">
  <link rel="stylesheet" href="assets/css/newsletter.css" />
  <link rel="stylesheet" href="assets/css/dg.css" />
  <link rel="stylesheet" href="assets/css/somo.css" />
  <link rel="stylesheet" href="assets/css/performance.css" />
  <link rel="stylesheet" href="assets/css/shop.css" />

  <link rel="stylesheet" href="assets/css/slider-image.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">

  <title>Shop - Emerge Ventures</title>
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
      <a class="navbar-brand" href="index">
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
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#">
              About Us
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="other-services.">Other Services</a></li>
              <li><a class="dropdown-item" href="our-team">Team</a></li>
              <li><a class="dropdown-item" href="Contact">Contact Us</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#">
              Get Involved
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="digital-skills">Digital Skills</a></li>
              <li><a class="dropdown-item" href="entrepreneur-application">Entrepreneurial Application Form</a>
              </li>
              <li><a class="dropdown-item" href="co-workspace">Creative Co-Workspace</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="shop">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="entrepreneurs">Discover Our Entrepreneurs</a>
          </li>
        </ul>

        <!-- Cart Icon -->
        <div class="navbar-nav ms-3">
          <a class="nav-link position-relative" href="#" id="cartToggle">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-badge" id="cartCount">0</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="shop-hero">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-8">
          <div class="hero-content">
            <h1 class="hero-title">Emerge Shop</h1>
            <p class="hero-subtitle">Discover authentic Malawian crafts and products made by local entrepreneurs</p>
            <div class="hero-features">
              <div class="feature-item">
                <i class="fas fa-shipping-fast"></i>
                <span>Free Delivery Around Mzuzu</span>
              </div>
              <div class="feature-item">
                <i class="fas fa-handshake"></i>
                <span>Support Local</span>
              </div>
              <div class="feature-item">
                <i class="fas fa-award"></i>
                <span>Quality Guaranteed</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Filter Section -->
  <section class="filter-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="filter-bar">
            <div class="filter-left">
              <h5 class="mb-0">Shop Products</h5>
              <span class="product-count" id="productCount">Showing all products</span>
            </div>
            <div class="filter-right">
              <div class="filter-controls">
                <select class="form-select filter-select" id="categoryFilter">
                  <option value="all">All Categories</option>
                  @forelse($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                  @empty
                    <option value="bags">Bags & Accessories</option>
                    <option value="honey">Honey & Food</option>
                    <option value="pottery">Pottery & Crafts</option>
                    <option value="beauty">Beauty Products</option>
                    <option value="art">Art & Portraits</option>
                  @endforelse
                </select>
                <select class="form-select filter-select" id="sortFilter">
                  <option value="default">Sort by</option>
                  <option value="price-low">Price: Low to High</option>
                  <option value="price-high">Price: High to Low</option>
                  <option value="name">Name: A to Z</option>
                  <option value="newest">Newest First</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Products Section -->
  <section class="products-section">
    <div class="container">
      <div class="row" id="productsGrid">
        <!-- Products will be dynamically loaded here -->
      </div>
    </div>
  </section>

  <!-- Cart Sidebar -->
  <div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
      <h5>Shopping Cart</h5>
      <button class="cart-close" id="cartClose">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="cart-body" id="cartBody">
      <div class="empty-cart">
        <i class="fas fa-shopping-cart"></i>
        <p>Your cart is empty</p>
      </div>
    </div>
    <div class="cart-footer" id="cartFooter" style="display: none;">
      <div class="cart-total">
        <strong>Total: MWK <span id="cartTotal">0</span></strong>
      </div>
      <button class="btn-checkout" onclick="proceedToCheckout()">
        Proceed to Checkout
      </button>
    </div>
  </div>

  <!-- Cart Overlay -->
  <div class="cart-overlay" id="cartOverlay"></div>

  <!-- Product Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Product Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBody">
          <!-- Product details will be loaded here -->
        </div>
      </div>
    </div>
  </div>

  <!-- # -->
  <section class="padding-tb-30">

  </section>
  <!-- Newsletter Section -->
  <section class="ms-african-section d-flex align-items-center justify-content-center">
    <div class="ms-content-box text-center">
      <div class="col-md-12">
        <div class="ms-newsletter">
          <div class="ms-newsletter-detail">
            <div class="ms-detail">
              <h4>Stay Updated</h4>
              <p>Get notified about new products and special offers</p>
            </div>
            <div class="ms-newsletter-form">
              <form>
                <input type="email" id="email" name="email" placeholder="Email Address"><br>
                <button class="ms-btn-2" type="submit" value="Submit"><img src="assets/icons/send.svg" class="svg_img"
                    alt="send"></button>
              </form>
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
                <p class="ms-footer-detail">Emerge Ventures is the biggest market of innovative
                  products. Get your daily
                  needs from our Gift Shop.</p>
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
              <div class="ms-footer-social">
                <div class="ms-footer-widget">
                  <div class="ms-footer-links ms-footer-dropdown">
                    <ul class="">
                      <li class="ms-footer-link"><a href="#"><i class="msicon msi-instagram" aria-hidden="true"></i></a>
                      </li>
                      <li class="ms-footer-link"><a href="#"><i class="msicon msi-twitter-square"
                            aria-hidden="true"></i></a></li>
                      <li class="ms-footer-link"><a href="#"><i class="msicon msi-facebook-square"
                            aria-hidden="true"></i></a></li>
                      <li class="ms-footer-link"><a href="#"><i class="msicon msi-linkedin-square"
                            aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-2 ms-footer-info">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Category</h4>
                <div class="ms-footer-links ms-footer-dropdown">
                  <ul class="align-items-center">
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('bags')">Bags</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('honey')">Honey</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('pottery')">Flower Pots</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('beauty')">Body Scrubs</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('beauty')">Powder</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="filterByCategory('art')">Portraits</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-2 ms-footer-account">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Company</h4>
                <div class="ms-footer-links ms-footer-dropdown">
                  <ul class="align-items-center">
                    <li class="ms-footer-link"><a href="index">About us</a></li>
                    <li class="ms-footer-link"><a href="#delivery-info">Delivery</a></li>
                    <li class="ms-footer-link"><a href="#payment-info">Secure payment</a></li>
                    <li class="ms-footer-link"><a href="Contact">Contact us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-2 ms-footer-service">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Account</h4>
                <div class="ms-footer-links ms-footer-dropdown">
                  <ul class="align-items-center">
                    <li class="ms-footer-link"><a href="#" onclick="showLoginModal()">Sign In</a></li>
                    <li class="ms-footer-link"><a href="#" onclick="toggleCart()">View Cart</a></li>
                    <li class="ms-footer-link"><a href="entrepreneur-application">Become Entrepreneur</a></li>
                    <li class="ms-footer-link"><a href="co-workspace">Co-Workspaces</a></li>
                    <li class="ms-footer-link"><a href="#payment-info">Payments</a></li>
                  </ul>
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
              <!-- Footer Copyright Start -->
              <div class="footer-copy">
                <div class="footer-bottom-copy ">
                  <div class="ms-copy">©<a class="site-name" href="index">Emerge Ventures
                      2025</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Area End -->

  <!-- Back to top  -->
  <a class="ms-back-to-top"></a>

  <!-- Plugins JS -->
  <script src="assets/js/plugins/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main Js -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/demo-1.js"></script>
  <script src="assets/js/standard-navbar.js"></script>
  <script src="assets/js/lazy-loading.js"></script>
  <script src="assets/js/performance-optimizer.js"></script>
  <script>
    // Pass Laravel data to JavaScript
    window.laravelData = {
      products: @json($productsData),
      categories: @json($categoriesData)
    };
  </script>
  <script src="assets/js/shop.js"></script>
</body>

</html>