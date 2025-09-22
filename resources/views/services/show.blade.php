@extends('layouts.master')

@section('title', $service->name . ' - ' . config('app.name'))

@section('content')
  <style>
    /* Reuse the same styles from other-services.blade.php */
    .service-detail {
      background: white;
      border-radius: 15px;
      padding: 40px;
      margin-bottom: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .service-header {
      text-align: center;
      margin-bottom: 40px;
    }
    
    .service-icon {
      width: 100px;
      height: 100px;
      background: linear-gradient(135deg, #4C808A, #3B4167);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      color: white;
      font-size: 2.5rem;
    }
    
    .service-title {
      color: #4C808A;
      font-weight: 600;
      margin-bottom: 15px;
    }
    
    .service-description {
      color: #666;
      font-size: 1.1rem;
      line-height: 1.8;
      margin-bottom: 30px;
    }
    
    .service-features {
      list-style: none;
      padding: 0;
      margin: 30px 0;
    }
    
    .service-features li {
      padding: 10px 0 10px 30px;
      color: #555;
      position: relative;
      font-size: 1.05rem;
      margin-bottom: 10px;
    }
    
    .service-features li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: #4C808A;
      font-weight: bold;
    }
    
    .related-services {
      margin-top: 60px;
    }
    
    .related-title {
      text-align: center;
      margin-bottom: 40px;
      color: #4C808A;
      font-weight: 600;
    }
    
    .service-card {
      background: white;
      border-radius: 15px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .service-card .service-icon {
      width: 70px;
      height: 70px;
      font-size: 1.8rem;
      margin-bottom: 15px;
    }
    
    .service-card h4 {
      color: #4C808A;
      font-weight: 600;
      margin-bottom: 15px;
    }
    
    .service-card p {
      color: #666;
      line-height: 1.6;
      margin-bottom: 20px;
    }
    
    .service-btn {
      background: linear-gradient(135deg, #4C808A, #3B4167);
      color: white;
      border: none;
      padding: 10px 20px;
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
  </style>

  <!-- Service Detail Section -->
  <section class="padding-tb-80">
    <div class="container">
      <div class="service-detail">
        <div class="service-header">
          <div class="service-icon">
            <i class="msicon {{ $service->icon }}"></i>
          </div>
          <h1 class="service-title">{{ $service->name }}</h1>
          <p class="lead">{{ $service->short_description }}</p>
        </div>
        
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="service-description">
              {!! nl2br(e($service->description)) !!}
            </div>
            
            @if(!empty($service->features) && is_array($service->features))
              <h4>Key Features</h4>
              <ul class="service-features">
                @foreach($service->features as $feature)
                  <li>{{ $feature }}</li>
                @endforeach
              </ul>
            @endif
            
            @if($service->delivery_time_days)
              <div class="delivery-time">
                <p><strong>Estimated Delivery Time:</strong> {{ $service->delivery_time_days }} days</p>
              </div>
            @endif
            
            <div class="text-center mt-5">
              <a href="/contact" class="service-btn">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
      
      @if($relatedServices->count() > 0)
        <div class="related-services">
          <h3 class="related-title">You Might Also Like</h3>
          <div class="row">
            @foreach($relatedServices as $relatedService)
              <div class="col-lg-4 col-md-6">
                <div class="service-card">
                  <div class="service-icon">
                    <i class="msicon {{ $relatedService->icon }}"></i>
                  </div>
                  <h4>{{ $relatedService->name }}</h4>
                  <p>{{ $relatedService->short_description }}</p>
                  <a href="{{ route('services.show', $relatedService->slug) }}" class="service-btn">Learn More</a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
