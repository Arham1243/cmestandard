@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">
                



                <div class="user-wrapper">
                    <div class="row align-items-center mc-b-3 resp-pb">
                        <div class="col-lg-6 col-12">
                            <div class="primary-heading color-dark">
                                <h2>Content Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.add_course') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>

                                    <th>Title</th>
                                    <th>Content Type</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                @php
                                    $i = 1;
                                @endphp
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->get_course_type->course_type }}</td>
                                        <td>{{ date('d-M-Y', strtotime($course->created_at)) }}</td>


                                        <td>{{ $course->is_active == 1 ? 'Active' : 'Non-Active' }}</td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.edit_course', $course->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.delete_course', $course->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Delete</a>
                                                    @if ($course->is_active == 1)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.suspend_course', $course->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.suspend_course', $course->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> Activate</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>

                            </thead>
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
            .action-btns {
                display: none;
                gap: 0.85rem;
                margin: 2rem 0 1.5rem;
            }

            .primary-fields .title {
                font-size: 1rem;
                font-weight: 600;
                text-transform: capitalize;
                margin-bottom: 0;
            }

            .primary-fields .field {
                width: 100%;
                color: #000;
                font-size: 0.95rem;
                font-weight: 600;
                background: none;
                border: 1px solid #ccc;
                outline: none;
                padding: 0.75rem 1rem;
                transition: all 150ms;
                margin: 0.6rem 0;
                resize: none;
                background: #fff;
                text-transform: capitalize;
            }

            .primary-fields .field:focus {
                box-shadow: 0 0 10px 1px #00000020;
            }

            .primary-fields .field::placeholder {
                color: inherit;
                font: inherit;
                opacity: 0.85;
            }
        </style>
    @endsection
    @section('js')
        <script type="text/javascript">
      $(document).ready(function() {
    var selectedValue = <?php echo isset($_GET['type']) ? $_GET['type'] : '0'; ?>;
    var selectedContentName = $('.select-hidden option[value="' + selectedValue + '"]').data('content-name');
    $('.select-styled').text(selectedContentName);
});

        </script>
    @endsection
