@extends('layouts.master')

@section('title', 'Digital Skills Training')

@section('content')
    <style>
        .page-hero {
            background:
                /*linear-gradient(135deg, rgba(76, 128, 138, 0.9) 0%, rgba(59, 65, 103, 0.9) 100%),*/
                url('assets/img/bg/63.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 120px 0 80px;
            color: white;
            text-align: center;
        }

        .page-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .page-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto 30px;
        }

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

        .btn-warning {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
            border-color: #d97706;
            color: white;
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

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1>Digital Skills Training</h1>
            <p>Empowering individuals with essential digital skills for the modern workforce. Our comprehensive training
                programs are designed to bridge the digital divide and create opportunities for personal and
                professional growth.</p>
            <a href="#programs" class="btn btn-light btn-lg">Explore Programs</a>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3">Our Training Programs</h2>
                <p class="lead">Choose from our range of digital skills training programs</p>
            </div>

            <div class="row">
                @foreach($digitalSkills as $skill)
                <div class="col-md-4 @if(!$loop->first && $loop->iteration > 3) mt-4 @endif">
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
                            @else
                                <p class="text-muted">No learning outcomes specified.</p>
                            @endif
                            <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#programDetailsModal" data-program-id="{{ $skill->slug }}">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                @if($applicationsEnabled)
                    <a href="#" class="btn btn-primary btn-lg rounded-pill px-5"
                        style="background-color:#4C808A; border-color:#4C808A; " data-bs-toggle="modal"
                        data-bs-target="#applyModal">
                        Apply Now
                    </a>
                @else
                    <a href="#" class="btn btn-warning btn-lg rounded-pill px-5" data-bs-toggle="modal"
                        data-bs-target="#applyModal">
                        View Application Status
                    </a>
                @endif
            </div>
    </section>

    <!-- Program Features -->
    <section class="program-features py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3">Why Choose Our Programs?</h2>
                <p class="lead">We provide the best learning experience for our students</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box p-4">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <h4>Expert Instructors</h4>
                        <p>Learn from industry professionals with years of practical experience in their respective
                            fields.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box p-4">
                        <i class="fas fa-laptop-code"></i>
                        <h4>Hands-on Training</h4>
                        <p>Gain practical, real-world experience through hands-on projects and exercises.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box p-4">
                        <i class="fas fa-briefcase"></i>
                        <h4>Career Support</h4>
                        <p>Get assistance with resume building, interview preparation, and job placement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">Ready to Start Your Digital Journey?</h2>
                    <p class="lead mb-5">Join our next cohort and gain the skills you need to succeed in the digital
                        economy.</p>
                    @if($applicationsEnabled)
                        <a href="#" class="btn btn-apply btn-lg" data-bs-toggle="modal" data-bs-target="#applyModal">Apply
                            Now</a>
                    @else
                        <a href="#" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#applyModal">View Application Status</a>
                    @endif
                </div>
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
                    <!-- Content will be dynamically loaded -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if($applicationsEnabled)
                        <button type="button" class="btn btn-primary" data-bs-target="#applyModal" data-bs-toggle="modal" data-bs-dismiss="modal">Apply Now</button>
                    @else
                        <button type="button" class="btn btn-warning" data-bs-target="#applyModal" data-bs-toggle="modal" data-bs-dismiss="modal">View Application Status</button>
                    @endif
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
                    @if(!$applicationsEnabled)
                        <div class="text-center py-4">
                            <div class="mb-3">
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="mb-3">Applications Currently Closed</h4>
                            <p class="text-muted">We are not receiving applications now. Please check again in the coming days.</p>
                        </div>
                    @else
                    <form id="trainingApplicationForm">
                        @csrf
                        <div id="applicationAlert" class="alert d-none" role="alert"></div>
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
                                @foreach($digitalSkills as $skill)
                                    <option value="{{ $skill->slug }}">{{ $skill->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Why are you interested in this program?</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <span class="btn-text">Submit Application</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
// Wait for programs.js to load first, then override its behavior
window.addEventListener('load', function () {
    var programDetailsModal = document.getElementById('programDetailsModal');
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
            })
            .catch(error => {
                console.error('Error:', error);
                modalTitle.textContent = 'Error';
                modalBody.innerHTML = '<p>Could not load program details. Please try again later.</p>';
            });
    });

    // Handle application form submission
    const applicationForm = document.getElementById('trainingApplicationForm');
    if (applicationForm) {
        applicationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.spinner-border');
            const alertDiv = document.getElementById('applicationAlert');
            
            // Show loading state
            submitBtn.disabled = true;
            btnText.textContent = 'Submitting...';
            spinner.classList.remove('d-none');
            alertDiv.classList.add('d-none');
            
            // Get form data
            const formData = new FormData(applicationForm);
            
            // Submit the form
            fetch('{{ route("digital-skills.apply") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                // Handle both success and error responses
                return response.json().then(data => {
                    return { data, status: response.status, ok: response.ok };
                });
            })
            .then(({ data, status, ok }) => {
                if (ok && data.success) {
                    // Show success message
                    alertDiv.className = 'alert alert-success';
                    alertDiv.textContent = data.message;
                    alertDiv.classList.remove('d-none');
                    
                    // Reset form
                    applicationForm.reset();
                    
                    // Close modal after 3 seconds
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('applyModal'));
                        modal.hide();
                    }, 3000);
                } else {
                    // Show error message
                    alertDiv.className = 'alert alert-danger';
                    
                    // Handle validation errors (422)
                    if (status === 422 && data.errors) {
                        let errorText = data.message + '\n\n';
                        Object.values(data.errors).forEach(errors => {
                            errors.forEach(error => {
                                errorText += '• ' + error + '\n';
                            });
                        });
                        alertDiv.innerHTML = errorText.replace(/\n/g, '<br>');
                    } else {
                        alertDiv.textContent = data.message || 'Something went wrong. Please try again.';
                    }
                    
                    alertDiv.classList.remove('d-none');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alertDiv.className = 'alert alert-danger';
                alertDiv.textContent = 'Something went wrong. Please try again later.';
                alertDiv.classList.remove('d-none');
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                btnText.textContent = 'Submit Application';
                spinner.classList.add('d-none');
            });
        });
    }
});
</script>
@endpush
</body>
@endsection