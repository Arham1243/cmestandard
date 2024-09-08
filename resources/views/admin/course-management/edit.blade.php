@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Content</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.savecourse') }}" enctype="multipart/form-data" method="POST"
                    class="main-form mc-b-3">

                    @csrf
                    <div class="row align-items-end justify-content-center">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Title*:</label>
                                <input type="text" name="title" id="name" value="{{ $course->title }}" required
                                    class="form-control" placeholder="Enter Title">
                                <input type="hidden" name="id" value="{{ $course->id }}">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Slug*:</label>
                                <input type="text" name="slug" id="slug" value="{{ $course->slug }}" required
                                    class="form-control" placeholder="Enter Slug">

                                @if ($errors->has('slug'))
                                    <span class="error">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Short Description:</label>
                                <textarea rows="5" class="form-control ckeditor" id="editor"  placeholder="Enter Short Description">{!! $course->short_desc !!}</textarea>
                                <input type="hidden" id="short_desc"  name="short_desc">
                                @if ($errors->has('short_desc'))
                                    <span class="error">{{ $errors->first('short_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        @if($course->course_type == 2 || $course->course_type == 3)
                        <div class="col-lg-12 col-md-12 ">
                        <div class="form-group">
                            <label>Link*:</label>
                            <input type="url" name="course_link" id="name" value="{{ $course->course_link }}" required
                                class="form-control" placeholder="Enter Url">
                            @if ($errors->has('course_link'))
                                <span class="error">{{ $errors->first('course_link') }}</span>
                            @endif
                        </div>
                    </div>
                      @endif

                    <div class="col-lg-3 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Thumbnail Image</h3>
                            {{-- {{dd($course)}} --}}
                            <figure><img src="{{ asset($course->img_path) }}" class="thumbnail-img" alt="user-img"></figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                class="d-none" accept="image/jpeg, image/png">
                            @if ($errors->has('thumbnails'))
                                <span class="error">{{ $errors->first('thumbnails') }}</span>
                            @endif
                            <div class="primary-subtitle text-center"><div >Dimensions:</div> 330 X 450</div>
                        </div>

                    </div>
                    
                     @if ($course->course_type == '1')
    <div class="col-lg-3 text-center scorm_fIle_wrapper">
        <div class="img-upload-wrapper  mc-b-3">
            <h3 class="file-name">Scorm File</h3>
            <label for="scorm_fIle" class="user-img-btn"><i class="fa fa-upload"></i></label>
            <input type="file" name="scorm_fIle" id="scorm_fIle" class="d-none upload">
        </div>
        @if($course->scorm_fIle != null)
            <a href="{{asset($course->scorm_fIle)}}" target="_blank" class="fancy-link">View Scorm File</a>
        @endif
    </div>
@endif
                     <div class="col-lg-3 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3 class="file-name">Pdf</h3>
                            <label for="pdf_file" class="user-img-btn"><i class="fa fa-file"></i></label>
                            <input type="file" name="pdf_file" id="pdf_file"
                                class="d-none upload" accept=".pdf">
                        </div>
                         @if($course->pdf_file != null)
            <a href="{{asset($course->pdf_file)}}" target="_blank" class="fancy-link">View Pdf</a>
        @endif
                    </div>
                     <div class="col-12">
                        <h3 class="file-name">Upload Videos</h3>
                         <div class="file-upload-contain my-3">
                                                                    <input id="multiplefileupload" type="file" name="videos_path[]" accept="video/*" multiple/>
                                                                </div>
                    </div>
                    @if($course_videos->isEmpty() != true)
                    <div class="col-12">
                        <h3 class="file-name mb-4">Current Videos</h3>
                        <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr class="text-left">
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Delete Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($course_videos as $i => $video)
                                    @php
                                        $i++;
                                    @endphp
                                                                                                                                                                <tr class="text-left">
                                        <td>{{$i}}</td>
                                        <td>
                                            <a href="{{asset($video->video_path)}}" data-fancybox="gallery">
                                                <video class="list-img m-0 d-block">
                                                    <source src="{{asset($video->video_path)}}">
                                                </video>
                                            </a>
                                        </td>
                                        <td><a class="delete-btn" href="{{ route('admin.delete_course_video',$video->id) }}"><i class="bx bxs-trash-alt"></i></a></td>
                                    </tr>
                                       @endforeach
                                                                                        </tbody>
                        </table>
                    </div>
                    </div>
                    @endif


                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">

                            <button id="add-record" type="button" class="primary-btn primary-bg">Save Changes</button>
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
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('admin/css/file-upload.css')}}"
    />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js"></script>
    <script src="{{asset('admin/js/file-upload.js')}}"></script>
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
        $(".upload").change(function () {
  $(this).parent().parent().find(".file-name").text(this.files[0].name);
});
    </script>
@endsection
