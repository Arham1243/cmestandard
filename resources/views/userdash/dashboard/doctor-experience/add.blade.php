@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mb-5 pb-2">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add my CME training</h2>
                        </div>
                    </div>
                </div>
                <form class="main-form" method="POST" action="{{ route('dashboard.save_activity') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> title:</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Select Speciality:</label>
                                <select name="speciality_area_id" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($speciality_areas as $speciality)
                                        <option value="{{ $speciality->id }}"
                                            {{ old('speciality_area_id') == $speciality->id ? 'selected' : '' }}>
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
                                <label class="sub-heading"> Category:</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}"
                                            {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                                            {{ $category['name'] }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Provider / Accreditor
                                    :</label>
                                <input type="text" name="provider" class="form-control" value="{{ old('provider') }}"
                                    required>
                                @error('provider')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Format:</label>
                                <select name="format" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @php
                                        $formats = ['Live Online', 'Live in-person'];
                                    @endphp
                                    @foreach ($formats as $format)
                                        <option value="{{ $format }}"
                                            {{ old('format') == $format ? 'selected' : '' }}>
                                            {{ $format }}</option>
                                    @endforeach
                                </select>

                                @error('format')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Type:</label>
                                <select name="type" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @php
                                        $types = [
                                            'Group Learning',
                                            'Self Learning',
                                            'Assessment',
                                            'Hands on skill',
                                            'Simulation',
                                        ];
                                    @endphp
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                            {{ $type }}</option>
                                    @endforeach
                                </select>

                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Duration:</label>
                                <select name="duration" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    
                                    @foreach ($durations as $duration)
                                        <option value="{{ $duration }}"
                                            {{ old('duration') == $duration ? 'selected' : '' }}>
                                            {{ $duration }}</option>
                                    @endforeach
                                </select>

                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading" style="text-transform: inherit !important"> Location (in case of live in-person):</label>
                                <input type="text" name="in_person_location" class="form-control"
                                    value="{{ old('in_person_location') }}">
                                @error('in_person_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Grant Provider:</label>
                                <input type="text" name="grand_provide" class="form-control"
                                    value="{{ old('grand_provide') }}">
                                @error('grand_provide')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Content:</label>
                                <select name="content" class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @php
                                        $contents = ['Sponsored', 'Independent'];
                                    @endphp
                                    @foreach ($contents as $content)
                                        <option value="{{ $content }}"
                                            {{ old('content') == $content ? 'selected' : '' }}>
                                            {{ $content }}</option>
                                    @endforeach
                                </select>

                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Status:</label>
                                <select name="status" required class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @php
                                        $status_s = [
                                            'Completed',
                                            'Participated',
                                            'Attended',
                                            'Speaker',
                                            'Moderator',
                                            'Panelist',
                                            'Chair',
                                            'Organiser',
                                        ];
                                    @endphp
                                    @foreach ($status_s as $status)
                                        <option value="{{ $status }}"
                                            {{ old('status') == $status ? 'selected' : '' }}>
                                            {{ $status }}</option>
                                    @endforeach
                                </select>

                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Month/Year:</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}"
                                    required>
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Credit Hours:</label>
                                <input type="number" name="credit_hours" class="form-control"
                                    value="{{ old('credit_hours') }}" required>

                                @error('credit_hours')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading"> Certificate:</label>
                                <input type="file" name="certificate" class="form-control"
                                    value="{{ old('certificate') }}" required>
                                @error('certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Name:</label>
                                <input type="text" name="endorser_name" class="form-control"
                                    value="{{ old('endorser_name') }}" >
                                @error('endorser_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Title:</label>
                                <input type="text" name="endorser_title" class="form-control"
                                    value="{{ old('endorser_title') }}" >
                                @error('endorser_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Hospital:</label>
                                <input type="text" name="endorser_hospital" class="form-control"
                                    value="{{ old('endorser_hospital') }}" >
                                @error('endorser_hospital')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Email Address:</label>
                                <input type="email" name="endorser_email" class="form-control"
                                    value="{{ old('endorser_email') }}" >
                                @error('endorser_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser City:</label>
                                <input type="text" name="endorser_city" class="form-control"
                                    value="{{ old('endorser_city') }}" >
                                @error('endorser_city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Country:</label>
                                <input type="text" name="endorser_country" class="form-control"
                                    value="{{ old('endorser_country') }}" >
                                @error('endorser_country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>




                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="form-group">
                                <button class="primary-btn center-btn primary-bg">
                                    Add New</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        .sub-heading {
            font-size: 1.01rem !important;
            font-weight: 600 !important;
            text-transform: capitalize !important;
            margin-bottom: 0.5rem !important;
        }

        .heading {
            font-size: 1.5rem !important;
            font-weight: 500 !important;
            text-transform: capitalize !important;
            margin-bottom: 0.5rem !important;
        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function image_show(input, targetId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#" + targetId).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
