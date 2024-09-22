@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Profile</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right d-flex justify-content-end">
                            <a href="{{ route('doctor_profile', Auth::user()->slug) }}" class="primary-btn primary-bg mc-r-2"
                                target="_blank"><i class="fa fa-eye"></i> View my
                                profile</a>

                            <a href="{{ route('dashboard.passwordChange') }}" class="primary-btn primary-bg"><i
                                    class="fa fa-user"></i> Change Password</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('dashboard.submitProfile') }}" method="POST" enctype="multipart/form-data"
                    class="main-form">
                    @csrf
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
                                <label for="profile-user-img"><i class="fa fa-pencil"></i></label>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><i class="fa fa-graduation-cap"></i> Title <span>*</span></label>
                                        @php
                                            $academic_titles = ['Dr.', 'Prof.', 'Asst. Prof.', 'Asoc. Prof.'];
                                        @endphp
                                        <select name="academic_title" required class="form-control">
                                            <option value="" disabled selected>Select</option>
                                            @foreach ($academic_titles as $academic_title)
                                                <option value="{{ $academic_title }}"
                                                    {{ $user->academic_title == $academic_title ? 'selected' : '' }}>
                                                    {{ $academic_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('academic_title'))
                                            <span class="text-danger">{{ $errors->first('academic_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group pl-3">
                                        <label><i class="fa fa-user"></i> Full Name <span>*</span></label>
                                        <input type="text" name="full_name" required class="form-control"
                                            value="{{ $user->full_name }}">
                                        @if ($errors->has('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group cursor-not-allowed">
                                <label><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                <div class="form-check mt-2 text-right">
                                    <input class="form-check-input" name="email_show_on_profile" type="checkbox"
                                        value="1" id="showOnProfileEmail"
                                        {{ $user->email_show_on_profile == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label text-" for="showOnProfileEmail">
                                        Show on profile
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-phone"></i> Phone </label>
                                <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
                                <div class="form-check mt-2 text-right">
                                    <input class="form-check-input" type="checkbox" value="1" id="showOnProfile"
                                        name="phone_show_on_profile"
                                        {{ $user->phone_show_on_profile == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="showOnProfile">
                                        Show on profile
                                    </label>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Select Speciality Area <span>*</span></label>
                                <select name="speciality_area_id" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($speciality_areas as $speciality)
                                        <option value="{{ $speciality->id }}"
                                            {{ $user->speciality_area_id == $speciality->id ? 'selected' : '' }}>
                                            {{ $speciality->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('speciality_area_id'))
                                    <span class="text-danger">{{ $errors->first('speciality_area_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Select Speciality Interest
                                    <span>*</span></label>
                                <select name="speciality_interest_id" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($speciality_interests as $interest)
                                        <option value="{{ $interest->id }}"
                                            {{ $user->speciality_interest_id == $interest->id ? 'selected' : '' }}>
                                            {{ $interest->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('speciality_interests'))
                                    <span class="text-danger">{{ $errors->first('speciality_interests') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-graduation-cap"></i> Qualification <span>*</span></label>
                                <input type="text" name="qualification" required class="form-control"
                                    value="{{ $user->qualification }}">
                                @if ($errors->has('qualification'))
                                    <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class='bx bx-file'></i> Country ID Number <span>*</span></label>
                                <input type="text" name="country_id_num" required class="form-control"
                                    value="{{ $user->country_id_num }}">
                                @if ($errors->has('country_id_num'))
                                    <span class="text-danger">{{ $errors->first('country_id_num') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Country <span>*</span></label>
                                <input type="text" required name="country" class="form-control"
                                    value="{{ $user->country }}">
                                @if ($errors->has('country'))
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class='bx bx-file'></i> Medical practice license Number <span>*</span></label>
                                <input type="text" required name="medical_license_number" class="form-control"
                                    value="{{ $user->medical_license_number }}">
                                @if ($errors->has('medical_license_number'))
                                    <span class="text-danger">{{ $errors->first('medical_license_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-university"></i> Institution Name <span>*</span></label>
                                <input type="text" name="institution_name" required class="form-control"
                                    value="{{ $user->institution_name }}">
                                @if ($errors->has('institution_name'))
                                    <span class="text-danger">{{ $errors->first('institution_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> Institution City <span>*</span></label>
                                <input type="text" name="institution_city" required class="form-control"
                                    value="{{ $user->institution_city }}">
                                @if ($errors->has('institution_city'))
                                    <span class="text-danger">{{ $errors->first('institution_city') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-calendar"></i> Birthday <span>*</span></label>
                                <input type="date" name="birthday" required class="form-control"
                                    value="{{ $user->birthday }}">
                                @if ($errors->has('birthday'))
                                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-pencil"></i> Bio <span>*</span></label>
                                <textarea rows="6" name="bio" required class="form-control">{{ $user->bio }}</textarea>
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

                        {{-- <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-pencil"></i> Long Description <span>*</span></label>
                                <textarea name="long_desc" rows="6" required class="form-control">{{ $user->long_desc }}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div> --}}





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





                        <!-- Submit Button -->
                        <div class="col-lg-12 col-md-12 col-12 text-center mt-4">
                            <button type="submit" class="primary-btn primary-bg text-center">Update Profile</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
        rel="stylesheet">

    <style type="text/css">
        /*select2*/
        .select2-selection.select2-selection {
            padding: 11px 20px;
            font-size: 13px;
            color: #666;
            border: 1px solid #666666;
            border-radius: 0.5rem;
            background: var(--c1);
            height: auto;
            box-shadow: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__clear {
            top: 50%;
            transform: translateY(-50%);
            margin-top: 0;
        }

        .select2-search__field {
            margin: 0 !important;
        }

        .select2-selection__rendered {
            padding: 0 !important;
        }

        .select2-container--bootstrap4 .select2-results__option {
            font-size: 13px;
            padding: 0.45rem 1rem;
            font-weight: 500;
        }

        .select2-container--bootstrap4 .select2-results__option:not(:last-child) {
            border-bottom: 1px solid #ccc;
        }

        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected="true"] {
            background: var(--c1);
        }

        .select2-container--bootstrap4.select2-container--focus .select2-selection {
            border: 1px solid #666666 !important;
            box-shadow: none !important;
        }

        .custom-select2-wrapper .form-control {
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            height: auto !important;
            min-height: auto !important;
        }

        .select2-container--bootstrap4 .select2-dropdown .select2-results__option[aria-selected="true"] {
            background: var(--c1);
            color: #fff;
        }

        .custom-select2-wrapper {
            margin-bottom: 30px;
        }

        /*select2*/

        .form-check {
            display: flex;
            align-items: center;
            gap: 1rem;
            width: fit-content;
            margin-left: auto;
        }

        .form-check label {
            line-height: 1;
            display: block;
            margin-top: 0.45rem;
            user-select: none;
            cursor: pointer;
        }

        .form-check-input {
            accent-color: var(--c1);
            scale: 1.3;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log('sad');
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo_img_my')
                        .attr('src', e.target.result);
                    console.log(e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $('.custom-select2').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: 'style',
                    placeholder: $(this).attr('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });
            });
        });
        (() => {
            /*in page css here*/
        })()
    </script>
@endsection
