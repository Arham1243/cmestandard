@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Welcome Banner</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.updatewelcomeSlider') }}" method="POST"
                    class="main-form mc-b-3" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="id" value="{{ $welcome_slider->id }}">
                    <div class="row align-items-end">
                        
                        

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Sub Heading:</label>
                                <input type="text" name="subHeading" class="form-control"
                                    value="{{ $welcome_slider->subHeading }}">
                                @if ($errors->has('subHeadings'))
                                    <span class="text-danger">{{ $errors->first('subHeading') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Main Heading:</label>
                                <input type="text" name="headings" class="form-control"
                                    value="{{ $welcome_slider->headings }}">
                                @if ($errors->has('headings'))
                                    <span class="text-danger">{{ $errors->first('headings') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Description:</label>
                                <textarea rows="5" class="form-control" name="long_desc" placeholder="Enter Short Description">{{ $welcome_slider->long_desc }}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Youtube Video Link:</label>
                                <input type="url" name="video_link" value="{{ $welcome_slider->video_link  }}">
                                @if ($errors->has('video_link'))
                                    <span class="text-danger">{{ $errors->first('video_link') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Banner Image</h3>
                                <figure><img src="{{ asset($welcome_slider->img_path ?? 'images/placeholder.png') }}"
                                        class="thumbnail-img" alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file"  onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                                @if ($errors->has('thumbnails'))
                                    <span class="text-danger">{{ $errors->first('thumbnails') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button class="primary-btn primary-bg">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>

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
