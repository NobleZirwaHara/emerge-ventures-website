@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <style>
    /* Custom styles for entrepreneurs page */
    .entrepreneurs-hero {
        background:
        /*linear-gradient(135deg, rgba(76, 128, 138, 0.8) 0%, rgba(59, 65, 103, 0.8) 100%),*/
        url('assets/img/bg/63.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 100px 0 60px;
        color: white;
        text-align: center;
    }

    .entrepreneurs-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .entrepreneurs-hero p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .entrepreneurs-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin: 0 auto 40px;
        max-width: 1400px;
        padding: 0 10px;
    }

    .entrepreneur-card {
        position: relative;
        background: #fff;
        width: 100%;
        margin: 0 auto;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 550px; /* Fixed height for all cards */
        border-radius: 15px;
        overflow: hidden;
    }

    .entrepreneur-photo {
        width: 100%;
        height: 250px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0; /* Prevent image container from shrinking */
    }

    .entrepreneur-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        margin: 0;
    }

    .entrepreneur-card:hover .entrepreneur-photo img {
        transform: scale(1.05);
    }
    
    .entrepreneur-content {
        flex: 1 0 auto; /* Allow content to grow and fill available space */
        display: flex;
        flex-direction: column;
        padding: 20px 15px;
        text-align: center;
        min-height: 0; /* Fix for Firefox */
    }

    .entrepreneur-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #17181c;
        font-family: 'Quicksand', sans-serif;
        margin: 1rem 0 0.5rem;
        line-height: 1.3;
    }

    .entrepreneur-business {
        font-size: 0.95rem;
        color: #4C808A;
        font-weight: 500;
        margin-bottom: 1rem;
        line-height: 1.4;
        min-height: 2.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 1rem;
    }

    .entrepreneur-preview {
        padding: 0 1rem 1rem;
        color: #666;
        line-height: 1.6;
        font-size: 0.9rem;
        margin: 0.5rem 0 1rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limit to 3 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 4.8em; /* 3 lines * 1.6 line-height */
    }

    .see-more-btn {
        display: block;
        width: calc(100% - 30px);
        padding: 10px;
        margin: 0 auto 15px;
        background: linear-gradient(135deg, #4C808A, #3B4167);
        color: white;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .see-more-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .entrepreneur-card:hover::before {
        transform: scaleX(1);
    }

    .entrepreneur-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    /* .entrepreneur-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(76, 128, 138, 0.3);
        border: 3px solid #4C808A;
    } */

    /* .entrepreneur-name {
        font-size: 1.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 10px;
        color: #17181c;
    }

    .entrepreneur-business {
        font-size: 1rem;
        color: #4C808A;
        text-align: center;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .entrepreneur-preview {
        font-size: 0.95rem;
        color: #777;
        line-height: 1.6;
        text-align: center;
    } */

    /* .profile-page {
        display: none;
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .profile-header {
        display: flex;
        gap: 40px;
        margin-bottom: 40px;
        align-items: flex-start;
    }

    .profile-photo-container {
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-photo {
        width: 200px;
        height: 200px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(76, 128, 138, 0.3);
        border: 4px solid #4C808A;
        position: relative;
        margin-bottom: 15px;
    }

    .profile-logo-overlay {
        position: absolute;
        top: -10px;
        right: -10px;
        background: white;
        border-radius: 50%;
        padding: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        border: 3px solid #4C808A;
        z-index: 10;
    }

    .overlay-logo {
        width: 40px;
        height: 40px;
        object-fit: contain;
        display: block;
    }

    .profile-info {
        flex: 1;
    }

    .profile-name {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #17181c;
    }

    .profile-business {
        font-size: 1.3rem;
        color: #4C808A;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .profile-overview {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #777;
    }

    .profile-details {
        width: 200px;
        padding: 12px;
        background: rgba(76, 128, 138, 0.05);
        border-radius: 12px;
        border-left: 4px solid #4C808A;
        text-align: center;
    }

    .profile-details>div {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        font-size: 0.95rem;
        color: #555;
        font-weight: 500;
    }

    .profile-details>div:last-child {
        margin-bottom: 0;
    }

    .profile-location,
    .profile-founded,
    .profile-industry {
        line-height: 1.4;
    }

    .action-buttons {
        display: flex;
        gap: 20px;
        margin-top: 40px;
        flex-wrap: wrap;
    }

    .action-btn {
        padding: 15px 30px;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex: 1;
        min-width: 160px;
    }

    .btn-performance {
        background: linear-gradient(135deg, #4C808A, #3B4167);
        color: white;
    }

    .btn-invest {
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        color: #8b4513;
    }

    .btn-scorecard {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        color: #17181c;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .back-btn {
        background: #ecf0f1;
        color: #17181c;
        border: none;
        padding: 12px 24px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 600;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: #bdc3c7;
        transform: translateX(-2px);
    } */

    @media (max-width: 1400px) {
        .entrepreneurs-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 1000px) {
        .entrepreneurs-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .entrepreneurs-hero h1 {
            font-size: 2.5rem;
        }

        .entrepreneurs-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

        /* .profile-header {
            flex-direction: column;
            text-align: center;
            align-items: center;
        }

        .profile-photo-container {
            align-items: center;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            margin-bottom: 12px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .profile-details {
            width: 150px;
            padding: 10px;
        }

        .profile-details>div {
            font-size: 0.9rem;
            margin-bottom: 6px;
        } */
    }
    </style>
<body>
    <!-- Loader -->
    <div id="ms-overlay">
        <div class="loader"></div>
    </div>

    <!-- Hero Section -->
    <section class="entrepreneurs-hero">
        <div class="container">
            <h1>Our Entrepreneurs</h1>
            <p>Discover innovative minds amplifying self-reliance and fostering social economic growth across Malawi and
                beyond</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="padding-tb-60">
        <div class="container">
            <!-- Main Page -->
            <div id="mainPage">

                <div class="entrepreneurs-grid">
                    @foreach($entrepreneurs as $entrepreneur)
                    <div class="entrepreneur-card">
                        <div class="entrepreneur-photo">
                            <img data-src="{{ $entrepreneur->profile_image }}" alt="{{ $entrepreneur->name }}" class="lazy responsive-img">
                        </div>
                        <div class="entrepreneur-content">
                            <div class="entrepreneur-name">{{ $entrepreneur->name }}</div>
                            <div class="entrepreneur-business">{{ $entrepreneur->business_name }}</div>
                            <div class="entrepreneur-preview">{{ $entrepreneur->business_preview ?? \Illuminate\Support\Str::limit($entrepreneur->business_description, 100) }}</div>
                            <a href="{{ route('entrepreneurs.show', $entrepreneur->id) }}" class="see-more-btn">See More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        // Entrepreneur page functionality only - navbar dropdowns handled by standard-navbar.js
        document.addEventListener('DOMContentLoaded', function () {
            // Entrepreneur card animations
            const cards = document.querySelectorAll('.entrepreneur-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        function showProfile(entrepreneurId) {
            // Redirect to full profile page with entrepreneur ID as parameter
            window.location.href = `full-profile?entrepreneur=${entrepreneurId}`;
        }

        function showMain() {
            // Hide all profile pages
            const profiles = document.querySelectorAll('.profile-page');
            profiles.forEach(profile => profile.style.display = 'none');

            // Show main page
            document.getElementById('mainPage').style.display = 'block';

            // Smooth scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function handleAction(action, entrepreneurName) {
            // This function handles the three action buttons
            let message = '';

            switch (action) {
                case 'performance':
                    message = `Loading business performance analytics for ${entrepreneurName}...`;
                    break;
                case 'invest':
                    message = `Initiating investment process for ${entrepreneurName}'s company...`;
                    break;
                case 'scorecard':
                    message = `Generating comprehensive scorecard for ${entrepreneurName}...`;
                    break;
            }

            // For demo purposes, show an alert. In a real application, 
            // this would navigate to the respective pages or trigger API calls
            alert(message);
        }
    </script>
</body>
@endsection