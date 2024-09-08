@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>My Profile</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right d-flex justify-content-end">
                            <a href="{{ route('dashboard.editProfile') }}" class="primary-btn primary-bg mc-r-2"><i
                                    class="fa fa-pencil"></i> Edit Profile</a>

                            <a href="{{ route('doctor_profile', Auth::user()->slug) }}"
                                class="primary-btn primary-bg mc-r-2" target="_blank"><i class="fa fa-eye"></i> View my
                                Public profile</a>

                        </div>
                    </div>
                </div>
                <form class="main-form">
                    <div class="row">
                        <!-- Profile Image -->
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile-img">
                                @if (null !== $user->profile_img && !empty($user->profile_img))
                                    <figure><img src="{{ asset($user->profile_img) }}" id="logo_img_my" alt="user-img">
                                    </figure>
                                @else
                                    <figure><img src="{{ asset('admin/images/placeholder.png') }}" id="logo_img_my"
                                            alt="user-img"></figure>
                                @endif
                                <input type="file" id="profile-user-img" name="avatar" class="d-none"
                                    onchange="readURL(this);" accept="image/jpeg, image/png">
                                {{-- <label for="profile-user-img"><i class="fa fa-pencil"></i></label> --}}
                            </div>
                        </div>

                        <!-- About Info Fields -->
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Membership ID <span>*</span></label>
                                <input type="text" name="custom_id" readonly class="form-control"
                                    value="{{ $user->custom_id }}">
                                @if ($errors->has('custom_id'))
                                    <span class="text-danger">{{ $errors->first('custom_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Full Name <span>*</span></label>
                                <input type="text" name="full_name" readonly class="form-control"
                                    value="{{ $user->full_name }}">
                                @if ($errors->has('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-phone"></i> Phone <span>*</span></label>
                                <input type="tel" name="phone" readonly class="form-control"
                                    value="{{ $user->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Speciality Area <span>*</span></label>
                                <input type="text" readonly class="form-control"
                                    value="{{ $speciality_areas->where('id', "$user->speciality_area_id")->first()->name ?? '' }}">
                                @if ($errors->has('speciality_area_id'))
                                    <span class="text-danger">{{ $errors->first('speciality_area_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Speciality Area <span>*</span></label>
                                <input type="text" readonly class="form-control"
                                    value="{{ $speciality_interests->where('id', "$user->speciality_interest_id")->first()->name ?? '' }}">
                                @if ($errors->has('speciality_interests'))
                                    <span class="text-danger">{{ $errors->first('speciality_interests') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Qualification <span>*</span></label>
                                <input type="text" name="qualification" readonly class="form-control"
                                    value="{{ $user->qualification }}">
                                @if ($errors->has('qualification'))
                                    <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class='bx bx-file'></i> Country ID Number <span>*</span></label>
                                <input type="text" name="country_id_num" readonly class="form-control"
                                    value="{{ $user->country_id_num }}">
                                @if ($errors->has('country_id_num'))
                                    <span class="text-danger">{{ $errors->first('country_id_num') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Country <span>*</span></label>
                                <input type="text" readonly name="country" class="form-control"
                                    value="{{ $user->country }}">
                                @if ($errors->has('country'))
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class='bx bx-file'></i> Medical practice license Number <span>*</span></label>
                                <input type="text" readonly name="medical_license_number" class="form-control"
                                    value="{{ $user->medical_license_number }}">
                                @if ($errors->has('medical_license_number'))
                                    <span class="text-danger">{{ $errors->first('medical_license_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-university"></i> Institution Name <span>*</span></label>
                                <input type="text" name="institution_name" readonly class="form-control"
                                    value="{{ $user->institution_name }}">
                                @if ($errors->has('institution_name'))
                                    <span class="text-danger">{{ $errors->first('institution_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> Institution City <span>*</span></label>
                                <input type="text" name="institution_city" readonly class="form-control"
                                    value="{{ $user->institution_city }}">
                                @if ($errors->has('institution_city'))
                                    <span class="text-danger">{{ $errors->first('institution_city') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-calendar"></i> Birthday <span>*</span></label>
                                <input type="date" name="birthday" readonly class="form-control"
                                    value="{{ $user->birthday }}">
                                @if ($errors->has('birthday'))
                                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-pencil"></i> Bio <span>*</span></label>
                                <input type="text" name="bio" readonly class="form-control"
                                    value="{{ $user->bio }}">
                                @if ($errors->has('bio'))
                                    <span class="text-danger">{{ $errors->first('bio') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-home"></i> Address <span>*</span></label>
                                <input type="text" name="address" required class="form-control"
                                    value="{{ $user->address }}">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> City <span>*</span></label>
                                <input type="text" name="city" required class="form-control"
                                    value="{{ $user->city }}">
                                @if ($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-pencil"></i> Long Description <span>*</span></label>
                                <textarea name="long_desc" rows="6" readonly class="form-control">{{ $user->long_desc }}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>





                        {{-- <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-tasks"></i> Procedures Performed <span>*</span></label>
                                <input type="number" name="procedures_performed" required class="form-control"
                                    value="{{ $user->procedures_performed }}">
                                @if ($errors->has('procedures_performed'))
                                    <span class="text-danger">{{ $errors->first('procedures_performed') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-users"></i> Patients Treated <span>*</span></label>
                                <input type="number" name="patients_treated" required class="form-control"
                                    value="{{ $user->patients_treated }}">
                                @if ($errors->has('patients_treated'))
                                    <span class="text-danger">{{ $errors->first('patients_treated') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-clock"></i> Years of Experience <span>*</span></label>
                                <input type="number" name="years_of_exp" required class="form-control"
                                    value="{{ $user->years_of_exp }}">
                                @if ($errors->has('years_of_exp'))
                                    <span class="text-danger">{{ $errors->first('years_of_exp') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group mb-2">
                                <label><i class="fa fa-language"></i> Select Languages <span>*</span></label>
                            </div>
                            @php
                                $selectedLanguages = json_decode($user->languages, true) ?? [];
                                $availableLanguages = [
                                    'English',
                                    'Spanish',
                                    'Urdu',
                                    'Hindi',
                                    'French',
                                    'German',
                                    'Chinese',
                                ];
                            @endphp

                            <select name="languages[]" class="form-control custom-select2" required multiple
                                placeholder="Select Languages" data-allow-clear="1">
                                @foreach ($availableLanguages as $language)
                                    <option value="{{ $language }}"
                                        {{ in_array($language, $selectedLanguages) ? 'selected' : '' }}>
                                        {{ $language }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('languages'))
                                <span class="error">{{ $errors->first('languages') }}</span>
                            @endif
                        </div> --}}





                    </div>



                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page css here*/
        })()
    </script>
@endsection
