@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>EDIT BANNER</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.updatehomeSlider') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">
                    @csrf

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Banner Heading:</label>
                            <input type="text" name="headings" value="{{ $home_slider->headings }}" class="form-control">
                            @if ($errors->has('headings'))
                                <span class="error">{{ $errors->first('headings') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{ $home_slider->id }}">
                        <input type="hidden" name="table_name" value="{{ $home_slider->table_name }}">
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Banner Image</h3>
                            <figure><img src="{{ asset($home_slider->img_path) }}" class="thumbnail-img" alt="user-img">
                            </figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="thumb(this);" name="homeslider" id="thumbnail-img"
                                class="d-none" accept="image/jpeg, image/png">
                        </div>
                    </div>
                    

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">

                            <button id="add-record" type="submit" class="primary-btn primary-bg">Update</button>
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





        (() => {

            // $('#add-record').click(function(e)
            // {
            // if($("#thumbnail-img").val() == "")
            // {
            //         $.toast({
            //             heading: 'Error!',
            //             position: 'bottom-right',
            //             text:  'Please Select A Banner Image!',
            //             loaderBg: '#ff6849',
            //             icon: 'error',
            //             hideAfter: 2000,
            //             stack: 6
            //         });
            // }
            // else
            // {
            //     $('#add-record-form').submit();
            // }

            // });

        })()
    </script>
@endsection
