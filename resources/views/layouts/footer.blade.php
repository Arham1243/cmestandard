<footer class="footer {{ Request::url() == route('home') ||  Request::url() == route('index') ? 'footer-home' : '' }}">
    <div class="footer-bg">
        <img src="{{ asset('assets/images/footer.png') }}" alt='image' class='imgFluid' loading='lazy'>
    </div>
    <div class="container">
        <div class="row g-0">
            <div class="col-md-3">
                <div class="footer-content">
                    <a href="{{ route('index') }}" class="footer-logo"> <img
                            src="{{ asset($logo->img_path ?? 'assets/images/footer-logo.png') }}" alt='image' class='imgFluid'
                            loading='lazy'></a>
                            <?php App\Helpers\Helper::inlineEditable("p", ["class" => ""], "Our goal is at the heart of all that we do.", "content26"); ?>

                    {{-- <ul class="footer-icons">
                        <li><a target="_blank" href="{{ $config['FACEBOOK'] }}"><i class='bx bxl-facebook-circle'></i></a></li>
                        <li><a target="_blank" href="{{ $config['TWITTER'] }}"><i class='bx bxl-twitter'></i></a></li>
                        <li><a target="_blank" href="{{ $config['LINKEDIN'] }}"><i class='bx bxl-linkedin-square'></i></a></li>
                    </ul> --}}
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <?php App\Helpers\Helper::inlineEditable("div", ["class" => "footer-details"], "Quick links", "content27"); ?>

                    <ul class="footer-link">
                        <li><a href="{{ route('about-us') }}">What is CME</a></li>
                        <li><a href="{{ route('why-cme') }}">Why CME</a></li>
                        <li><a href="{{ route('why-accredited') }}">Why accredited CME</a></li>
                        <li><a href="{{ route('objectives-of-cme') }}">Objectives of CME</a></li>
                        <li><a href="{{ route('patient-care') }}">CME for Improved Patient Care</a></li>
                        <li><a href="{{ route('career_advancement') }}">CME for Career Advancement</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <?php App\Helpers\Helper::inlineEditable("div", ["class" => "footer-details"], "Other links", "content28"); ?>

                    <ul class="footer-link">
                        <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms_and_conditions') }}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <?php App\Helpers\Helper::inlineEditable("div", ["class" => "footer-details"], "Contact Us", "content29"); ?>

                    <ul class="footer-link footer-contact">
                        <li><a href="tel:{{ $config['COMPANYPHONE'] }}">{{ $config['COMPANYPHONE'] }}</a></li>
                        <li><a href="mailto:{{ $config['COMPANYEMAIL'] }}">{{ $config['COMPANYEMAIL'] }}</a></li>
                        <li><a href="javascript:void(0)">{{ $config['COMPANYADDRESS'] }}</a></li>
                    </ul>
                </div>
            </div> --}}
        </div>

    </div>



</footer>
<div class="footer-copyright">
    <div class="title">Copyright © {{ date('Y') }} All Rights Reserved</div>
</div>
