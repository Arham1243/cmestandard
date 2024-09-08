@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Testimonial</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.savetestimonial') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ $testimonial->name }}">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6">
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
                                <input type="hidden" name="id" value="{{ $testimonial->id }}">
                                @if ($errors->has('description'))
                                    <span class="error">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 mb-2">
                            <div class="form-group ">
                                <label  class="d-block text-center">rating:</label>
                                <div class="rating">
                                    <input type="radio"  {{ $testimonial->rating == 5 ? 'checked' : '' }} id="star5" name="rating" value="5" />
                                    <label class="star" for="star5" title="Awesome"></label>
                                    <input type="radio"  {{ $testimonial->rating == 4 ? 'checked' : '' }} id="star4" name="rating" value="4" />
                                    <label class="star" for="star4" title="Great"></label>
                                    <input type="radio"  {{ $testimonial->rating == 3 ? 'checked' : '' }} id="star3" name="rating" value="3" />
                                    <label class="star" for="star3" title="Very good"></label>
                                    <input type="radio"  {{ $testimonial->rating == 2 ? 'checked' : '' }} id="star2" name="rating" value="2" />
                                    <label class="star" for="star2" title="Good"></label>
                                    <input type="radio"  {{ $testimonial->rating == 1 ? 'checked' : '' }} id="star1" name="rating" value="1" />
                                    <label class="star" for="star1" title="Bad"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 text-center">
                            <div class="img-upload-wrapper ">
                                <h3>Testimonial Image</h3>
                                <figure>
                                    <img src="{{ asset($testimonial->img_path ?? 'admin/images/placeholder.png') }}"
                                        class="thumbnail-img" id="profie-img" alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file"onchange="readURL(this, 'profie-img');" name="thumbnails"
                                    id="thumbnail-img" class="d-none" accept="image/jpeg, image/png">

                            </div>
                            @if ($errors->has('thumbnails'))
                                <span class="error">{{ $errors->first('thumbnails') }}</span>
                            @endif
                        </div>


                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <div class="text-center">

                            <button type="submit" class="primary-btn primary-bg">Save Changes</button>
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

        .recommend {
            color: #D75DB2;
        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        (() => {



        })()
    </script>
@endsection
