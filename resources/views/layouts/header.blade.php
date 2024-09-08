<header class="header">
    <div class="container">
        <div class="header-main">
            <a href="{{ route('index') }}" class="header-logo">
                <img src="{{ asset($logo->img_path ?? 'assets/images/logo.png') }}" alt="logo" class="imgFluid"
                    width="112.03" height="33.69"></a>
            <div class="header-nav">
                <ul>
                    <li class="active"><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="javascript:void(0)">Find more</a>
                        <div class="drop-down">
                            <ul class="drop-down__list">
                                <li><a href="{{ route("about-us") }}">What is CME</a></li>
                                <li><a href="{{ route("why-cme") }}">Why CME</a></li>
                                <li><a href="{{ route("why-accredited") }}">Why accredited CME</a></li>
                                <li><a href="{{ route("objectives-of-cme") }}">Objectives of CME</a></li>
                                <li><a href="{{ route("patient-care") }}">CME for Improved Patient Care</a></li>
                                <li><a href="{{ route("career_advancement") }}">CME for Career Advancement</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-btns">
                <ul class="header-btns__list">
                    @if (!Auth::check())
                        <li class="header-btns__item">
                            <a href="{{ route('login') }}" title="login" class="loginBtn">
                                <span>Login</span>
                                <div class="header-btns__icon">
                                    <i class='bx bxs-user'></i>
                                </div>
                            </a>
                        </li>
                        <li class="header-btns__item">
                            <a href="{{ route('sign_up') }}" class="Become-member themeBtn">
                                <span>Become a member</span>
                            </a>
                        </li>
                    @else
                       
                        <li class="header-btns__item">
                            <a target="_blank" href="{{ route('doctor_profile', Auth::user()->slug) }}" class="Become-member themeBtn">
                                <i class='bx bxs-user'></i>My CME Profile
                            </a>
                        </li>
                        <li class="header-btns__item">
                            <a href="{{ route('dashboard.activity_listing') }}" class="Become-member themeBtn">
                                <i class='bx bxs-graduation'></i>My CME Tracking Transcript
                            </a>
                        </li>
                        <li class="header-btns__item">
                            <a href="{{ route('dashboard.index') }}" class="Become-member themeBtn">
                                <i class='bx bxs-user-circle'></i>Dashboard
                            </a>
                        </li>
                        <li class="header-btns__item">
                            <a href="{{ route('logout') }}" title="login" class="loginBtn">
                                <span>Logout</span>
                                <div class="header-btns__icon">
                                    <i class='bx bxs-log-out'></i>
                                </div>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>




        </div>

    </div>


</header>
