@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <form id="logo-form" method="POST" class="main-form" action="{{ route('admin.profile.saveLogo') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="main-wrapper">
                <div class="primary-heading  text-center color-dark mb-5">
                    <h2>Add / Update Logo</h2>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group ">
                            <label>Select Profile*:</label>
                            <select name="profile_id" class="form-control w-100" id="profile-selection">
                                <option value="" selected disabled>Select Profile</option>
                                @foreach ($profiles as $profile)
                                    <option value="{{ $profile->id }}">
                                        {{ $profile->username }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('profile_id'))
                                <span class="error">{{ $errors->first('profile_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group  m-auto">
                            <label>Pick A Color <i class="fa fa-eyedropper" aria-hidden="true"></i></label>
                            <label class="color-code-wrapper" for="color_code">
                                <input class="code" value="#000000" type="text">
                                <input type="color" class="color-code" name="color_code" id="color_code" value=""
                                    class="form-control">
                            </label>
                            @if ($errors->has('color_code'))
                                <span class="error">{{ $errors->first('color_code') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 mt-4">
                        <div class="img-upload-wrapper">
                            <div class="primary-subtitle mb-4">Main Logo</div>
                            <figure class="logo-image"><img src="{{ asset('admin/images/placeholder-logo.png') }}"
                                    id="logo_img_my" alt="Logo">
                            </figure>
                            <label for="logo" class="user-img-btn"><i class="fa fa-camera"></i></label>

                            <input type="file" id="logo" name="profile_logo" class="d-none"
                                onchange="readURL(this, 'logo_img_my');">
                            @if ($errors->has('profile_logo'))
                                <span class="error">{{ $errors->first('profile_logo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 mt-4">
                        <div class="img-upload-wrapper">
                            <div class="primary-subtitle mb-4">Footer Logo</div>
                            <figure class="logo-image"><img src="{{ asset('admin/images/placeholder-logo.png') }}"
                                    id="footer_logo_img" alt="Logo">
                            </figure>
                            <label for="footer_logo" class="user-img-btn"><i class="fa fa-camera"></i></label>

                            <input type="file" id="footer_logo" name="footer_logo" class="d-none"
                                onchange="readURL(this, 'footer_logo_img');">
                            @if ($errors->has('footer_logo'))
                                <span class="error">{{ $errors->first('footer_logo') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12 mt-5">
                    <div class="text-center ">
                        <button id="submit-btn " type="submit" class="primary-btn primary-bg">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .recommend {
            color: #D75DB2;
        }

        .logo-image {
            width: 50%;
            display: block;
            margin-bottom: 2rem !important;
        }
    </style>
@endsection
@section('js')
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

        function readURL(input, targetId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#" + targetId).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        (() => {




            $("#profile-selection .select-options li").click(function() {
                $(".select-options li").removeClass("is-selected");
                $(this).addClass("is-selected");
                var profile_id = $(this).attr("rel");


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.get_profile_data') }}",
                    dataType: 'json',
                    data: {
                        profile_id: profile_id,
                    },
                    success: function(data) {
                        $("#color_code").val(data.color_code);
                        $(".code").val(data.color_code);
                        imgSrc = '{{ asset('') }}' + "/" + data.img_path;
                        footer_logo = '{{ asset('') }}' + "/" + data.footer_logo;
                        $("#logo_img_my").attr('src', imgSrc);
                        $("#footer_logo_img").attr('src', footer_logo);
                    },
                });
            });


        })()
    </script>
@endsection
