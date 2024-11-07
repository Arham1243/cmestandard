@extends('layouts.main')
@section('content')
    <style>
        .footer-bg {
            height: 100%;
        }
    </style>

    <!-- page-title -->
    <div class="page-title">
        <div class="page-title__img">
            <img src="{{ asset('assets/images/banner-new.png') }}" alt="image" class="imgFluid">
        </div>
        <div class="page-title__content">
            <h1 class="title">Sign Up</h1>
        </div>
    </div>

    <!-- sign-up -->
    <div class="sign-up">
        <div class="auth mar-y">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="auth__form">
                            <div class="section-content text-center mb-4">
                                <h2 class="subHeading">Sign Up Now</h2>
                            </div>
                            <form action="{{ route('sign-up-submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Title <span class="text-danger">*</span>:</label>
                                            @php
                                                $academic_titles = ['Dr.', 'Prof.', 'Asst. Prof.', 'Asoc. Prof.'];
                                            @endphp
                                            <select name="academic_title" required class="text-capitalize px-3">
                                                <option value="" disabled selected>Select</option>
                                                @foreach ($academic_titles as $academic_title)
                                                    <option value="{{ $academic_title }}">
                                                        {{ $academic_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('academic_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Full Name <span class="text-danger">*</span>:</label>
                                            <input autocomplete="off" value="{{ old('full_name') }}" type="text"
                                                placeholder="" name="full_name" required>

                                        </div>
                                        @error('full_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Email <span class="text-danger">*</span>:</label>
                                            <input autocomplete="off" value="{{ old('email') }}" type="email"
                                                placeholder="" name="email" required>

                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Phone:</label>
                                            <input autocomplete="off" value="{{ old('phone') }}" type="text"
                                                placeholder="" name="phone">

                                        </div>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Select Speciality Area <span
                                                    class="text-danger">*</span>:</label>
                                            <select name="speciality_area_id" required>
                                                <option value="" disabled selected>Select</option>
                                                @foreach ($speciality_areas as $speciality)
                                                    <option value="{{ $speciality->id }}"
                                                        {{ old('speciality_area_id') == $speciality->id ? 'selected' : '' }}>
                                                        {{ $speciality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('speciality_area_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Select Speciality Interest <span
                                                    class="text-danger">*</span>:</label>
                                            <select name="speciality_interest_id" required>
                                                <option value="" disabled selected>Select</option>
                                                @foreach ($speciality_interests as $interest)
                                                    <option value="{{ $interest->id }}"
                                                        {{ old('speciality_interest_id') == $interest->id ? 'selected' : '' }}>
                                                        {{ $interest->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('speciality_interest_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Qualifications <span class="text-danger">*</span>:</label>


                                            <input autocomplete="off" value="{{ old('qualification') }}" type="text"
                                                placeholder="" name="qualification" required>
                                        </div>
                                        @error('Qualifications')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Country ID Number
                                                <span class="text-danger">*</span>:</label>


                                            <input autocomplete="off" value="{{ old('country_id_num') }}" type="number"
                                                placeholder="" name="country_id_num" required>
                                        </div>
                                        @error('country_id_num')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Country <span class="text-danger">*</span>:</label>


                                            <input autocomplete="off" value="{{ old('country') }}" type="text"
                                                placeholder="" name="country">
                                        </div>
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Medical practice license Number
                                                <span class="text-danger">*</span>:</label>


                                            <input autocomplete="off" value="{{ old('medical_license_number') }}"
                                                type="text" placeholder="" name="medical_license_number" required>

                                        </div>
                                        @error('medical_license_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Institution Name <span
                                                    class="text-danger">*</span>:</label>
                                            <input autocomplete="off" value="{{ old('institution_name') }}"
                                                type="text" placeholder="" name="institution_name" required>

                                        </div>
                                        @error('institution_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Institution City <span
                                                    class="text-danger">*</span>:</label>
                                            <input autocomplete="off" value="{{ old('institution_city') }}"
                                                type="text" placeholder="" name="institution_city" required>

                                        </div>
                                        @error('institution_city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Birthday <span class="text-danger">*</span>:</label>
                                            <input autocomplete="off" autocomplete="off" value="{{ old('birthday') }}"
                                                type="date" placeholder="" name="birthday" required>

                                        </div>
                                        @error('institution_city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputField">
                                            <label class="title">Password <span class="text-danger">*</span>:</label>
                                            <div class="position-relative">
                                                <input autocomplete="off" autocomplete="off" type="password"
                                                    placeholder="" class="passwordInput" id="passwordInput"
                                                    name="password" required>

                                                <span class="icon showPassword" onclick="showHide()">
                                                    <i class='bx bxs-show' id="toggleIcon"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="placeholder-user">
                                            <label class="placeholder-user__img" for="profile-img">
                                                <img src="{{ asset('assets/images/user.png') }}" alt="image"
                                                    class="imgFluid profile-img" loading="lazy">
                                            </label>
                                            <input autocomplete="off" type="file" name="profile_img" id="profile-img"
                                                onchange="thumb(this);" class="d-none" required>
                                            <div class="placeholder-user__name">Profile Image</div>
                                            @error('profile_img')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="themeBtn themeBtn--full justify-content-center">SIGN
                                            UP</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function thumb(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-img')
                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
