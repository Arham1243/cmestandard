<div class="side-bar" id="sideBar">
    <a href="javascript:void(0)" class="sideBar__close" onclick="closeSideBar()">×</a>
    <div class="side-bar-logo bg-logo-wrapper">

        <a href="{{ route('admin.dashboard') }}"><img
                src="{{ asset($logo->img_path ?? 'admin/images/placeholder-logo.png') }}" alt="logo"
                class="img-fluid"></a>

    </div>
    <div class="side-bar-links">
        <ul class="navigation-list">
            <li><a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                </a></li>

            <li><a href="{{ route('admin.badges_management_listing') }}">
                    <i class="fa fa-certificate" aria-hidden="true"></i> Badges Management
                </a></li>


            <li
                class="custom-dropdown {{ in_array(Request::url(), [route('admin.cme_categories_listing'),route('admin.training_listing')]) ? 'open' : '' }}">
                <a href="javascript:void(0)" class="custom-dropdown__active">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> CME Trainings
                </a>
                <div class="custom-dropdown__values">
                    <ul class="values-wrapper">
                        <li><a class="{{ Request::url() == route('admin.training_listing') ? 'active' : '' }}"
                                href="{{ route('admin.training_listing') }}">All Trainings</a></li>
                        <li><a class="{{ Request::url() == route('admin.cme_categories_listing') ? 'active' : '' }}"
                                href="{{ route('admin.cme_categories_listing') }}">Categories</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="{{ route('admin.faq_listing') }}">
                    <i class="fa fa-question-circle" aria-hidden="true"></i> FAQs
                </a></li>


                <li><a href="{{ route('admin.inquiries_listing') }}">
                    <i class="fa fa-comment" aria-hidden="true"></i> Inquiries
                </a></li>
            <li
                class="custom-dropdown {{ in_array(Request::url(), [
                    route('admin.speciality_areas_listing'),
                    route('admin.speciality_interests_listing'),
                    route('admin.users_listing'),
                ])
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0)" class="custom-dropdown__active">
                    <i class="fa fa-user" aria-hidden="true"></i> Users Management
                </a>
                <div class="custom-dropdown__values">
                    <ul class="values-wrapper">
                        <li><a class="{{ Request::url() == route('admin.users_listing') ? 'active' : '' }}"
                                href="{{ route('admin.users_listing') }}">Users</a></li>
                        <li><a class="{{ Request::url() == route('admin.speciality_areas_listing') ? 'active' : '' }}"
                                href="{{ route('admin.speciality_areas_listing') }}">Speciality Areas</a></li>
                        <li><a class="{{ Request::url() == route('admin.speciality_interests_listing') ? 'active' : '' }}"
                                href="{{ route('admin.speciality_interests_listing') }}">Speciality Interests</a></li>
                    </ul>
                </div>
            </li>


          


            <li><a href="{{ route('admin.testimonial_listing') }}">
                <i class="fa fa-comments" aria-hidden="true"></i> Testimonials Management
            </a></li>




            <li
                class="custom-dropdown {{ in_array(Request::url(), [route('admin.showLogo'), route('admin.welcomeSlider'), route('admin.socialInfo')])
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0)" class="custom-dropdown__active">
                    <i class="fa fa-cog" aria-hidden="true"></i> Site Settings
                </a>
                <div class="custom-dropdown__values">
                    <ul class="values-wrapper">
                        <li><a class="{{ Request::url() == route('admin.showLogo') ? 'active' : '' }}"
                                href="{{ route('admin.showLogo') }}">Logo Management</a></li>
                        <li><a class="{{ Request::url() == route('admin.welcomeSlider') ? 'active' : '' }}"
                                href="{{ route('admin.welcomeSlider') }}">Welcome Banner</a></li>
                        <li><a class="{{ Request::url() == route('admin.socialInfo') ? 'active' : '' }}"
                                href="{{ route('admin.socialInfo') }}">Contact / Social Info</a></li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
</div>
