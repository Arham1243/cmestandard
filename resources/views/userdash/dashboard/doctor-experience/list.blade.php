@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>My CME Trainings</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right d-flex justify-content-end">
                            <a href="{{ route('dashboard.add_activity') }}" class="primary-btn primary-bg mc-r-2"><i
                                    class="fa fa-user"></i> Add new</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-4">
                        <form class="main-form">
                            <select name="category_id" class="form-control">
                                <option value="" disabled selected>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"
                                        {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                                        {{ $category['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div> --}}
                <div class="table-responsive-sm dashboard-table">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th>CME ID</th>
                                <th>Title</th>
                                <th>Training Status</th>
                                <th>Added on</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($doctors_experience as $experience)
                                {{-- <td>{{ $experience->user ? $experience->user->custom_id : '' }}</td> --}}
                                <td>{{ $experience->custom_id }}</td>
                                <td>{{ $experience->title }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $experience->training_status)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($experience->created_at)) }}</td>
                                <td>
                                    <div class="dropdown show action-dropdown">
                                        <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.edit_activity', $experience->id) }}"><i
                                                    class="fa fa-eye" aria-hidden="true"></i>
                                                Edit</a>

                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.delete_activity', $experience->id) }}"
                                                onclick="return confirm('Are you sure?')"><i class="fa fa-trash"
                                                    aria-hidden="true"></i>
                                                Delete</a>

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
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .ui-state-active {
            background: #212529 !important;
            color: #f8f9fa !important;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#data-table').DataTable({
        //         order: [[0, 'desc']],
        //     });
        // });
    </script>
@endsection
