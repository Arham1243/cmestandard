@extends('layouts.main')
@section('content')


@php
    $badgeName = $user->badge ? strtolower($user->badge->name) : null;
    $profileImg = $user->profile_img ? asset($user->profile_img) : asset('assets/images/placeholder.png');
    $fullName = $user->full_name ?? 'N/A';
    $specialityArea = $user->specialityArea->name ?? 'N/A';
    $yearsOfExp = $user->years_of_exp ?? 0;
    $totalCreditHours = $user->total_credit_hours ?? 0;
    $patientsTreated = $user->patients_treated ?? 0;
    $proceduresPerformed = $user->procedures_performed ?? 0;
    $bio = $user->bio ?? 'N/A';
    $longDesc = $user->long_desc ?? 'N/A';
    $city = $user->city ?? 'N/A';
    $badge = $user->badge->name ?? 'N/A';
    $specialityName = $user->specialityArea->name ?? 'N/A';
    $specialityInterest = $user->specialityInterest->name ?? 'N/A';
    $phone = $user->phone ?? 'N/A';
    $email = $user->email ?? 'N/A';
    $birthday = $user->birthday ? date('M d, Y', strtotime($user->birthday)) : 'N/A';
    $qualification = $user->qualification ?? 'N/A';
    $country = $user->country ?? 'N/A';
    $institutionName = $user->institution_name ?? 'N/A';
    $institutionCity = $user->institution_city ?? 'N/A';
    $memberSince = $user->created_at ? date('M d, Y', strtotime($user->created_at)) : 'N/A';
    $languages = $user->languages ? json_decode($user->languages, true) : [];
@endphp

<div class="topbar" id="topbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="topbar-profile">
                <div class="topbar-profile__img">
                    <img src="{{ $profileImg }}" alt='{{ $fullName }}' class='imgFluid' loading='lazy'>
                </div>
                <div class="topbar-profile__details">
                    <div class="name">{{ $fullName }}
                        @if ($badgeName)
                            <img src="{{ asset('assets/images/' . $badgeName . '.png') }}" alt='{{ $badgeName }}' class='imgFluid profile-content__badge' loading='lazy'>
                        @endif
                    </div>
                    <div class="option">{{ $specialityArea }}</div>
                </div>
            </div>
            <a href="#details" class="profile-btn view-trainings active">View Trainings<lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover"></lord-icon></a>
        </div>
    </div>
</div>

