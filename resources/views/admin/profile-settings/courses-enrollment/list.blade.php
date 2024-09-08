@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">


                <div class="user-wrapper">
                    <div class="row align-items-center mc-b-3">
                        <div class="col-lg-6 col-12">
                            <div class="primary-heading color-dark">
                                <h2>Enrollment Requests</h2>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Institute Name</th>
                                    <th>Course Name</th>
                                    <th>Content Type</th>
                                    <th>Student Name</th>
                                    <th>Student Id</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($enrollments as $key => $enrollment)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $enrollment->get_enroll_profiles->username }}</td>
                                        <td>
    @if ($enrollment->get_enroll_course)
        {{ $enrollment->get_enroll_course->title }}
    @else
        Error: Course Not Found
    @endif
</td>

                                        <td>{{ $enrollment->get_enroll_course_type->course_type }}</td>
                                        @foreach ($users as $user)
                                            @if ($user->registration_id == $enrollment->registration_id)
                                                <td>{{ $user->full_name }}</td>
                                            @endif
                                        @endforeach

                                        <td>{{ $enrollment->registration_id }}</td>
                                        <td>{{ date('d-M-Y', strtotime($enrollment->created_at)) }}</td>
                                        <td>{{ $enrollment->is_enrolled == 1 ? 'Enrolled' : 'Not Enrolled' }}</td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                @if ($enrollment->course_type == 1)
                                                    @if ($enrollment->is_enrolled == 0)
                                                        <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.courses_enrollment_approve', $enrollment->id) }}"><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Approve</a>
                                                        </div>
                                                    @else
                                                        <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.courses_enrollment_approve', $enrollment->id) }}"><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Disapprove</a>
                                                        </div>
                                                    @endif
                                                @else
                                                    @if ($enrollment->is_enrolled == 0)
                                                        <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.courses_enrollment_details', $enrollment->id) }}"><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Add Details</a>
                                                        </div>
                                                    @else
                                                        <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.edit_courses_enrollment_details', $enrollment->id) }}"><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Edit Details</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.courses_enrollment_approve', $enrollment->id) }}"><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Disapprove</a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
        

        
    @endsection
    @section('css')
        <style type="text/css">
            /*in page css here*/
        </style>
    @endsection
    @section('js')
        <script type="text/javascript">
            (() => {

                /*in page css here*/
            })()
        </script>
    @endsection
