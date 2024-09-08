<!-- FOOTER-SEC START -->

<footer class="footer pc-p-4 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="footer-info">
            <h3 class="mc-b-3">About Us</h3>
            <p>Pet Galaxy is a full service pet resort. We feature fun and loving lodging, grooming, day care, training and dozens of other activities for your best friend.</p>
            <h3 class="mc-b-2">Business Hours</h3>
            <ul class="footer-timing">
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item"></li>
                  <li class="list-inline-item">Open</li>
                  <li class="list-inline-item">Close</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Mon</li>
                  <li class="list-inline-item">7:30 AM</li>
                  <li class="list-inline-item">5:30 PM</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Tue</li>
                  <li class="list-inline-item">7:30 AM</li>
                  <li class="list-inline-item">5:30 PM</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Wed</li>
                  <li class="list-inline-item">7:30 AM</li>
                  <li class="list-inline-item">5:30 PM</li>
                </ul>
              </li> 
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Thu</li>
                  <li class="list-inline-item">7:30 AM</li>
                  <li class="list-inline-item">5:30 PM</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Fri</li>
                  <li class="list-inline-item">7:30 AM</li>
                  <li class="list-inline-item">5:30 PM</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Sat</li>
                  <li class="list-inline-item">8:00 AM</li>
                  <li class="list-inline-item">3:00 PM</li>
                </ul>
              </li>
              <li>
                <ul class="list-inline">
                  <li class="list-inline-item">Sun</li>
                  <li class="list-inline-item">Closed</li>
                  <li class="list-inline-item">Closed</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="footer-links mc-l-2">
            <h3 class="mc-b-3">Ouick Links</h3>
            <ul>
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{route('aboutus')}}">About Us</a></li>
              <li><a href="{{route('contact-us')}}">Contact Us</a></li>
              <li><a href="{{route('grooming')}}">Grooming</a></li>
              <li><a href="{{route('training')}}">Training</a></li>
              <li><a href="#">Gallery</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="footer-links">
            <h3 class="mc-b-3">Useful Links</h3>
            <ul>
            <li><a href="{{route('employment-opportunities')}}">Employment Opportunities</a></li>
              <li><a href="#">Transportation</a></li>
              <li><a href="{{route('faqs')}}">Faq</a></li>
             
       
              <li><a href="{{route('sign-in-register')}}">Login / Register</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="footer-contact">
            <h3 class="mc-b-3">Contact Us</h3>
            <ul class="footer-contact">
              <li><a href="mailto:{{$config['COMPANYEMAIL']}}"><i class="fa fa-envelope"></i>{{$config['COMPANYEMAIL']}}</a></li>
              <li><a href="tel:{{$config['COMPANYPHONE']}}"><i class="fa fa-phone"></i> {{$config['COMPANYPHONE']}}</a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> {{$config['COMPANYADDRESS']}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <section class="copyright-sec">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-7 col-12 order-md-last">
          <figure class="mb-2 mb-md-0 text-center text-md-right"><img src="{{asset('images/footer-copyright-card.jpg')}}" alt=""></figure>
        </div>
        <div class="col-lg-6 col-md-7 col-12 order-md-first">
          <h5 class="text-center text-md-left">Copyrights 2021 . All Rights Reserved</h5>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER-SEC END -->