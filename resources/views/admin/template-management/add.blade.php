@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Template</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.save_template') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Title:</label>

                                <input type="text" name="title"  class="form-control" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 text-center">
                            <div class="img-upload-wrapper ">
                                <h3>Preview Image</h3>
                                <figure>
                                    <img src="{{ old('thumbnails') ? old('thumbnails') : asset('admin/images/placeholder.png') }}"
                                        class="thumbnail-img" id="profie-img" alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file"onchange="readURL(this, 'profie-img');" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">

                            </div>
                            @if ($errors->has('thumbnails'))
                                <span class="error">{{ $errors->first('thumbnails') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg">Add New</button>
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
