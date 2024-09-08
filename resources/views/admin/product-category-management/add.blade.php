@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Category</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.save_product_category') }}" method="POST" enctype="multipart/form-data"
                class="main-form create_user_form">
                @csrf

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label> Category title*:</label>
                            <input type="text" name="title" id="name" class="form-control"
                                placeholder="Enter Title">
                        </div>
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Category thumbnail</h3>
                            <figure><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img main_image"
                                    id="product-img" alt="user-img"></figure>
                            <label for="img_path" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="readURL(this, 'product-img');" name="thumbnails" id="img_path"
                                class="d-none" accept="image/jpeg, image/png">
                            @if ($errors->has('img_path'))
                                <span class="error">{{ $errors->first('img_path') }}</span>
                            @endif
                        </div>

                    </div>


                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg add-user">Add New</button>
                        </div>
                    </div>
            </form>
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

        .recommend {
            color: #D75DB2;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {

        })()
    </script>
@endsection
