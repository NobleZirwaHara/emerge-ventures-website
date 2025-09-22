<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords"
    content="Emerge Ventures, services, digital skills, entrepreneurship, co-working space, business development, Malawi">
  <meta name="description"
    content="Discover comprehensive services offered by Emerge Ventures - Digital Skills Training, Entrepreneurship Support, Co-Working Space and Business Development Services">
  <meta name="author" content="Emerge Ventures">

  <!-- site Favicon -->
  <link rel="icon" href="{{ asset('assets/img/favicon/favicon.png') }}" sizes="32x32">

  <!-- css Icon Font -->
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/msicons.min.css') }}">

  <!-- css All Plugins Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Main Style -->
  <link rel="stylesheet" id="main_style" href="{{ asset('assets/css/demo-1.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/standard-navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/somo-duka.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/newsletter.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/dg.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/somo.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/performance.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />


  <link rel="stylesheet" href="{{ asset('assets/css/slider-image.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

  <title>@yield('title') - Emerge Ventures</title>

  @yield('styles')
</head>

<body>
  <header>
      <!-- Standard Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
      <!-- Brand/Logo -->
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo/logov.png') }}" alt="Site Logo" height="45" class="critical-img">
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
            <a class="nav-link {{ url()->current() === url('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Route::is('services.*') || Route::is('team.*') || request()->is('contact') ? 'active' : '' }}" href="#">
              About Us
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ Route::is('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Other Services</a></li>
              <li><a class="dropdown-item {{ Route::is('team.*') ? 'active' : '' }}" href="{{ route('team.index') }}">Team</a></li>
              <li><a class="dropdown-item {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Route::is('digital-skills.*') || request()->is('entrepreneur-application') || request()->is('co-workspace') ? 'active' : '' }}" href="#">
              Get Involved
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ Route::is('digital-skills.*') ? 'active' : '' }}" href="{{ route('digital-skills.index') }}">Digital Skills</a></li>
              <li><a class="dropdown-item {{ request()->is('entrepreneur-application') ? 'active' : '' }}" href="{{ url('/entrepreneur-application') }}">Entrepreneur Application Form</a></li>
              <li><a class="dropdown-item {{ request()->is('co-workspace') ? 'active' : '' }}" href="{{ url('/co-workspace') }}">Creative Co-Workspace</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('entrepreneurs.*') || Route::is('full-profile') ? 'active' : '' }}" href="{{ route('entrepreneurs.index') }}">Discover Our Entrepreneurs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>

  <main>
    @yield('content')
  </main>

<footer class="ms-footer m-t-30">
    <div class="footer-container">
      <div class="footer-top padding-tb-60">
        <div class="container">
          <div class="row m-minus-991">
            <div class="col-sm-12 col-lg-3 ms-footer-cat">
              <div class="ms-footer-widget ms-footer-company">
                <img src="{{ asset('assets/img/logo/logov.png') }}" class="ms-footer-logo" alt="footer logo">
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
                      <li class="ms-footer-link ms-foo-location"><span><img src="{{ asset('assets/img/icons/foo-location.svg') }}"
                            class="svg_img foo_svg" alt=""></span>
                        <p>Emerge Hub - Mzuzu<br />
                          Kwawala House, First Floor<br />
                          P.O. Box 20094
                          Mzuzu, Malawi</p>
                      </li>
                      <li class="ms-footer-link ms-foo-call"><span><img src="{{ asset('assets/img/icons/foo-wp.svg') }}"
                            class="svg_img foo_svg" alt=""></span><a href="tel:+265881404393">+265 881 404 393</a>
                      </li>
                      <li class="ms-footer-link ms-foo-mail"><span><img src="{{ asset('assets/img/icons/foo-mail.svg') }}"
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
                    <ul class="align-items-center">
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
                    <li class="ms-footer-link"><a href="#">Bags</a></li>
                    <li class="ms-footer-link"><a href="#">Honey</a></li>
                    <li class="ms-footer-link"><a href="#">Flower Pots</a></li>
                    <li class="ms-footer-link"><a href="#">Body Scubs</a></li>
                    <li class="ms-footer-link"><a href="#">Powder</a></li>
                    <li class="ms-footer-link"><a href="#">Potraits</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-2 ms-footer-account">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Company</h4>
                <div class="ms-footer-links ms-footer-dropdown">
                  <ul class="align-items-center">
                    <li class="ms-footer-link"><a href="#">About us</a></li>
                    <li class="ms-footer-link"><a href="#">Delivery</a></li>
                    <li class="ms-footer-link"><a href="#">Secure payment</a></li>
                    <li class="ms-footer-link"><a href="#">Contact us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-2 ms-footer-service">
              <div class="ms-footer-widget">
                <h4 class="ms-footer-heading">Account</h4>
                <div class="ms-footer-links ms-footer-dropdown">
                  <ul class="align-items-center">
                    <li class="ms-footer-link"><a href="#">Sign In</a></li>
                    <li class="ms-footer-link"><a href="#">View Cart</a></li>
                    <li class="ms-footer-link"><a href="#">Become Entrepreneur</a></li>
                    <li class="ms-footer-link"><a href="#">Co-Workspaces</a></li>
                    <li class="ms-footer-link"><a href="#">Payments</a></li>
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
                  <div class="ms-copy">©<a class="site-name" href="{{ url('/') }}">Emerge Ventures
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


  <!-- Plugins JS -->
  <script src="{{ asset('assets/js/plugins/jquery-3.5.1.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main Js -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/demo-1.js') }}"></script>
  <script src="{{ asset('assets/js/standard-navbar.js') }}"></script>
  <script src="{{ asset('assets/js/product-zoom.js') }}"></script>
  <script src="{{ asset('assets/js/footer-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/lazy-loading.js') }}"></script>
  <script src="{{ asset('assets/js/performance-optimizer.js') }}"></script>
  <script src="{{ asset('assets/programs.js') }}"></script>

  @stack('scripts')
</body>

</html>
