@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Banner</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.createhomeSlider') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Page*:</label>
                                <select name="table_name" class="form-controll w-100" required>
                                    <option selected disabled>Select Page</option>
                                    <option value="about">About Us</option>
                                    <option value="blog">Blogs</option>
                                    <option value="cart">Cart</option>
                                    <option value="categories">Categories</option>
                                    <option value="checkout">Checkout</option>
                                    <option value="contact">Contact</option>
                                    <option value="login">Login</option>
                                    <option value="product">Product</option>
                                    <option value="testimonials">Testimonials</option>
                                </select>
                                @if ($errors->has('table_name'))
                                    <span class="text-danger">{{ $errors->first('table_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Main Heading*:</label>
                                <input type="text" class="headings w-100" name="headings" required>
                                @if ($errors->has('headings'))
                                    <span class="text-danger">{{ $errors->first('headings') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Banner Image</h3>
                                <figure><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img"
                                        alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" required onchange="thumb(this);" name="homeslider" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                                @if ($errors->has('homeslider'))
                                    <span class="text-danger">{{ $errors->first('homeslider') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">

                                <button id="add-record" type="button" class="mt-3 primary-btn primary-bg">Add New</button>
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
        (() => {

            $('#add-record').click(function(e) {
                if ($("#thumbnail-img").val() == "") {
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text: 'Please Select A Banner Image!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });
                } else {
                    $('#add-record-form').submit();
                }

            });

        })()
    </script>
@endsection