<section class='profile mar-y'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-6'>
                <div class="profile-img">
                    <div class="profile-img__img">
                        <img src="{{ $profileImg }}" alt='{{ $fullName }}' class='imgFluid' loading='lazy'>
                    </div>
                    <div class="profile-img__exp">
                        <span class="number">{{ $yearsOfExp > 5 ? $yearsOfExp - 2 : $yearsOfExp }}+</span>
                        <span class="content">Years of experience</span>
                    </div>
                </div>
            </div>
            <div class='col-lg-5 offset-lg-1'>
                <div class="profile-content">
                    <div class="profile-content__subtitle">Hello I’m</div>
                    <div class="profile-content__title">{{ $fullName }}
                        @if ($badgeName)
                            <img src="{{ asset('assets/images/' . $badgeName . '.png') }}" alt='{{ $badgeName }}' class='imgFluid profile-content__badge' loading='lazy'>
                        @endif
                    </div>
                    <div class="profile-content__location">Based in {{ $city }}</div>
                    <div class="profile-content__bio">{{ $bio }}</div>
                    <ul class="profile-content__statistics">
                        <li>
                            <div class="number">{{ $totalCreditHours > 20 ? $totalCreditHours - 5 : $totalCreditHours }}+</div>
                            <div class="title">Credit Hours</div>
                        </li>
                        <li>
                            <div class="number">{{ $patientsTreated > 5 ? $patientsTreated - 2 : $patientsTreated }}+</div>
                            <div class="title">Patients Treated</div>
                        </li>
                        <li>
                            <div class="number">{{ $proceduresPerformed > 5 ? $proceduresPerformed - 2 : $proceduresPerformed }}+</div>
                            <div class="title">Procedures Performed</div>
                        </li>
                    </ul>
                    <a href="#details" class="profile-btn view-trainings active">View Trainings<lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover"></lord-icon></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="profile-details" id="details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="details-wrapper">
                    <div class="profile-details__heading mb-5">
                        <span class="profile-content__subtitle text-xl">Professional Details</span>
                        <h3 class="profile-content__title">Explore my complete profile below...</h3>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation">
                            <button class="profile-btn tabs-btn {{ !isset($_GET['page']) ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">About me <lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover"></lord-icon></button>
                        </li>
                        <li role="presentation">
                            <button class="profile-btn tabs-btn {{ isset($_GET['page']) ? 'active' : '' }}" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Trainings <lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover"></lord-icon></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade {{ !isset($_GET['page']) ? 'show active' : '' }}" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="profile-about">
                            <div class="profile-about_tab">
                                <div class="tab-contents">
                                    <h4 class="profile-content__location">Based in {{ $city }}</h4>
                                    <p class="profile-content__bio mb-7">{{ $longDesc }}</p>
                                    <ul class="profile-about__info">
                                        <li class="profile-about_details">
                                            <span class="title">Badge</span>
                                            <span class="detail">{{ $badge }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Name</span>
                                            <span class="detail">{{ $fullName }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Specialty Area</span>
                                            <span class="detail">{{ $specialityName }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Special Interests</span>
                                            <span class="detail">{{ $specialityInterest }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Phone</span>
                                            <span class="detail">{{ $phone }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Email</span>
                                            <span class="detail">{{ $email }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Birthday</span>
                                            <span class="detail">{{ $birthday }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Qualifications</span>
                                            <span class="detail">{{ $qualification }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Country</span>
                                            <span class="detail">{{ $country }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Institution Name</span>
                                            <span class="detail">{{ $institutionName }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Institution City</span>
                                            <span class="detail">{{ $institutionCity }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Member Since</span>
                                            <span class="detail">{{ $memberSince }}</span>
                                        </li>
                                        <li class="profile-about_details">
                                            <span class="title">Languages</span>
                                            <span class="detail">
                                                @foreach ($languages as $i => $language)
                                                    <span>{{ $language }} {{ count($languages) > 1 && $i != count($languages)-1 ? ',' : '' }} </span>
                                                @endforeach
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($_GET['page']) ? 'show active' : '' }}" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div id="profile-Training">
                                <h4 class="profile-content__location">
                                    {{ !$trainings->isEmpty() ? 'Trainings ' : 'No Trainings Available' }}</h4>

                                <div class="profile-Training__content">
                                    @foreach ($trainings as $training)
                                        <div class="profile-Training__details">
                                            <div class="wrapper">
                                                <span
                                                    class="date">{{ date('M d, Y', strtotime($training->date)) }}</span>

                                                <span class="date">Credit Hours:
                                                    {{ fmod($training->credit_hours, 1) == 0 ? number_format($training->credit_hours, 0) : number_format($training->credit_hours, 1) }}</span>
                                            </div>
                                            <div class="profile-Training__info">
                                                <h4 class="heading">
                                                    {{ $training->title }}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="bullets">
                                                            <li> {{ $training->category->name }}</li>
                                                            <li> {{ $training->content }}</li>
                                                            <li> {{ $training->status }}</li>
                                                            <li> {{ $training->type }}</li>
                                                            <li> {{ $training->duration }}</li>
                                                            <li> {{ $training->provider }}</li>
                                                            <li> {{ $training->format }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="bullets">
                                                            <li> {{ $training->endorser_name }}</li>
                                                            <li> {{ $training->endorser_title }}</li>
                                                            <li> {{ $training->endorser_hospital }}</li>
                                                            <li> {{ $training->endorser_country }},{{ $training->endorser_city }}
                                                            </li>
                                                            <li> {{ $training->endorser_email }}</li>
                                                            <li> {{ $training->in_person_location }}</li>
                                                            <li> {{ $training->grand_provide }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <a href="{{ asset($training->certificate) }}" target="_blank"
                                                    class="badge rounded-pill text-bg-dark">Verify Credentials<i
                                                        class='bx bx-link-alt'></i></a>

                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="pagination mt-5">
                                        {{ $trainings->links('pagination::bootstrap-4') }}
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
    
    
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const topbar = document.getElementById('topbar');
            if (window.scrollY > 40) {
                topbar.classList.add('scroll');
            } else {
                topbar.classList.remove('scroll');
            }
        });
        document.querySelectorAll('.view-trainings').forEach(viewTraining => {
    viewTraining.addEventListener('click', () => {
        document.querySelectorAll('.tabs-btn').forEach(tabsBtn => {
            tabsBtn.classList.remove('active')
        });
        document.querySelectorAll('.tab-pane').forEach(tabPane => {
            tabPane.classList.remove('active')
        });
        document.getElementById('profile-tab').classList.add('active')
        document.getElementById('profile-tab-pane').classList.add('active')
        document.getElementById('profile-tab-pane').classList.add('show')
    })
});

    </script>
@endsection
