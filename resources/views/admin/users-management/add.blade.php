@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add New User</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.create_users') }}" method="POST" enctype="multipart/form-data" 
                class="main-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="title">Title <span class="text-danger">*</span>:</label>
                                    @php
                                        $academic_titles = ['Dr.', 'Prof.', 'Asst. Prof.', 'Asoc. Prof.'];
                                    @endphp
                                    <select required name="academic_title" class="form-control text-capitalize px-3">
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="title">Full Name <span class="text-danger">*</span>:</label>
                                    <input required class="form-control" autocomplete="off" value="{{ old('full_name') }}"
                                        type="text" placeholder="" name="full_name">

                                </div>
                                @error('full_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Phone:</label>
                            <input autocomplete="off" value="{{ old('phone') }}" type="text" placeholder=""
                                name="phone">

                        </div>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="title">Email<span class="text-danger">*</span>:</label>
                            <input required class="form-control" autocomplete="off" value="{{ old('email') }}" type="email"
                                placeholder="" name="email">

                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Select Speciality Area:</label>
                            <select class="form-control" name="speciality_area_id">
                                <opform-control tion value="" disabled selected>Select</opform-control>
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
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Select Speciality Interest:</label>
                            <select class="form-control" name="speciality_interest_id">
                                <opform-control tion value="" disabled selected>Select</opform-control>
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="title">Qualifications:</label>


                            <input class="form-control" autocomplete="off" value="{{ old('qualification') }}"
                                type="text" placeholder="" name="qualification">
                        </div>
                        @error('Qualifications')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Country ID Number
                                :</label>


                            <input autocomplete="off" value="{{ old('country_id_num') }}" type="number" placeholder=""
                                name="country_id_num">
                        </div>
                        @error('country_id_num')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Country:</label>


                            <input class="form-control" autocomplete="off" value="{{ old('country') }}" type="text"
                                placeholder="" name="country">
                        </div>
                        @error('country')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="title">Medical practice license Number
                                :</label>


                            <input class="form-control" autocomplete="off" value="{{ old('medical_license_number') }}"
                                type="text" placeholder="" name="medical_license_number">

                        </div>
                        @error('medical_license_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Institution Name :</label>
                            <input class="form-control" autocomplete="off" value="{{ old('institution_name') }}"
                                type="text" placeholder="" name="institution_name">

                        </div>
                        @error('institution_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="title">Institution City :</label>
                            <input class="form-control" autocomplete="off" value="{{ old('institution_city') }}"
                                type="text" placeholder="" name="institution_city">

                        </div>
                        @error('institution_city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="title">Birthday:</label>
                            <input class="form-control" autocomplete="off" autocomplete="off"
                                value="{{ old('birthday') }}" type="date" placeholder="" name="birthday">

                        </div>
                        @error('institution_city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label class="title">Password<span class="text-danger">*</span>:</label>
                            <input required class autocomplete="off" autocomplete="off" type="text" placeholder=""
                                class="passwordInput form-control" id="passwordInput" name="password">
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
                                onchange="thumb(this);" class="d-none">
                            <div class="placeholder-user__name">Profile Image</div>
                            @error('profile_img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12">
                        <button type="submit" class="primary-btn primary-bg mx-auto d-block">Add New</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
    
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
