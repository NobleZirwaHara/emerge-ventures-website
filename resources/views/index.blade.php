@extends('layouts.master')

@section('title', 'Home')

@section('content')
  <style>
    .program-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 30px;
      height: 100%;
    }

    .program-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .program-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .program-card .card-body {
      padding: 25px;
    }

    .program-card .card-title {
      color: #3B4167;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .program-card .card-text {
      color: #666;
      margin-bottom: 20px;
    }

    .program-features {
      margin: 60px 0;
    }

    .feature-box {
      text-align: center;
      padding: 30px 20px;
      background: #f9f9f9;
      border-radius: 10px;
      height: 100%;
      transition: all 0.3s ease;
    }

    .feature-box:hover {
      background: #3B4167;
      color: white;
      transform: translateY(-5px);
    }

    .feature-box i {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #4C808A;
    }

    .feature-box h4 {
      margin-bottom: 15px;
      font-weight: 600;
    }

    .btn-primary {
      background-color: #4C808A;
      border-color: #4C808A;
    }

    .btn-primary:hover {
      background-color: #3B4167;
      border-color: #3B4167;
    }

    .cta-section {
      background: linear-gradient(135deg, #4C808A 0%, #3B4167 100%);
      color: white;
      padding: 80px 0;
      text-align: center;
    }

    .btn-apply {
      background: #4C808A;
      color: white;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      border: none;
    }

    .btn-apply:hover {
      background: #3B4167;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .program-details {
      padding: 60px 0;
    }

    .detail-item {
      margin-bottom: 40px;
    }

    .detail-item h3 {
      color: #3B4167;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
    }

    .detail-item h3:after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 60px;
      height: 3px;
      background: #4C808A;
    }

    @media (max-width: 768px) {
      .page-hero h1 {
        font-size: 2.5rem;
      }

      .page-hero p {
        font-size: 1rem;
      }
    }
  </style>
