@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Student Details</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper main-form mc-b-3">
                <div class="row align-items-end">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Institute Name*:</label>
                            <input type="text"readonly class="form-control"
                                value="{{ $enrollment->get_enroll_profiles->username }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Course Name*:</label>
                            <input type="text" readonly class="form-control"
                                value="{{ $enrollment->get_enroll_course->title }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Course Type*:</label>
                            <input type="text" readonly class="form-control"
                                value="{{ $enrollment->get_enroll_course_type->course_type }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label> Id*:</label>
                            <input type="text" readonly class="form-control" value="{{ $enrollment->registration_id }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Full Name*:</label>
                            @foreach ($users as $user)
                                @if ($user->registration_id == $enrollment->registration_id)
                                    <input type="text" readonly class="form-control" value="{{ $user->full_name }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label> Email*:</label>
                            @foreach ($users as $user)
                                @if ($user->registration_id == $enrollment->registration_id)
                                    <input type="text" readonly class="form-control" value="{{ $user->email }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


                <form id="add-record-form" action="{{ route('admin.save_courses_enrollment_details') }}"
                    enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" name="enrollment_id" value="{{$enrollment->id}}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 mc-b-3">
                            <div class="primary-heading color-dark">
                                <h2>Add Details</h2>
                            </div>
                        </div>
                        
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>{{ $enrollment->get_enroll_course_type->course_type }} link*:</label>
                            <input type="url" name="course_link" class="form-control">
                             @if ($errors->has('course_link'))
                                <span class="text-danger">{{ $errors->first('course_link') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Username / Email*:</label>
                            <input type="email" name="course_email" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group">
                            <label>Password*:</label>
                            <input type="text" name="course_password" class="form-control">
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
