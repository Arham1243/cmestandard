@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mb-5 pb-2">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit my CME training</h2>
                        </div>
                    </div>
                </div>
                <form class="main-form" method="POST" action="{{ route('dashboard.update_activity', $activity->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Title:</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $activity->title) }}" required>
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
                                            {{ old('speciality_area_id', $activity->speciality_area_id) == $speciality->id ? 'selected' : '' }}>
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
                                <label class="sub-heading">Category:</label>

                                <select name="category_id" class="form-control">
                                    <option value="" disabled>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}"
                                            {{ old('category_id', $activity->category_id) == $category['id'] ? 'selected' : '' }}>
                                            {{ $category['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Repeat similar sections for other fields, ensuring that the value attribute is filled with the existing data from $activity -->

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Provider / Accreditor:</label>
                                <input type="text" name="provider" class="form-control"
                                    value="{{ old('provider', $activity->provider) }}" required>
                                @error('provider')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Format:</label>
                                @php
                                    $formats = ['Live Online', 'Live in-person'];
                                @endphp
                                <select name="format" class="form-control" required>
                                    <option value="" disabled>Select</option>
                                    @foreach ($formats as $format)
                                        <option value="{{ $format }}"
                                            {{ old('format', $activity->format) == $format ? 'selected' : '' }}>
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
                                        <option value="{{ $type }}"
                                            {{ old('type', $activity->type) == $type ? 'selected' : '' }}>
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
                                <label class="sub-heading">Duration:</label>
                                <select name="duration" required class="form-control">
                                    <option value="" disabled>Select</option>
                                    @php
                                        $durations = [
                                            'Half Day',
                                            '1 Day',
                                            '2 Days',
                                            '3 Days',
                                            '4 Days',
                                            '5 Days',
                                            '6 Days',
                                            'upto',
                                            '21 Days',
                                            '1 Month',
                                            '2 Months',
                                            '3 Months',
                                            '4 Months',
                                            '5 Months',
                                            '6 Months',
                                            '9 Months',
                                            '1 Year',
                                            'Other',
                                        ];
                                    @endphp
                                    @foreach ($durations as $duration)
                                        <option value="{{ $duration }}"
                                            {{ old('duration', $activity->duration) == $duration ? 'selected' : '' }}>
                                            {{ $duration }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading" style="text-transform: inherit !important"> Location (in case of
                                    live in-person):</label>
                                <input type="text" name="in_person_location" class="form-control"
                                    value="{{ old('in_person_location', $activity->in_person_location) }}">
                                @error('in_person_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Grant Provider:</label>
                                <input type="text" name="grand_provide" class="form-control" required
                                    value="{{ old('grand_provide', $activity->grand_provide) }}">
                                @error('grand_provide')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Content:</label>
                                <select name="content" required class="form-control">
                                    <option value="" disabled>Select</option>
                                    @php
                                        $contents = ['Sponsored', 'Independent'];
                                    @endphp
                                    @foreach ($contents as $content)
                                        <option value="{{ $content }}"
                                            {{ $activity->content == $content ? 'selected' : '' }}>
                                            {{ $content }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Status:</label>
                                <select name="status" required class="form-control">
                                    <option value="" disabled>Select</option>
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
                                            {{ $activity->status == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Month/Year:</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ old('date', $activity->date) }}" required>
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Credit Hours:</label>
                                <input type="number" name="credit_hours" class="form-control"
                                    value="{{ old('endorser_name', $activity->credit_hours) }}" required>
                                @error('credit_hours')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Certificate:</label>
                                <input type="file" name="certificate" class="form-control">
                                <p><strong>Current File:</strong> <a target="_blank"
                                        href="{{ asset($activity->certificate) }}">Open in new Tab</a></p>
                                @error('certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Name:</label>
                                <input type="text" name="endorser_name" class="form-control"
                                    value="{{ old('endorser_name', $activity->endorser_name) }}" required>
                                @error('endorser_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Title:</label>
                                <input type="text" name="endorser_title" class="form-control"
                                    value="{{ old('endorser_title', $activity->endorser_title) }}" required>
                                @error('endorser_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Hospital:</label>
                                <input type="text" name="endorser_hospital" class="form-control"
                                    value="{{ old('endorser_hospital', $activity->endorser_hospital) }}" required>
                                @error('endorser_hospital')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Email Address:</label>
                                <input type="email" name="endorser_email" class="form-control"
                                    value="{{ old('endorser_email', $activity->endorser_email) }}" required>
                                @error('endorser_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser City:</label>
                                <input type="text" name="endorser_city" class="form-control"
                                    value="{{ old('endorser_city', $activity->endorser_city) }}" required>
                                @error('endorser_city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Endorser Country:</label>
                                <input type="text" name="endorser_country" class="form-control"
                                    value="{{ old('endorser_country', $activity->endorser_country) }}" required>
                                @error('endorser_country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="form-group">
                                <button class="primary-btn center-btn primary-bg">Save Changes</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style type="text/css">
        .sub-heading {
            font-size: 1.01rem !important;
            font-weight: 600 !important;
            text-transform: capitalize !important;
            margin-bottom: 0.5rem !important;
        }
    </style>
@endsection