<body>
  <!-- Loader -->
  <div id="ms-overlay">
    <div class="loader"></div>
  </div>

  <!-- Category sidebar Start -->
  <div class="ms-side-cat-overlay"></div>
  <!-- Hero Slider Start -->
  <section class="section ms-hero">
    <div class="ms-main-content">
      <!-- Hero Slider Start -->
      <div class="ms-slider-content">
        <div class="ms-main-slider">
          <div class="ms-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider  -->
            <div class="swiper-wrapper">
              <div class="ms-slide-item swiper-slide d-flex slide-1">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Our Vision</h1>
                  <div class="ms-slide-desc">
                    <p>A catalyst for creating and scaling the next generation of industry-defining enterprises across Africa.</p>
                    <!-- <a href="entrepreneurs.html" class="ms-btn-2">Discover<i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a> -->
                  </div>
                </div>
              </div>
              <div class="ms-slide-item swiper-slide d-flex slide-2">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Our Mission</h1>
                  <div class="ms-slide-desc">
                    <p>Investing in an innovative model creating new enterprises tackling key societal challenges whilst nurturing an entrepreneurial culture.</p>
                    <!-- <a href="shop.html" class="ms-btn-2">Shop Now <i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a> -->
                  </div>
                </div>
              </div>
              <div class="ms-slide-item swiper-slide d-flex slide-3">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Driving efficiency, innovation and growth</h1>
                  <!-- <div class="ms-slide-desc">
                    <p>Empower yourself with cutting-edge digital skills training programs designed to unlock
                      opportunities in the modern economy.</p>
                    <a href="digital-skills.html" class="ms-btn-2">Enroll Now<i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div> -->
                </div>
              </div>
              <!-- <div class="ms-slide-item swiper-slide d-flex slide-4">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Creative Co-Workspace</h1>
                  <div class="ms-slide-desc">
                    <p>Join our vibrant community of creators, innovators, and entrepreneurs in a collaborative
                      workspace designed for success.</p>
                    <a href="co-workspace.html" class="ms-btn-2">Book Now <i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Slider End -->

  
  <!-- Company Overview Section -->
  <section class="ms-product-tab padding-tb-60" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="company-overview-card">
            <div class="content">
              <div class="text-center mb-5">
                <h2 class="section-title">Company Overview</h2>
                <div class="title-underline"></div>
              </div>
              
              <div class="overview-content">
                <p class="lead-text">
                  Emerge Ventures is a for profit venture providing technology and innovation solutions for enterprises and corporations across Malawi and beyond to optimise their operational performance and digital transformation. We are driving efficiency, innovation and growth through our comprehensive suite of services.
                </p>
              </div>
              
              <div class="row mt-5">
                <div class="col-md-6 mb-4">
                  <div class="vision-mission-card vision-card">
                    <div class="card-icon">
                      <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>
                      A catalyst for creating and scaling the next generation of industry-defining enterprises across Africa.
                    </p>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="vision-mission-card mission-card">
                    <div class="card-icon">
                      <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>
                      Investing in an innovative model creating new enterprises tackling key societal challenges whilst nurturing an entrepreneurial culture.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .company-overview-card {
      background: white;
      border-radius: 20px;
      padding: 50px 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(76, 128, 138, 0.1);
      position: relative;
      overflow: hidden;
    }

    .company-overview-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #4C808A 0%, #3B4167 100%);
    }

    .section-title {
      color: #3B4167;
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 15px;
      position: relative;
    }

    .title-underline {
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, #4C808A 0%, #3B4167 100%);
      margin: 0 auto;
      border-radius: 2px;
    }

    .lead-text {
      font-size: 1.2rem;
      line-height: 1.8;
      color: #555;
      text-align: justify;
      margin-bottom: 0;
      padding: 30px 20px;
      background: rgba(76, 128, 138, 0.05);
      border-radius: 15px;
      border-left: 5px solid #4C808A;
    }

    .vision-mission-card {
      background: white;
      border-radius: 15px;
      padding: 30px 25px;
      height: 100%;
      transition: all 0.3s ease;
      border: 2px solid transparent;
      position: relative;
      overflow: hidden;
    }

    .vision-mission-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(76, 128, 138, 0.05) 0%, rgba(59, 65, 103, 0.05) 100%);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .vision-mission-card:hover::before {
      opacity: 1;
    }

    .vision-card {
      border-color: rgba(76, 128, 138, 0.2);
      box-shadow: 0 10px 30px rgba(76, 128, 138, 0.1);
    }

    .mission-card {
      border-color: rgba(59, 65, 103, 0.2);
      box-shadow: 0 10px 30px rgba(59, 65, 103, 0.1);
    }

    .vision-mission-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .vision-card:hover {
      border-color: #4C808A;
    }

    .mission-card:hover {
      border-color: #3B4167;
    }

    .card-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      font-size: 1.5rem;
      color: white;
    }

    .vision-card .card-icon {
      background: linear-gradient(135deg, #4C808A 0%, #5a9aa5 100%);
    }

    .mission-card .card-icon {
      background: linear-gradient(135deg, #3B4167 0%, #4a4f7a 100%);
    }

    .vision-mission-card h3 {
      color: #3B4167;
      font-weight: 600;
      margin-bottom: 15px;
      text-align: center;
      font-size: 1.4rem;
      position: relative;
      z-index: 1;
    }

    .vision-mission-card p {
      color: #666;
      line-height: 1.6;
      text-align: center;
      margin-bottom: 0;
      font-size: 1.05rem;
      position: relative;
      z-index: 1;
    }

    @media (max-width: 768px) {
      .company-overview-card {
        padding: 30px 20px;
        border-radius: 15px;
      }

      .section-title {
        font-size: 2rem;
      }

      .lead-text {
        font-size: 1.1rem;
        padding: 20px 15px;
      }

      .vision-mission-card {
        padding: 25px 20px;
        margin-bottom: 20px;
      }
    }
  </style>

  <!-- Business Model Section -->
  <section class="ms-service-section padding-tb-60" style="background-color: #f8f9fa;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb-5">
          <h2 style="color: #3B4167;">Our Business Model</h2>
          <p class="lead">Three core pillars driving our growth and innovation</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="feature-box">
            <i class="fas fa-seedling" style="color: #4C808A;"></i>
            <h4>Venture Building</h4>
            <p>Focused on agriculture, real estate and eco-tourism through integrated approaches and strategic investments.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="feature-box">
            <i class="fas fa-lightbulb" style="color: #4C808A;"></i>
            <h4>Technology & Innovation Hubs</h4>
            <p>Establishing centers of excellence that foster innovation and provide collaborative spaces for entrepreneurs.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="feature-box">
            <i class="fas fa-chart-line" style="color: #4C808A;"></i>
            <h4>Technology & Enterprise Consulting</h4>
            <p>Focused on productivity enhancement and digital transformation for enterprises and corporations.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Somo Duka Section -->
  <!-- <section id="products" class="slid-section productsSection">
    <div class="upper">
      <img alt="Product 1" data-src="assets/img/somo/5.png" class="lazy responsive-img">
      <img alt="Product 2" data-src="assets/img/somo/10.png" class="lazy responsive-img">
      <img alt="Product 4" data-src="assets/img/somo/4.png" class="lazy responsive-img">
      <img alt="Product 3" data-src="assets/img/somo/3.png" class="lazy responsive-img">
      <img alt="Product 5" data-src="assets/img/somo/2.png" class="lazy responsive-img">
    </div>
    <a class="shop" href="{{ url('/shop') }}">Shop at Emerge Shop</a>
    <div class="lower">
      <img alt="Product 6" data-src="assets/img/somo/11.png" class="lazy responsive-img">
      <img alt="Product 7" data-src="assets/img/somo/7.png" class="lazy responsive-img">
      <img alt="Product 8" data-src="assets/img/somo/12.png" class="lazy responsive-img">
    </div>
  </section> -->

  <!-- Co-working Space Section -->
  <!-- <section class="ms-coworking-section padding-tb-60">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="ms-coworking-content">
            <h2 class="ms-section-title">Creative Co-Workspace</h2>
            <p class="ms-section-subtitle">Where Innovation Meets Collaboration</p>
            <p class="ms-section-description">
              Our vibrant co-working space provides the perfect environment for entrepreneurs, freelancers, and creative
              professionals to thrive. With modern amenities, high-speed internet, and a supportive community
              atmosphere.
            </p>
            <div class="ms-coworking-amenities">
              <div class="ms-amenity-item">
                <i class="msicon msi-wifi"></i>
                <span>High-Speed Internet</span>
              </div>
              <div class="ms-amenity-item">
                <i class="msicon msi-coffee"></i>
                <span>Coffee & Refreshments</span>
              </div>
              <div class="ms-amenity-item">
                <i class="msicon msi-users"></i>
                <span>Meeting Rooms</span>
              </div>
              <div class="ms-amenity-item">
                <i class="msicon msi-print"></i>
                <span>Printing Services</span>
              </div>
              <div class="ms-amenity-item">
                <i class="msicon msi-shield"></i>
                <span>24/7 Security</span>
              </div>
              <div class="ms-amenity-item">
                <i class="msicon msi-calendar"></i>
                <span>Event Space</span>
              </div>
            </div>
            <div class="ms-pricing-info text-center">
              <div class="ms-price-item">
                <h4>Day Pass</h4>
                <span class="ms-price">MWK 2,000</span>
              </div>
              <div class="ms-price-item">
                <h4>Monthly</h4>
                <span class="ms-price">MWK 25,000</span>
              </div>
            </div>
            <div class="text-center">
              <a href="co-workspace.html" class="ms-btn-primary">Book Your Space</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="ms-coworking-gallery">
            <div class="ms-gallery-main">
              <img data-src="assets/img/Co-working_space/1.jpg" alt="Co-working Space"
                class="img-fluid rounded lazy responsive-img"
                style="border: 10px solid; border-image: url('assets/img/bg/63.jpg') 30 stretch;">
            </div>
            <div class="ms-gallery-thumbs">
              <img data-src="assets/img/Co-working_space/5.jpg" alt="Meeting Room"
                class="img-fluid rounded lazy responsive-img">
              <img data-src="assets/img/Co-working_space/4.jpg" alt="Lounge Area"
                class="img-fluid rounded lazy responsive-img">
              <img data-src="assets/img/Co-working_space/3.jpg" alt="Work Desk"
                class="img-fluid rounded lazy responsive-img">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Digital Skills Section -->
  <!-- <section class="py-5" style="background: linear-gradient(135deg, #4C808A 0%, #3B4167 100%);">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="mb-3" style="color: white;">Our Training Programs</h2>
        <p class="lead" style="color: white;">Choose from our range of digital skills training programs</p>
      </div>

      <div class="row">
        @if(isset($digitalSkills) && $digitalSkills->count() > 0)
          @foreach($digitalSkills as $skill)
          <div class="col-md-4">
              <div class="program-card">
                  <img src="{{ $skill->image }}" class="card-img-top" alt="{{ $skill->title }}">
                  <div class="card-body">
                      <h5 class="card-title">{{ $skill->title }}</h5>
                      <p class="card-text">{{ $skill->short_description }}</p>
                      @if(is_array($skill->learning_outcomes) && count($skill->learning_outcomes) > 0)
                          <ul class="list-unstyled">
                              @foreach(array_slice($skill->learning_outcomes, 0, 3) as $outcome)
                                  <li><i class="fas fa-check text-success me-2"></i> {{ $outcome }}</li>
                              @endforeach
                          </ul>
                      @endif
                      <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal"
                          data-bs-target="#programDetailsModal" data-program-id="{{ $skill->slug }}">Learn More</a>
                  </div>
              </div>
          </div>
          @endforeach
        @else
          <p class="text-white">No featured programs available at the moment. Please check back later.</p>
        @endif
      </div>
      <div class="text-center mt-5">
        <a href="{{ route('digital-skills.index') }}" class="btn btn-primary btn-lg rounded-pill px-5"
          style="background-color:#4C808A; border-color:#4C808A;">
          View More Courses
        </a>
      </div>
    </div>
  </section> -->


  <!-- Apply Modal -->
  <!-- <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="applyModalLabel">Apply for Digital Skills Training</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="trainingApplicationForm">
                      <div class="mb-3">
                          <label for="fullName" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="fullName" name="fullName" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email Address</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="phone" class="form-label">Phone Number</label>
                          <input type="tel" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="mb-3">
                          <label for="program" class="form-label">Program of Interest</label>
                          <select class="form-select" id="program" name="program" required>
                              <option value="" selected disabled>Select a program</option>
                              @if(isset($digitalSkills))
                                @foreach($digitalSkills as $skill)
                                    <option value="{{ $skill->slug }}">{{ $skill->title }}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="message" class="form-label">Why are you interested in this program?</label>
                          <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                      </div>
                      <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Submit Application</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div> -->
  <!-- Program Details Modal -->
  <!-- <div class="modal fade" id="programDetailsModal" tabindex="-1" aria-labelledby="programDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programDetailsModalLabel">Program Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> -->
                <!-- Content will be dynamically loaded -->
            <!-- </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-target="#applyModal" data-bs-toggle="modal" data-bs-dismiss="modal">Apply Now</button>
            </div>
        </div>
    </div>
  </div> -->

  <!-- Key Lessons & Next Steps Section -->
  <!-- <section class="padding-tb-60" style="background-color: #f8f9fa;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 style="color: #3B4167; margin-bottom: 20px;">Key Lessons Learnt</h3>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Team Competency</h5>
            <p>Most interventions require competent teams to ensure clear analysis of enterprise portfolio performance.</p>
          </div>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Investment Opportunities</h5>
            <p>Wide range of opportunities especially in equity investment with early stage enterprises across our focus sectors.</p>
          </div>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Financial Modeling</h5>
            <p>Building a strong financial model requires piloting initiatives to ensure evidence-based results for scaling.</p>
          </div>
        </div>
        <div class="col-md-6">
          <h3 style="color: #3B4167; margin-bottom: 20px;">Next Steps & Action Plan</h3>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Team Investment</h5>
            <p>Building a strong and competent team to drive our expansion initiatives.</p>
          </div>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Capital Requirements</h5>
            <p>Securing minimum of USD 50,000 as initial capital investment for scaling venture building through strategic investments.</p>
          </div>
          <div class="mb-4">
            <h5 style="color: #4C808A;">Portfolio Development</h5>
            <p>Identifying up to 3 early stage enterprises for equity investment positioning, both short-term and long-term opportunities.</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Call to Action Section -->
  <section class="cta-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <h2 class="mb-4">Join Us in Building the Future</h2>
          <p class="lead mb-4">
            Partner with Emerge Ventures as we strive to emerge and build ventures whilst nurturing an entrepreneurial culture across Africa. Together, we can create industry-defining enterprises that tackle key societal challenges.
          </p>
          <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
              <a href="{{ route('contact.index') }}" class="btn btn-apply w-100">Partner With Us</a>
            </div>
            <div class="col-md-4 mb-3">
              <a href="#" class="btn btn-apply w-100" style="background: transparent; border: 2px solid white;">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <!-- <section class="ms-african-section d-flex align-items-center justify-content-center">
    <div class="ms-content-box text-center">
      <div class="col-md-12">
        <div class="ms-newsletter">
          <div class="ms-newsletter-detail">
            <div class="ms-detail">
              <h4>Stay Connected</h4>
              <p>Get updates on our latest ventures, opportunities, and success stories</p>
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
  </section> -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var programDetailsModal = document.getElementById('programDetailsModal');
    if (programDetailsModal) {
        programDetailsModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var slug = button.getAttribute('data-program-id');
            var modalTitle = programDetailsModal.querySelector('.modal-title');
            var modalBody = programDetailsModal.querySelector('.modal-body');

            // Show a loading state
            modalTitle.textContent = 'Loading...';
            modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>';

            // Fetch the program details
            fetch('/api/digital-skills/' + slug)
                .then(response => response.json())
                .then(data => {
                    modalTitle.textContent = data.title;

                    let featuresHtml = data.features && data.features.length > 0
                        ? '<h5>Key Features</h5><ul>' + data.features.map(item => `<li>${item}</li>`).join('') + '</ul>'
                        : '';

                    let prerequisitesHtml = data.prerequisites && data.prerequisites.length > 0
                        ? '<h5>Prerequisites</h5><ul>' + data.prerequisites.map(item => `<li>${item}</li>`).join('') + '</ul>'
                        : '';

                    let outcomesHtml = data.learning_outcomes && data.learning_outcomes.length > 0
                        ? '<h5>Learning Outcomes</h5><ul>' + data.learning_outcomes.map(item => `<li>${item}</li>`).join('') + '</ul>'
                        : '';

                    modalBody.innerHTML = `
                        <img src="${data.image}" alt="${data.title}" class="img-fluid rounded mb-3">
                        <p class="lead">${data.short_description}</p>
                        <p>${data.description}</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">${prerequisitesHtml}</div>
                            <div class="col-md-6">${outcomesHtml}</div>
                        </div>
                        <hr>
                        ${featuresHtml}
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span><strong>Level:</strong> ${data.level}</span>
                            <span><strong>Duration:</strong> ${data.duration_hours} hours</span>
                            <span><strong>Price:</strong> MWK ${Number(data.price).toLocaleString()}</span>
                        </div>
                    `;

                    // Also update the apply modal's dropdown
                    var applyModalProgramSelect = document.querySelector('#applyModal #program');
                    if (applyModalProgramSelect) {
                        applyModalProgramSelect.value = slug;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    modalTitle.textContent = 'Error';
                    modalBody.innerHTML = '<p>Could not load program details. Please try again later.</p>';
                });
        });
    }
});
</script>
@endpush
</body>
@endsection