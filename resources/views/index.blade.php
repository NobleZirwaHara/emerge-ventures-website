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
                  <h1 class="ms-slide-title">Our Entrepreneurs</h1>
                  <div class="ms-slide-desc">
                    <p>Discover inspiring stories of young innovators transforming communities across Malawi through
                      sustainable enterprises and creative solutions.</p>
                    <a href="entrepreneurs.html" class="ms-btn-2">Discover<i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="ms-slide-item swiper-slide d-flex slide-2">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Gift Shop</h1>
                  <div class="ms-slide-desc">
                    <p>Support local artisans and entrepreneurs by shopping authentic Malawian crafts, organic products,
                      and handmade treasures.</p>
                    <a href="shop.html" class="ms-btn-2">Shop Now <i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="ms-slide-item swiper-slide d-flex slide-3">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Digital Skills</h1>
                  <div class="ms-slide-desc">
                    <p>Empower yourself with cutting-edge digital skills training programs designed to unlock
                      opportunities in the modern economy.</p>
                    <a href="digital-skills.html" class="ms-btn-2">Enroll Now<i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="ms-slide-item swiper-slide d-flex slide-4">
                <div class="ms-slide-content slider-animation">
                  <h1 class="ms-slide-title">Creative Co-Workspace</h1>
                  <div class="ms-slide-desc">
                    <p>Join our vibrant community of creators, innovators, and entrepreneurs in a collaborative
                      workspace designed for success.</p>
                    <a href="co-workspace.html" class="ms-btn-2">Book Now <i class="msicon msi-angle-double-right"
                        aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
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
  <section class="ms-product-tab padding-tb-30">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="box mission-box">
            <div class="content">
              <h2>Who We Are</h2>
              <p style="text-align: justify; font-size: 1.2rem;">Emerge Ventures is a subsidiary of Emerge Livelihoods
                (formerly Mzuzu-e Hub Emerge Livelihoods), established to amplify youth-driven private
                enterprises as a catalyst for socio-economic development in Malawi.
              </p>
              <h2 style="margin-top: 20px;">Our Mission</h2>
              <p style="text-align: justify; font-size: 1.2rem;">We aim to empower youth through innovative enterprise
                development and access to market opportunities across Malawi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Somo Duka Section -->
  <section id="products" class="slid-section productsSection">
    <div class="upper">
      <img alt="Product 1" data-src="assets/img/somo/5.png" class="lazy responsive-img">
      <img alt="Product 2" data-src="assets/img/somo/10.png" class="lazy responsive-img">
      <img alt="Product 4" data-src="assets/img/somo/4.png" class="lazy responsive-img">
      <img alt="Product 3" data-src="assets/img/somo/3.png" class="lazy responsive-img">
      <img alt="Product 5" data-src="assets/img/somo/2.png" class="lazy responsive-img">
    </div>
    <a class="shop" href="shop.html">Shop at Emerge Shop</a>
    <div class="lower">
      <img alt="Product 6" data-src="assets/img/somo/11.png" class="lazy responsive-img">
      <img alt="Product 7" data-src="assets/img/somo/7.png" class="lazy responsive-img">
      <img alt="Product 8" data-src="assets/img/somo/12.png" class="lazy responsive-img">
    </div>
  </section>

  <!-- Co-working Space Section -->
  <section class="ms-coworking-section padding-tb-60">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="ms-coworking-content">
            <h2 class="ms-section-title">Creative Co-Workspace</h2>
            <!-- <p class="ms-section-subtitle">Where Innovation Meets Collaboration</p> -->
            <!-- <p class="ms-section-description">
              Our vibrant co-working space provides the perfect environment for entrepreneurs, freelancers, and creative
              professionals to thrive. With modern amenities, high-speed internet, and a supportive community
              atmosphere.
            </p> -->
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
  </section>

  <!-- Digital Skills Section -->
  <section class="py-5" style="background: linear-gradient(135deg, #4C808A 0%, #3B4167 100%);">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="mb-3" style="color: white;">Our Training Programs</h2>
        <p class="lead" style="color: white;">Choose from our range of digital skills training programs</p>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="program-card">
            <img src="assets/img/digital-skills/IMG-11.jpg" class="card-img-top" alt="Basic Digital Literacy">
            <div class="card-body">
              <h5 class="card-title">Basic Digital Literacy</h5>
              <p class="card-text">Learn essential computer and internet skills to navigate the digital world with
                confidence.</p>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success me-2"></i> Computer fundamentals</li>
                <li><i class="fas fa-check text-success me-2"></i> Internet basics</li>
                <li><i class="fas fa-check text-success me-2"></i> Email & communication</li>
              </ul>
              <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#programDetailsModal"
                data-program-id="basic">Learn More</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="program-card">
            <img src="assets/img/digital-skills/IMG-14.jpg" class="card-img-top" alt="Web Development">
            <div class="card-body">
              <h5 class="card-title">Web Development</h5>
              <p class="card-text">Master the skills to build responsive and interactive websites from scratch.</p>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success me-2"></i> HTML5 & CSS3</li>
                <li><i class="fas fa-check text-success me-2"></i> JavaScript & jQuery</li>
                <li><i class="fas fa-check text-success me-2"></i> Responsive design</li>
              </ul>
              <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#programDetailsModal"
                data-program-id="web">Learn More</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="program-card">
            <img src="assets/img/digital-skills/IMG-18.jpg" class="card-img-top" alt="Digital Marketing">
            <div class="card-body">
              <h5 class="card-title">Digital Marketing</h5>
              <p class="card-text">Learn to create effective digital marketing strategies and campaigns.</p>
              <ul class="list-unstyled">
                <li><i class="fas fa-check text-success me-2"></i> Social media marketing</li>
                <li><i class="fas fa-check text-success me-2"></i> SEO & content marketing</li>
                <li><i class="fas fa-check text-success me-2"></i> Email marketing</li>
              </ul>
              <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#programDetailsModal"
                data-program-id="marketing">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <a href="/digital-skills.html#programs" class="btn btn-primary btn-lg rounded-pill px-5"
          style="background-color:#4C808A; border-color:#4C808A;">
          View More Courses
        </a>
      </div>
    </div>
  </section>

  <!-- Program Details Modal -->
  <div class="modal fade" id="programDetailsModal" tabindex="-1" aria-labelledby="programDetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="programDetailsModalLabel">Program Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="program-details">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="detail-item">
                    <h3>Program Details</h3>
                    <p>Our Digital Skills Training programs are designed to be accessible to everyone, regardless of
                      their current skill level. Whether you're a complete beginner or looking to enhance your existing
                      skills, we have a program that's right for you.</p>
                    <p>Each program combines theoretical knowledge with practical, hands-on experience to ensure you
                      gain the skills needed to succeed in today's digital economy. Our flexible scheduling options make
                      it easy to balance your education with other commitments.</p>
                  </div>

                  <div class="detail-item">
                    <h3>Who Should Attend?</h3>
                    <ul>
                      <li>Recent graduates looking to enhance their employability</li>
                      <li>Professionals seeking to upskill or change careers</li>
                      <li>Entrepreneurs wanting to leverage digital tools for business growth</li>
                      <li>Anyone interested in acquiring valuable digital skills</li>
                    </ul>
                  </div>

                  <div class="detail-item">
                    <h3>Certification</h3>
                    <p>Upon successful completion of any of our programs, participants will receive a certificate of
                      completion, validating their newly acquired skills and knowledge.</p>
                  </div>

                  <div class="text-center mt-4">
                    <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#applyModal">Apply
                      Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Apply Modal -->
  <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
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
                <option value="basic">Basic Digital Literacy</option>
                <option value="web">Web Development</option>
                <option value="marketing">Digital Marketing</option>
                <option value="graphic">Graphic Design</option>
                <option value="python">Python Programming</option>
                <option value="data">Data Analysis</option>
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
  </div>
  <!-- Service Section -->
  <section class="ms-service-section padding-tb-30">

  </section>

  <!-- Newsletter Section -->
  <section class="ms-african-section d-flex align-items-center justify-content-center">
    <div class="ms-content-box text-center">
      <div class="col-md-12">
        <div class="ms-newsletter">
          <div class="ms-newsletter-detail">
            <div class="ms-detail">
              <h4>Join Our Community</h4>
              <p>Get in touch with Emerge Ventures </p>
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
    </div>
  </section>
</body>
@endsection