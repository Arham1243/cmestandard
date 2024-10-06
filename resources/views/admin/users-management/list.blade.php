@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">
                <div class="user-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12 p-0 mc-b-3">
                            <div class="primary-heading color-dark">
                                <h2>Users Management</h2>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.add_users') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>View Profile</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                    <th>Feature on Homepage</th>
                                    <th>Welcome Email Sent</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <a class="eye-btn"
                                                href="{{ route('doctor_profile', $user->slug) }}"target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>

                                        <td>{{ $user->show_on_homepage == 1 ? 'Yes' : 'No' }}
                                        <td>{{ $user->is_welcome_email_sent == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                    @if ($user->show_on_homepage == 1)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.show_on_homepage_user', $user->id) }}">
                                                            <i class="fa fa-times" aria-hidden="true"></i> Remove from
                                                            Homepage
                                                        </a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.show_on_homepage_user', $user->id) }}">
                                                            <i class="fa fa-check" aria-hidden="true"></i> Show on
                                                            Homepage
                                                        </a>
                                                    @endif
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('Are you sure you want to delete')"
                                                        href="{{ route('admin.delete_user', $user->id) }}"><i
                                                            class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </div>
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
    <script type="text/javascript"></script>
@endsection
