@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Edit Banner</h2>
                        @foreach ($welcome_slider as $slider)
                            <h2>{{ $slider->get_profiles->username }} Profile</h2>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" method="POST" class="main-form mc-b-3" enctype="multipart/form-data"
                    action="{{ route('admin.profile.updatewelcomeSlider') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                    <input type="hidden" name="profile_id" value="{{ $slider->get_profiles->id }}">
                    <div class="row align-items-end">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Sub Heading:</label>
                                <input type="text" name="subHeading" class="form-control"
                                    value="{{ $slider->subHeading }}">
                                @if ($errors->has('subHeading'))
                                    <span class="text-danger">{{ $errors->first('subHeading') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Main Heading:</label>
                                <input type="text" name="headings" class="form-control" value="{{ $slider->headings }}">
                                @if ($errors->has('headings'))
                                    <span class="text-danger">{{ $errors->first('headings') }}</span>
                                @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Button Text:</label>
                                <input type="text" name="btn_text" class="form-control" value="{{$slider->btn_text}}">
                                @if ($errors->has('btn_text'))
                                    <span class="text-danger">{{ $errors->first('btn_text') }}</span>
                                @endif
                            </div>
                        </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Button Link:</label>
                                <input type="link" name="btn_link" class="form-control" value="{{$slider->btn_link}}">
                                @if ($errors->has('btn_link'))
                                    <span class="text-danger">{{ $errors->first('btn_link') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Description:</label>
                                <textarea rows="5" class="form-control" name="long_desc" placeholder="Enter Long Description">{{ $slider->long_desc }}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Banner Image</h3>
                            <figure><img src="{{ asset($slider->img_path) }}" class="thumbnail-img" alt="thumbnail">
                            </figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                class="d-none" accept="image/jpeg, image/png">
                        </div>

                    </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">

                                <button id="add-record" type="submit" class="primary-btn primary-bg">Update</button>
                            </div>
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
    </script>
@endsection
