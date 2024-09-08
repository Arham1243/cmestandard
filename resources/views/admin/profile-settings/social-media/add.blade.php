@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Social Media</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.profile.addSocialInfo') }}" method="POST" class="main-form">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group ">
                            <label>Select Profile*:</label>
                            <select name="profile_id" class="form-control w-100" id="profile-selection">
                                <option value="" selected disabled>Select Profile</option>
                                @foreach ($profiles as $profile)
                                    <option value="{{ $profile->id }}">
                                        {{ $profile->username }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('profile_id'))
                                <span class="error">{{ $errors->first('profile_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Facebook:</label>
                            <input type="url" name="facebook" required class="form-control"
                                value="" placeholder="Enter Facebook Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Instagram:</label>
                            <input type="url" name="instagram" required class="form-control"
                                value="" placeholder="Enter Instagram Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Youtube:</label>
                            <input type="url" name="youtube" required class="form-control"
                                value="" placeholder="Enter Youtube Address">
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Twitter:</label>
                            <input type="url" name="twitter" required class="form-control" value=""
                                placeholder="Enter Twitter Address">
                        </div>
                    </div>


                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg">Save</button>
                        </div>
                    </div>
            </form>
        </div>

    </div>
    </div>
    </div>
    </div>

    
@endsection
@section('css')
    <style type="text/css">

    </style>
@endsection
@section('js')

@endsection
