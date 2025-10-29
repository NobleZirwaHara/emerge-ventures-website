@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')

  <link rel="stylesheet" href="assets/css/contact.css" />
<body>
  <!-- Loader -->
  <div id="ms-overlay">
    <div class="loader"></div>
  </div>

  <!-- Hero Banner Section -->
  <section class="contact-hero">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-8 text-center">
          <div class="hero-content">
            <h1 class="hero-title">Let's Connect</h1>
            <p class="hero-subtitle">Ready to transform your ideas into reality? We're here to help you every step of
              the way.</p>
            <div class="hero-stats">
              <div class="stat-item">
                <span class="stat-number">24h</span>
                <span class="stat-label">Response Time</span>
              </div>
              <div class="stat-item">
                <span class="stat-number">100+</span>
                <span class="stat-label">Projects Completed</span>
              </div>
              <div class="stat-item">
                <span class="stat-number">5★</span>
                <span class="stat-label">Client Rating</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="contact-wrapper">
            <div class="row g-0">
              <!-- Contact Form -->
              <div class="col-lg-7">
                <div class="contact-form-card">
                  <div class="form-header">
                    <h3>Send us a Message</h3>
                    <p>We'll get back to you within 24 hours</p>
                  </div>

                  <form class="modern-form" id="contactForm">
                    @csrf
                    <div id="form-messages"></div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name" required>
                          <label for="fname">Full Name</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                          <label for="email">Email Address</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                          <label for="phone">Phone Number</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <select class="form-select" id="subject" name="subject" required>
                            <option value="">Subject</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Digital Skills Training">Digital Skills Training</option>
                            <option value="Co-working Space">Co-working Space</option>
                            <option value="Entrepreneurship Support">Entrepreneurship Support</option>
                            <option value="Partnership">Partnership</option>
                          </select>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="message" name="message" style="height: 120px" placeholder="Your Message"
                            required></textarea>
                          <label for="message">Your Message</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn-modern-primary" id="submitBtn">
                          <span class="btn-text">Send Message</span>
                          <span class="btn-spinner d-none">
                            <i class="fas fa-spinner fa-spin"></i>
                            Sending...
                          </span>
                          <i class="fas fa-paper-plane btn-icon"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Contact Info -->
              <div class="col-lg-5">
                <div class="contact-info-card">
                  <div class="info-header">
                    <h4>Get in Touch</h4>
                    <p>Ready to start your journey with us?</p>
                  </div>

                  <div class="contact-methods">
                    <div class="contact-method">
                      <div class="method-icon">
                        <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="method-content">
                        <h6>Visit Us</h6>
                        <p>Emerge Hub - Mzuzu<br>
                          Kwawala House, First Floor<br>
                          P.O. Box 20094, Mzuzu, Malawi</p>
                      </div>
                    </div>

                    <div class="contact-method">
                      <div class="method-icon">
                        <i class="fas fa-phone"></i>
                      </div>
                      <div class="method-content">
                        <h6>Call Us</h6>
                        <p><a href="tel:+265881404393">+265 881 404 393</a></p>
                      </div>
                    </div>

                    <div class="contact-method">
                      <div class="method-icon">
                        <i class="fas fa-envelope"></i>
                      </div>
                      <div class="method-content">
                        <h6>Email Us</h6>
                        <p><a href="mailto:hello@emergeventures.com">hello@emergeventures.com</a></p>
                      </div>
                    </div>
                  </div>

                  <div class="social-links">
                    <h6>Follow Us</h6>
                    <div class="social-icons">
                      <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                      <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 mb-5">
          <h2 class="section-title">Why Choose Emerge Ventures?</h2>
          <p class="section-subtitle">We're committed to your success every step of the way</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-rocket"></i>
            </div>
            <h5>Innovation First</h5>
            <p>Cutting-edge solutions tailored to your unique needs and goals.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-users"></i>
            </div>
            <h5>Expert Team</h5>
            <p>Experienced professionals dedicated to delivering exceptional results.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h5>24/7 Support</h5>
            <p>Round-the-clock assistance whenever you need help or guidance.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-trophy"></i>
            </div>
            <h5>Proven Results</h5>
            <p>Track record of successful projects and satisfied clients across Malawi.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="ms-african-section d-flex align-items-center justify-content-center">
    <div class="ms-content-box text-center">
      <div class="col-md-12">
        <div class="ms-newsletter">
          <div class="ms-newsletter-detail">
            <div class="ms-detail">
              <h4>Stay Connected</h4>
              <p>Subscribe to our newsletter for updates and opportunities</p>
            </div>
            <div class="ms-newsletter-form">
              <form id="newsletterForm">
                @csrf
                <input type="email" id="newsletter-email" name="email" placeholder="Email Address" required><br>
                <button class="ms-btn-2" type="submit" id="newsletterBtn">
                  <img src="assets/icons/send.svg" class="svg_img newsletter-icon" alt="send">
                  <span class="newsletter-spinner d-none">
                    <i class="fas fa-spinner fa-spin"></i>
                  </span>
                </button>
              </form>
              <div id="newsletter-message" class="mt-2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const contactForm = document.getElementById('contactForm');
      const submitBtn = document.getElementById('submitBtn');
      const btnText = submitBtn.querySelector('.btn-text');
      const btnSpinner = submitBtn.querySelector('.btn-spinner');
      const btnIcon = submitBtn.querySelector('.btn-icon');
      const messagesDiv = document.getElementById('form-messages');

      contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Clear previous messages and validation states
        clearMessages();
        clearValidationStates();
        
        // Show loading state
        setLoadingState(true);
        
        try {
          const formData = new FormData(contactForm);
          
          const response = await fetch('{{ route("contact.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
            }
          });
          
          const data = await response.json();
          
          if (data.success) {
            showMessage(data.message, 'success');
            contactForm.reset();
          } else {
            if (data.errors) {
              showValidationErrors(data.errors);
            } else {
              showMessage(data.message || 'An error occurred. Please try again.', 'error');
            }
          }
        } catch (error) {
          console.error('Error:', error);
          showMessage('Network error. Please check your connection and try again.', 'error');
        } finally {
          setLoadingState(false);
        }
      });

      function setLoadingState(loading) {
        if (loading) {
          submitBtn.disabled = true;
          btnText.classList.add('d-none');
          btnSpinner.classList.remove('d-none');
          btnIcon.classList.add('d-none');
        } else {
          submitBtn.disabled = false;
          btnText.classList.remove('d-none');
          btnSpinner.classList.add('d-none');
          btnIcon.classList.remove('d-none');
        }
      }

      function showMessage(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';
        
        messagesDiv.innerHTML = `
          <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="fas ${iconClass} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        `;
        
        // Scroll to message
        messagesDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }

      function showValidationErrors(errors) {
        Object.keys(errors).forEach(field => {
          const input = document.getElementById(field);
          const feedback = input.parentElement.querySelector('.invalid-feedback');
          
          if (input && feedback) {
            input.classList.add('is-invalid');
            feedback.textContent = errors[field][0];
          }
        });
        
        // Show general error message
        showMessage('Please correct the errors below and try again.', 'error');
      }

      function clearMessages() {
        messagesDiv.innerHTML = '';
      }

      function clearValidationStates() {
        const inputs = contactForm.querySelectorAll('.form-control, .form-select');
        inputs.forEach(input => {
          input.classList.remove('is-invalid');
          const feedback = input.parentElement.querySelector('.invalid-feedback');
          if (feedback) {
            feedback.textContent = '';
          }
        });
      }
    });

    // Newsletter Form Handler
    const newsletterForm = document.getElementById('newsletterForm');
    const newsletterBtn = document.getElementById('newsletterBtn');
    const newsletterIcon = newsletterBtn.querySelector('.newsletter-icon');
    const newsletterSpinner = newsletterBtn.querySelector('.newsletter-spinner');
    const newsletterMessage = document.getElementById('newsletter-message');

    if (newsletterForm) {
      newsletterForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const email = document.getElementById('newsletter-email').value;
        
        // Show loading state
        newsletterBtn.disabled = true;
        newsletterIcon.classList.add('d-none');
        newsletterSpinner.classList.remove('d-none');
        newsletterMessage.innerHTML = '';
        
        try {
          const formData = new FormData(newsletterForm);
          
          const response = await fetch('{{ route("newsletter.subscribe") }}', {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
            }
          });
          
          const data = await response.json();
          
          if (data.success) {
            newsletterMessage.innerHTML = `
              <div class="alert alert-success mt-2" style="font-size: 14px; padding: 8px 12px;">
                <i class="fas fa-check-circle me-1"></i>
                ${data.message}
              </div>
            `;
            newsletterForm.reset();
          } else {
            newsletterMessage.innerHTML = `
              <div class="alert alert-danger mt-2" style="font-size: 14px; padding: 8px 12px;">
                <i class="fas fa-exclamation-triangle me-1"></i>
                ${data.message}
              </div>
            `;
          }
        } catch (error) {
          console.error('Newsletter subscription error:', error);
          newsletterMessage.innerHTML = `
            <div class="alert alert-danger mt-2" style="font-size: 14px; padding: 8px 12px;">
              <i class="fas fa-exclamation-triangle me-1"></i>
              Network error. Please try again.
            </div>
          `;
        } finally {
          // Reset loading state
          newsletterBtn.disabled = false;
          newsletterIcon.classList.remove('d-none');
          newsletterSpinner.classList.add('d-none');
        }
      });
    }
  </script>

  <style>
    .btn-modern-primary {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    
    .btn-modern-primary:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }
    
    .alert {
      border-radius: 10px;
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .alert-success {
      background: linear-gradient(135deg, #d4edda, #c3e6cb);
      color: #155724;
    }
    
    .alert-danger {
      background: linear-gradient(135deg, #f8d7da, #f5c6cb);
      color: #721c24;
    }
    
    .form-control.is-invalid,
    .form-select.is-invalid {
      border-color: #dc3545;
      box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
    
    .invalid-feedback {
      display: block;
      width: 100%;
      margin-top: 0.25rem;
      font-size: 0.875em;
      color: #dc3545;
    }
  </style>
</body>
@endsection