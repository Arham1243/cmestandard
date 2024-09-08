@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add profile</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_profile') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" name="role_id" value="1">
                    <div class="row align-items-end">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Full Name*:</label>
                                <input type="text" name="full_name" id="name" value="{{ old('full_name') }}"
                                    required class="form-control" placeholder="Enter Name">
                                @if ($errors->has('full_name'))
                                    <span class="error">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Institute Name*:</label>
                                <input type="text" name="username" id="name" value="{{ old('username') }}" required
                                    class="form-control" placeholder="Enter Username">
                                @if ($errors->has('username'))
                                    <span class="error">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Email*:</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="form-control" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Password*:</label>
                                <input type="text" name="password" id="password" value="{{ old('password') }}" required
                                    class="form-control" placeholder="Enter password">
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Profile Image</h3>
                                <figure><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img"
                                        alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                            </div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button id="add-record" type="submit" class="primary-btn primary-bg">Add profile</button>
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
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;
        }

        .picture {
            max-width: 288px;
            height: 113px;

        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function thumb(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.thumbnail-img')
                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
