@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between">
                        <h2>Add Social Media</h2>
                        @foreach ($profile_config as $config)
                            <h2>{{ $config->get_profiles->username }} Profile</h2>
                        @endforeach
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.profile.updateSocialInfo') }}" method="POST" class="main-form">
                @csrf
                <input type="hidden" name="profile_id" value="{{$config->profile_id}}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Facebook:</label>
                            <input type="text" name="facebook" required class="form-control"
                                value="{{ $config->facebook }}" placeholder="Enter Facebook Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Instagram:</label>
                            <input type="text" name="instagram" required class="form-control"
                                value="{{ $config->instagram }}" placeholder="Enter Instagram Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Youtube:</label>
                            <input type="text" name="youtube" required class="form-control"
                                value="{{ $config->facebook }}" placeholder="Enter Youtube Address">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Twitter:</label>
                            <input type="text" name="twitter" required class="form-control"
                                value="{{ $config->twitter }}" placeholder="Enter Twitter Address">
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
    (()=>{

    /*in page css here*/
    })()
    </script>
@endsection
