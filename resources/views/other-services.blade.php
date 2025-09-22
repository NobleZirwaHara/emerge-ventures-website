@extends('layouts.master')

@section('title', 'Home')

@section('content')
  <style>
    /* Custom styles for Other Services page */
    .services-hero {
      background: linear-gradient(135deg, rgba(76, 128, 138, 0.8) 0%, rgba(59, 65, 103, 0.8) 100%), url('assets/img/bg/63.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: white;
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }

    .services-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('assets/img/bg/63.jpg') center/cover;
      opacity: 1;
      z-index: 1;
    }

    .services-hero .container {
      position: relative;
      z-index: 2;
    }

    .service-card {
      background: white;
      border-radius: 15px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      border: 2px solid transparent;
      position: relative;
      overflow: hidden;
    }

    .service-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #4C808A, #3e9172);
    }

    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      border-color: #4C808A;
    }

    .service-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #4C808A, #3B4167);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      color: white;
      font-size: 2rem;
    }

    .service-card h3 {
      color: #4C808A;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .service-card p {
      color: #666;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .service-features {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .service-features li {
      padding: 8px 0;
      color: #555;
      position: relative;
      padding-left: 25px;
    }

    .service-features li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: #4C808A;
      font-weight: bold;
    }

    .service-btn {
      background: linear-gradient(135deg, #4C808A, #3B4167);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      margin-top: 15px;
      font-family: 'Montserrat', sans-serif;
    }

    .service-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(76, 128, 138, 0.4);
      color: white;
      text-decoration: none;
    }

    /* .stats-section {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      padding: 80px 0;
    }

    .stat-card {
      text-align: center;
      padding: 30px 20px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
      font-size: 3rem;
      font-weight: bold;
      color: #4C808A;
      margin-bottom: 10px;
    }

    .stat-label {
      color: #666;
      font-weight: 500;
    }

    .testimonial-section {
      background: white;
      padding: 80px 0;
    }

    .testimonial-card {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 30px;
      margin-bottom: 30px;
      border-left: 4px solid #4C808A;
    }

    .testimonial-text {
      font-style: italic;
      color: #555;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .testimonial-author {
      font-weight: 600;
      color: #4C808A;
    }

    .testimonial-role {
      color: #666;
      font-size: 0.9rem;
    } */

    .cta-section {
      background: linear-gradient(135deg, #4C808A 0%, #3B4167 100%);
      color: white;
      padding: 80px 0;
      text-align: center;
    }

    .cta-btn {
      background: white;
      color: #4C808A;
      border: none;
      padding: 15px 30px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      margin-top: 20px;
    }

    .cta-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      color: #4C808A;
      text-decoration: none;
    }

    .cta-section {
      margin-bottom: 60px;
    }

    h1 h2 p {
      font-family: Verdana;
    }

    h1 {
      font-family: Verdana;
      font-weight: 600;
      font-size: 40px;
    }

    p {
      font-family: Verdana;
    }
  </style>
<body>
  <!-- Loader -->
  <div id="ms-overlay">
    <div class="loader"></div>
  </div>

  <!-- Hero Section -->
  <section class="services-hero">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-12 col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold mb-4">Our Comprehensive Services</h1>
          <p class="lead mb-4">Amplifying self-reliance through innovative enterprise development and access to market
            opportunities across Malawi and beyond. Discover our full range of services designed to support your
            entrepreneurial
            journey and foster community growth.</p>
          <a href="#services" class="btn btn-light btn-lg">Explore Services</a>
        </div>
        <div class="col-12 col-lg-5 mt-4 mt-lg-0">
          <img src="assets/img/home/Entrepreneur.jpg" alt="Services" class="img-fluid rounded services-hero-img">
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="padding-tb-80">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="display-5 fw-bold">What We Offer</h2>
          <p class="lead text-muted">Comprehensive services to support your entrepreneurial journey</p>
        </div>
      </div>
      <div class="row">
        @foreach($services->chunk(2) as $serviceChunk)
          @foreach($serviceChunk as $service)
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="service-card">
                <div class="service-icon">
                  <i class="msicon {{ $service->icon }}"></i>
                </div>
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->short_description }}</p>
                @if(!empty($service->features) && is_array($service->features))
                  <ul class="service-features">
                    @foreach(array_slice($service->features, 0, 5) as $feature)
                      <li>{{ $feature }}</li>
                    @endforeach
                  </ul>
                @endif
                <a href="{{ route('services.show', $service->slug) }}" class="service-btn">
                  @if(str_contains(strtolower($service->name), 'shop'))
                    Shop Now
                  @elseif(str_contains(strtolower($service->name), 'training') || str_contains(strtolower($service->name), 'skill'))
                    Enroll Now
                  @elseif(str_contains(strtolower($service->name), 'space') || str_contains(strtolower($service->name), 'workspace'))
                    Book Space
                  @else
                    Learn More
                  @endif
                </a>
              </div>
            </div>
          @endforeach
        @endforeach
      </div>
    </div>
  </section>
  <!-- Statistics Section -->
  <!-- <section class="stats-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="display-5 fw-bold">Our Impact</h2>
          <p class="lead text-muted">Amplifying self-reliance through entrepreneurship and innovation</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="stat-card">
            <div class="stat-number">500+</div>
            <div class="stat-label">Youth Trained</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">Entrepreneurs Supported</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stat-card">
            <div class="stat-number">15+</div>
            <div class="stat-label">Services Offered</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stat-card">
            <div class="stat-number">85%</div>
            <div class="stat-label">Success Rate</div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Testimonials Section -->
  <!-- <section class="testimonial-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="display-5 fw-bold">What Our Clients Say</h2>
          <p class="lead text-muted">Success stories from our community</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="testimonial-text">
              "Emerge Ventures amplified my business potential into a thriving enterprise. Their digital skills training
              and mentorship program gave me the confidence and skills I needed to succeed."
            </div>
            <div class="testimonial-author">Sarah Mhango</div>
            <div class="testimonial-role">Founder, TechStart Malawi</div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="testimonial-text">
              "The co-working space provided the perfect environment for my team to collaborate and grow. The networking
              opportunities have been invaluable for our business expansion."
            </div>
            <div class="testimonial-author">John Banda</div>
            <div class="testimonial-role">CEO, Creative Solutions</div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="testimonial-text">
              "Through Emerge Ventures' e-commerce platform, I've been able to reach customers across Malawi and even
              internationally. The collaborative support has been incredible."
            </div>
            <div class="testimonial-author">Mary Phiri</div>
            <div class="testimonial-role">Owner, Handmade Crafts</div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Call to Action Section -->
  <section class="cta-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="display-4 fw-bold mb-4">Ready to Amplify Your Potential?</h2>
          <p class="lead mb-4">Join our thriving community of innovators and entrepreneurs. Together, we're fostering
            social economic growth through transformative solutions.</p>
          <a href="entrepreneur-application.html" class="cta-btn">Get Started Today</a>
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
              <p>Get updates about our services and opportunities</p>
            </div>
            <div class="ms-newsletter-form">
              <form>
                <input type="email" id="email" name="email" placeholder="Email Address"><br>
                <button class="ms-btn-2" type="submit" value="Submit"><img src="assets/img/icons/send.svg"
                    class="svg_img" alt="send"></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
</body>
@endsection