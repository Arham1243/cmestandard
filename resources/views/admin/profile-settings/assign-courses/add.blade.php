@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center pb-5">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Assign Content</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" method="POST" class="main-form mc-b-3"
                    action="{{ route('admin.profile.create_assign_courses') }}">
                    @csrf
                    <div class="row  mt-5">
                                   <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Select Course Type*:</label>
                                <select name="course_type" class="form-control w-100" id="course_type">
                                    <option value="" selected disabled>Select Course Type</option>
                                    @foreach ($course_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->course_type }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_type'))
                                    <span class="error">{{ $errors->first('course_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
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
                        
             
                        
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Select Content*:</label>
                                <div class="wrapper checkBoxesWrapper toggle-next">
                                    Courses
                                </div>
                                {{-- <div class="checkboxes" id="Lorems">
                                    <div class="inner-wrap" id="course-list">
                                        @foreach ($courses as $course)
                                            @php
                                                $assignedCourses = json_decode(session()->get('assigned_courses', '[]')); 
                                                $isAssigned = in_array($course->id, $assignedCourses); 
                                            @endphp
                                            <label for="{{ $course->id }}">
                                                <input type="checkbox" name="courses[]" id="{{ $course->id }}"
                                                    value="{{ $course->id }}"
                                                    @if ($isAssigned) checked @endif>
                                                <span>{{ $course->title }}</span>
                                            </label>
                                        @endforeach

                                    </div>
                                </div> --}}
                                <div class="checkboxes" id="Lorems">
  <div class="inner-wrap" id="course-list">
    <!-- Courses will be dynamically generated here based on the selected course type -->
  </div>
</div>

                            </div>
                            @if ($errors->has('courses'))
                                <span class="error">{{ $errors->first('courses') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button id="add-record" type="button" class="primary-btn primary-bg">Assign</button>
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
        .form-group .checkBoxesWrapper {
            padding: 15px 20px;
            font-size: 13px;
            color: #666;
            border: 1px solid #666666;
            border-radius: 100px;
            background: #fff;
            cursor: pointer;
        }

        .checkBoxesWrapper .toggle-next {
            border-radius: 0;
        }

        .checkBoxesWrapper label {
            cursor: pointer;
        }

        .checkBoxesWrapper .ellipsis {
            text-overflow: ellipsis;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

        .checkBoxesWrapper .apply-selection {
            display: none;
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            border-bottom: 1px solid #ccc;
        }

        .checkBoxesWrapper .apply-selection .ajax-link {
            display: none;
        }

        .checkboxes {
            margin: 0;
            display: none;
            border-top: 0;
            position: absolute;
            left: 1.5rem;
            top: 75%;
            width: 95%;
            background: #fff;
            box-shadow: 0 0 15px 1px #00000020;
            border-radius: 0.25rem;
            padding: 0.5rem;
            z-index: 6;
        }

        .checkboxes .inner-wrap {
            padding: 5px 10px;
            max-height: 140px;
            overflow: auto;
        }

        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .picture {
            max-width: 288px;
            height: 113px;

        }

        .checkboxes .inner-wrap {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
        }

        .courses-wrapper label {
            margin-bottom: 0;
        }

        .checkboxes .inner-wrap label {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0.3rem 0;
            gap: 0.65rem;
            margin: 0;
            font-size: 0.85rem;
            cursor: pointer;
            font-weight: 400;
        }
    </style>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
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
        $(function() {

            setCheckboxSelectLabels();

            $('.toggle-next').click(function() {
                $(this).next('.checkboxes').slideToggle(400);
            });

            $('.ckkBox').change(function() {
                toggleCheckedAll(this);
                setCheckboxSelectLabels();
            });

        });

        function setCheckboxSelectLabels(elem) {
            var wrappers = $('.wrapper');
            $.each(wrappers, function(key, wrapper) {
                var checkboxes = $(wrapper).find('.ckkBox');
                var label = $(wrapper).find('.checkboxes').attr('id');
                var prevText = '';
                $.each(checkboxes, function(i, checkbox) {
                    var button = $(wrapper).find('button');
                    if ($(checkbox).prop('checked') == true) {
                        var text = $(checkbox).next().html();
                        var btnText = prevText + text;
                        var numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
                        if (numberOfChecked >= 4) {
                            btnText = numberOfChecked + ' ' + label + ' selected';
                        }
                        $(button).text(btnText);
                        $(".ellipsis").text(btnText);
                        prevText = btnText + ', ';
                    }
                });
            });
        }

        function toggleCheckedAll(checkbox) {
            var apply = $(checkbox).closest('.wrapper').find('.apply-selection');
            apply.fadeIn('slow');

            var val = $(checkbox).closest('.checkboxes').find('.val');
            var all = $(checkbox).closest('.checkboxes').find('.all');
            var ckkBox = $(checkbox).closest('.checkboxes').find('.ckkBox');

            if (!$(ckkBox).is(':checked')) {
                $(all).prop('checked', true);
                return;
            }

            if ($(checkbox).hasClass('all')) {
                $(val).prop('checked', false);
            } else {
                $(all).prop('checked', false);
            }
        }

        // $("#profile-selection").change(function() {
        //     var profile_id = $(this).val();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('admin.get_assign_courses') }}",
        //         dataType: 'json',
        //         data: {
        //             profile_id: profile_id,
        //         },
        //         success: function(data) {
        //             var courses_id_list = [];
        //             for (let i = 0; i < data.length; i++) {
        //                 const course_id = data[i]["course_id"];
        //                 courses_id_list.push(course_id);
        //             }
        //             sessionStorage.setItem("assigned_courses", JSON.stringify(
        //                 courses_id_list)); // Convert to JSON string before storing in sessionStorage
        //             // Call the function to update the courses on the page
        //             updateCourses(courses_id_list);
        //         },
        //     })
        //     ;
        // });
        
    //     $("#course_type").change(function() {
    //     var selectedCourseType = $(this).val();
    //     console.log(selectedCourseType);
        
    //     // Retrieve the assigned courses from session storage
    //     var assignedCourses = JSON.parse(sessionStorage.getItem("assigned_courses"));
        
    //     // Make an AJAX request to fetch the filtered courses
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('admin.get_filtered_courses') }}",
    //         dataType: 'json',
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //             course_type: selectedCourseType,
    //             assigned_courses: assignedCourses
    //         },
    //         success: function(data) {
    //             updateCourses(data);
    //             console.log(data);
    //         },
    //         error: function(xhr, textStatus, errorThrown) {
    //             console.log(xhr.responseText);
    //         }
    //     });
    // });


        // // // Function to update the courses on the page based on the assigned courses
        // function updateCoursesWithProfile(assignedCourses) {
        //     var courses = {!! $courses !!}; // Assuming you pass the courses from the Laravel controller
        //     console.log(courses)
        //     // Clear previous course list
        //     $("#course-list").empty();

        //     // Iterate over the courses and display them
        //     for (var i = 0; i < courses.length; i++) {
        //         var course = courses[i];
        //         var isAssigned = assignedCourses.includes(course.id);

        //         var label = $('<label>').attr('for', course.id);
        //         var input = $('<input>').attr({
        //             type: 'checkbox',
        //             name: 'courses[]',
        //             id: course.id,
        //             value: course.id
        //         });

        //         if (isAssigned) {
        //             input.prop('checked', true);
        //             label.append(input, $('<span>').text(course.title + ' (Assigned)'));
        //         } else {
        //             label.append(input, $('<span>').text(course.title));
        //         }

        //         $("#course-list").append(label);
        //     }

        // }

$("#course_type .select-options li").click(function() {
    $(".select-options li").removeClass("is-selected");
    $(this).addClass("is-selected");    
  var selectedCourseType = $(this).attr("rel");

  // Retrieve the assigned courses from session storage
  var assignedCourses = JSON.parse(sessionStorage.getItem("assigned_courses"));

  // Make an AJAX request to fetch the filtered courses
  $.ajax({
    type: "POST",
    url: "{{ route('admin.get_filtered_courses') }}",
    dataType: 'json',
    data: {
      _token: "{{ csrf_token() }}",
      course_type: selectedCourseType,
      assigned_courses: assignedCourses
    },
    success: function(data) {
      console.log(data); // Check the structure of the received data
      var courses = Array.isArray(data) ? data : [];
      updateCourses(courses, assignedCourses);
    },
    error: function(xhr, textStatus, errorThrown) {
      console.log(xhr.responseText);
    }
  });
});

function updateCourses(courses, assignedCourses) {
  console.log(courses); // Check the structure of the courses array
  var courseList = $("#course-list");

  courseList.empty();

  // Iterate over the courses and display them
  for (var i = 0; i < courses.length; i++) {
    var course = courses[i];

    var label = $('<label>').attr('for', course.id);
    var input = $('<input>').attr({
      type: 'checkbox',
      name: 'courses[]',
      id: course.id,
      value: course.id
    });

      label.append(input, $('<span>').text(course.title));

    courseList.append(label);
  }
}

    </script>
@endsection
