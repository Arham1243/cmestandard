<header class="header">
    <div class="container">
        <div class="header-main">
            <a href="{{ route('index') }}" class="header-logo">
                <img src="{{ asset($logo->img_path ?? 'assets/images/logo.png') }}" alt="logo" class="imgFluid"
                    width="112.03" height="33.69"></a>
            <div class="wrapper">
                <div class="header-nav">
                    <ul>
                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="javascript:void(0)">Find more</a>
                            <div class="drop-down">
                                <ul class="drop-down__list">
                                    <li><a href="{{ route('about-us') }}">What is CME</a></li>
                                    <li><a href="{{ route('why-cme') }}">Why CME</a></li>
                                    <li><a href="{{ route('why-accredited') }}">Why accredited CME</a></li>
                                    <li><a href="{{ route('objectives-of-cme') }}">Objectives of CME</a></li>
                                    <li><a href="{{ route('patient-care') }}">CME for Improved Patient Care</a></li>
                                    <li><a href="{{ route('career_advancement') }}">CME for Career Advancement</a></li>
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
                                <a target="_blank" href="{{ route('doctor_profile', Auth::user()->slug) }}"
                                    class="Become-member themeBtn">
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
                <a href="javascript:void(0)" class="header-main__menu" onclick="openSideBar()">
                    <i class="bx bx-menu"></i>
                </a>
            </div>



        </div>

    </div>


</header>
<div class="sideBar" id="sideBar">
    <a href="javascript:void(0)" class="sideBar__close" onclick="closeSideBar()">×</a>
    <a href="{{ route('index') }}" class="sideBar__logo">
        <img alt="Logo" class="imgFluid" src="{{ asset($logo->img_path ?? 'assets/images/logo.png') }}">
    </a>
    <ul class="sideBar__nav">
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('about-us') }}">What is CME</a></li>
        <li><a href="{{ route('why-cme') }}">Why CME</a></li>
        <li><a href="{{ route('why-accredited') }}">Why accredited CME</a></li>
        <li><a href="{{ route('objectives-of-cme') }}">Objectives of CME</a></li>
        <li><a href="{{ route('patient-care') }}">CME for Improved Patient Care</a></li>
        <li><a href="{{ route('career_advancement') }}">CME for Career Advancement</a></li>
        {{-- <li class="drop-down--toggle"><a class="dropdown-click-link" href="javascript:void(0)">Profile<i class="bx bx-chevron-down"></i></a>
            <div class="toggle-wrapper">
                <div class="drop-down drop-down--alt">
                    <ul class="drop-down__list">
                                                    <li>
                                <a href="javascript:void(0)" class="loginBtn"><i class="bx bx-log-in-circle"></i>Log
                                    in or sign up</a>
                            </li>
                                                <li>
                            <a href="#"><i class="bx bx-log-in-circle"></i>Log in or sign up</a>
                        </li>
                        <div class="drop-down__list--line"></div>
                        <li>
                            <a href="#">Currency</a>
                        </li>
                        <div class="drop-down__list--line"></div>
                        <li>
                            <a href="#">Language</a>
                        </li>
                        <div class="drop-down__list--line"></div>
                        <li>
                            <a href="#"><i class="bx bx-sun"></i>Appearance</a>
                        </li>
                        <div class="drop-down__list--line"></div>
                        <li>
                            <a href="#"><i class="bx bx-help-circle"></i>Support</a>
                        </li>
                        <div class="drop-down__list--line"></div>
                        <li>
                            <a href="#"><i class="bx bx-mobile-alt"></i>Download the app</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li> --}}

    </ul>

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
                    <a target="_blank" href="{{ route('doctor_profile', Auth::user()->slug) }}"
                        class="Become-member themeBtn">
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
