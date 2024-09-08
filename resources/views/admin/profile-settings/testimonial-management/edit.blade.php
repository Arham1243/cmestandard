@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Edit Leader</h2>
                        <h2>{{ $testimonial->get_testimonial_profiles->username }} Profile</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.profile.update_testimonial') }}"
                    enctype="multipart/form-data" method="POST" class="main-form mc-b-3">
                    <input type="hidden" name="id" value="{{ $testimonial->id }}">

                    @csrf
                    <div class="row align-items-end">



                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ $testimonial->name }}">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label>Designation:</label>

                                <input type="text" name="designation" required class="form-control"
                                    value="{{ $testimonial->designation }}">
                                @if ($errors->has('designation'))
                                    <span class="error">{{ $errors->first('designation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Description*:</label>
                                <textarea name="description" id="description" required class="form-control" placeholder="Enter Description">{{ $testimonial->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Leader Image</h3>
                                <figure><img src="{{ asset($testimonial->img_path) }}" class="thumbnail-img"
                                        alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                            </div>

                        </div>



                    </div>


            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="text-center">

                    <button type="submit" class="primary-btn primary-bg">Save Changes</button>
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

        .recommend {
            color: #D75DB2;
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
