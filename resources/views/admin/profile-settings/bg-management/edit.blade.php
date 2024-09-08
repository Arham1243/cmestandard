@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Edit Background</h2>
                        <h2>{{ $bg->get_bg_profiles->username }}</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.profile.update_bg') }}"
                    enctype="multipart/form-data" method="POST" class="main-form mc-b-3">
                    <input type="hidden" name="profile_id" value="{{ $bg->profile_id }}">
                    <input type="hidden" name="id" value="{{ $bg->id }}">
                    @csrf
                    <input type="hidden" name="type" id="type" value="{{ $bg->type }}">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="options-wrapper">
                                <div class="form-group">
                                    <label for="bg-img">Background Image:</label>
                                    <input type="radio" name="background" id="bg-img" class="bg_img" {{$bg->type == 1 ? 'checked' : ''}}>
                                </div>
                                <div class="form-group">
                                    <label for="bg-color">Background Color:</label>
                                    <input type="radio" name="background" id="bg-color" class="bg_color" {{$bg->type == 2 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center bg_img_div " style="display: {{$bg->type == 1 ? 'block' : 'none'}};">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Background Image</h3>
                                <figure class="thumbnail-wrapper"><img src="{{ asset($bg->img_path ?? 'images/placeholder.png') }}"
                                        class="thumbnail-img" alt="thumbnail">
                                </figure>
                                <label for="bg_img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="bg_img" id="bg_img" class="d-none"
                                    accept="image/jpeg, image/png">
                            </div>
                        </div>
                        <div class="col-lg-6 bg_color_div my-5 " style="display: {{$bg->type == 2 ? 'block' : 'none'}};">
                            <div class="form-group w-75 m-auto">
                                <label>Background Color <i class="fa fa-eyedropper" aria-hidden="true"></i></label>
                                <label class="color-code-wrapper" for="color_code">
                                    <input class="code" value="{{$bg->color_code ?? ''}}" type="text">
                                    <input type="color" class="color-code" name="color_code" id="color_code"
                                        value="{{$bg->color_code ?? ''}}" class="form-control">
                                </label>
                                @if ($errors->has('color_code'))
                                    <span class="error">{{ $errors->first('color_code') }}</span>
                                @endif
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

        .picture {
            max-width: 288px;
            height: 113px;

        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
     
    const colorInput = document.getElementById('color_code');
    const colorCodeInput = document.querySelector('.code');

    // Function to update the color input value and the span content
    function updateColor() {
        const selectedColor = colorInput.value;
        colorCodeInput.value = selectedColor;
    }

    // Event listener on color input to update the color code input
    colorInput.addEventListener('change', () => {
        updateColor();
    });

    // Event listener on the color code input to update the color input
    colorCodeInput.addEventListener('input', () => {
        const colorCode = colorCodeInput.value;
        colorInput.value = colorCode;
    });
    
    
        function thumb(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var thumbnailImg = $(input).siblings('.thumbnail-wrapper').find('img'); // Get the thumbnail image

                reader.onload = function(e) {
                    thumbnailImg.attr('src', e.target.result); // Update the thumbnail image source
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        // Get the radio buttons and div elements
        const bgColorRadio = document.querySelector('.bg_color');
        const bgImgRadio = document.querySelector('.bg_img');
        const bgColorDiv = document.querySelector('.bg_color_div');
        const bgImgDiv = document.querySelector('.bg_img_div');

        // Add event listeners to the radio buttons
        bgColorRadio.addEventListener('change', () => {
            if (bgColorRadio.checked) {
                bgColorDiv.style.display = 'block';
                bgImgDiv.style.display = 'none';
                $("#type").val('2')
            }
        });

        bgImgRadio.addEventListener('change', () => {
            if (bgImgRadio.checked) {
                bgColorDiv.style.display = 'none';
                bgImgDiv.style.display = 'block';
                $("#type").val('1')
            }
        });
    </script>
@endsection
