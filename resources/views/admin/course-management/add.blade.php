@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Content</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_course') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}" required>
                    <div class="row align-items-end justify-content-center">
                        <div class="col-lg-12 col-md-12 course_url d-none">
                            <div class="form-group">
                                <label>Link*:</label>
                                <input type="url" name="course_link" id="name" value="{{ old('course_link') }}"
                                    required class="form-control" placeholder="Enter Url">
                                @if ($errors->has('course_link'))
                                    <span class="error">{{ $errors->first('course_link') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Title*:</label>
                                <input type="text" name="title" id="name" value="{{ old('title') }}" required
                                    class="form-control" placeholder="Enter Title">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Course Type*:</label>
                                <select name="course_type" class="form-control" id="course_type">
                                    <option value="" selected disabled>Select Course Type</option>
                                </select>
                                @if ($errors->has('course_type'))
                                    <span class="error">{{ $errors->first('course_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Short Description:</label>
                                <textarea rows="5" class="form-control ckeditor" id="editor" placeholder="Enter Short Description">{{ old('short_desc') }}</textarea>
                                <input type="hidden" id="short_desc" name="short_desc">
                                @if ($errors->has('short_desc'))
                                    <span class="error">{{ $errors->first('short_desc') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-3 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Course thumbnail</h3>
                                <figure>
                                    <img src="{{ old('thumbnails') ? old('thumbnails') : asset('admin/images/placeholder.png') }}"
                                        class="thumbnail-img" alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">

                            </div>
                            @if ($errors->has('thumbnails'))
                                <span class="error">{{ $errors->first('thumbnails') }}</span>
                            @endif
                            <div class="primary-subtitle text-center">
                                <div>Dimensions:</div> 330 X 450
                            </div>
                        </div>

                        <div class="col-lg-3 text-center scorm_fIle_wrapper d-none">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3 class="file-name">Scorm FIle</h3>
                                <label for="scorm_fIle" class="user-img-btn"><i class="fa fa-upload"></i></label>
                                <input type="file" name="scorm_fIle" id="scorm_fIle" class="d-none upload">
                            </div>
                            @if ($errors->has('scorm_fIle'))
                                <span class="error">{{ $errors->first('scorm_fIle') }}</span>
                            @endif


                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3 class="file-name">Pdf</h3>
                                <label for="pdf_file" class="user-img-btn"><i class="fa fa-file"></i></label>
                                <input type="file" name="pdf_file" id="pdf_file" class="d-none upload" accept=".pdf">
                            </div>
                            @if ($errors->has('pdf_file'))
                                <span class="error">{{ $errors->first('pdf_file') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <h3 class="file-name">Upload Videos</h3>
                            <div class="file-upload-contain my-3">
                                <input id="multiplefileupload" type="file" name="videos_path[]" accept="video/*"
                                    multiple />
                            </div>
                            @if ($errors->has('videos_path'))
                                <span class="error">{{ $errors->first('videos_path') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button id="add-record" type="button" class="primary-btn primary-bg">Add New</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/file-upload.css') }}" />


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js"></script>
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $("#add-record").click(function(e) {
            e.preventDefault();
            var editor_value = CKEDITOR.instances['editor'].getData();
            var short_desc = $("#short_desc").val(editor_value);
            if (short_desc.val() != "") {
                $("#add-record-form").submit()
            } else {
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: 'Description is Required!',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });
            }


        });
        $(document).ready(function() {
            function updateFieldVisibility(courseType) {
                if (courseType === "1") {
                    $(".scorm_fIle_wrapper").removeClass("d-none");
                    $(".course_url").addClass("d-none");
                } else if (courseType === "2" || courseType === "3") {
                    $(".course_url").removeClass("d-none");
                    $(".scorm_fIle_wrapper").addClass("d-none");
                } else {
                    $(".course_url").addClass("d-none");
                    $(".scorm_fIle_wrapper").addClass("d-none");
                }
            }

            // Get the initial selected course_type value from the old input
            const initialCourseType = $("select[name='course_type']").val();
            updateFieldVisibility(initialCourseType);

            $("#course_type .select-options li").click(function() {
                const selectedCourseType = $(this).attr("rel");
                updateFieldVisibility(selectedCourseType);
            });
        });


        function thumb(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.thumbnail-img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        // Clear the local storage after form submission
        $('form').on('submit', function() {
            localStorage.removeItem('thumbnailData');
        });


        $('#add-record').click(function(e) {
            if (val1.attr('value') != '' && val1.attr('value') != '') {
                $('#add-record-form').submit();
            }
        });
        // File Name Show On Upload
        $(".upload").change(function() {
            $(this).parent().parent().find(".file-name").text(this.files[0].name);
        });
    </script>
@endsection
