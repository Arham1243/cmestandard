@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Edit About section</h2>
                        <h2>{{ $about_section->get_profiles->username }} Profile</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.profile.update_about_section') }}"
                    enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" name="profile_id" value="{{ $about_section->profile_id }}">
                    <div class="row align-items-end">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Heading*:</label>
                                <input type="text" name="headings" id="headings" value="{{ $about_section->headings }}"
                                    required class="form-control" placeholder="Enter heading">
                                @if ($errors->has('headings'))
                                    <span class="error">{{ $errors->first('headings') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea rows="5" class="form-control" placeholder="Enter Short Description" name="long_desc">{{ $about_section->long_desc }}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="error">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-12 text-center">-->
                    <!--    <div class="img-upload-wrapper  mc-b-3">-->
                    <!--        <h3>About Section thumbnail</h3>-->
                    <!--        <figure><img src="{{ asset($about_section->img_path) }}" class="thumbnail-img" alt="thumbnail">-->
                    <!--        </figure>-->
                    <!--        <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>-->
                    <!--        <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"-->
                    <!--            class="d-none" accept="image/jpeg, image/png">-->
                    <!--    </div>-->

                    <!--</div>-->

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
    </script>
@endsection
