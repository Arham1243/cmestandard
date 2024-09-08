@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Edit Profile</h2>
                        <h2>{{ $profile->full_name }}</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.update_sub_profile') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">
                    <input type="hidden" class="form-control" name="id" value="{{ $profile->id }}">
                    @csrf
                    <div class="row align-items-end justify-content-center">
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" name="full_name" value="{{ $profile->full_name }}">
                            @if ($errors->has('full_name'))
                                <span class="error">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ $profile->email }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" class="form-control" placeholder="Enter Password" name="password" value="{{ $profile->password_sample }}">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Add</button>
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
$(document).ready(function() {
  $("#course_type").change(function() {
    if ($(this).val() === "1") {
      $(".scorm_fIle_wrapper").removeClass("d-none");
    } else {
      $(".scorm_fIle_wrapper").addClass("d-none");
    }
  });
});

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

        $('#name').change(function(e) {
            $.get('{{ route('admin.check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
        $('#add-record').click(function(e) {
            if (val1.attr('value') != '' && val1.attr('value') != '') {
                $('#add-record-form').submit();
            }
        });
        // File Name Show On Upload
$(".upload").change(function () {
  $(this).parent().parent().find(".file-name").text(this.files[0].name);
});



    </script>
@endsection
