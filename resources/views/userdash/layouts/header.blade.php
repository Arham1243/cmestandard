<!-- HEADER CSS START -->

<header class="header">
    <div class="top-row">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-12 d-none d-md-block">
            <ul class="list-inline top-link-1">
              <li class="list-inline-item"><a href="{{$config['FACEBOOK']}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="{{$config['INSTAGRAM']}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="{{$config['TWITTER']}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="{{$config['YOUTUBE']}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <ul class="list-inline text-right top-link-2">
              <li class="list-inline-item"><a href="mailto:{{$config['COMPANYEMAIL']}}"><i class="fa fa-envelope"></i>
                  {{$config['COMPANYEMAIL']}}</a></li>
              <li class="list-inline-item"><a href="tel:{{$config['COMPANYPHONE']}}"><i class="fa fa-phone"></i> {{$config['COMPANYPHONE']}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-row">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-12">
            <div class="logo">
              <a href="{{route('home')}}"><img src="{{asset($logo->img_path)}}" alt="logo"></a>
              <div class="hamburger d-block d-lg-none">
                <div class="hamburger-container">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-12 d-none d-lg-block">
            <ul class="list-inline navigation-list text-right">
              <li class="list-inline-item active"><a href="{{route('home')}}">Home</a></li>
              <li class="list-inline-item"><a href="{{route('aboutus')}}">About Us</a></li>
              <li class="list-inline-item"><a href="{{route('loading')}}">Loading</a></li>
              <li class="list-inline-item"><a href="{{route('grooming')}}">Grooming</a></li>
              <li class="list-inline-item"><a href="{{route('careplay')}}">Day/Play Care</a></li>
              <li class="list-inline-item"><a href="{{route('training')}}">Training</a></li>
              <li class="list-inline-item"><a href="{{route('faqs')}}">FAQ's</a></li>
              <li class="list-inline-item"><a href="#">Reviews</a></li>
              @if(!Auth::check())
                 <li class="list-inline-item"><a href="{{route('sign-in-register')}}"
                                    class="primary-btn primary-bg">Login / Register</a></li>
              @else
              <li class="list-inline-item"><a href="{{route('dashboard.index')}}"  class="primary-btn primary-bg">DashBoard</a></li>
              @endif
            
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- HEADER END -->