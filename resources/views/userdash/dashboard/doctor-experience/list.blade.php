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
                            <a href="{{ route('dashboard.add_activity') }}" class="primary-btn primary-bg"><i
                                    class='bx bx-plus'></i> Add new</a>
                        </div>
                    </div>


                </div>

                <div class="main-form">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="sub-heading"> Search:</label>
                                <input type="text" class="form-control" id="customSearch">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form id="filterForm" action="{{ route('dashboard.activity_listing') }}" method="GET">
                                @php
                                    $speciality_param = $_GET['speciality_area_id'] ?? null;
                                    $category_param = $_GET['category_id'] ?? null;
                                @endphp
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="sub-heading d-flex align-items-center justify-content-between">
                                                Select Speciality
                                                @if (!is_null($speciality_param))
                                                    <a href="javascript:void(0)" class="cross" id="clearSpeciality">
                                                        <i class='bx bx-x'></i>
                                                    </a>
                                                @endif
                                            </label>
                                            <select id="speciality" name="speciality_area_id" class="form-control" required>
                                                <option value="" disabled
                                                    {{ is_null($speciality_param) ? 'selected' : '' }}>Select</option>
                                                @foreach ($speciality_areas as $speciality)
                                                    <option value="{{ $speciality->id }}"
                                                        {{ $speciality_param == $speciality->id ? 'selected' : '' }}>
                                                        {{ $speciality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="sub-heading d-flex align-items-center justify-content-between">
                                                Category
                                                @if (!is_null($category_param))
                                                    <a href="javascript:void(0)" class="cross" id="clearCategory">
                                                        <i class='bx bx-x'></i>
                                                    </a>
                                                @endif
                                            </label>
                                            <select id="category" name="category_id" class="form-control" required>
                                                <option value="" disabled
                                                    {{ is_null($category_param) ? 'selected' : '' }}>Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category['id'] }}"
                                                        {{ $category_param == $category['id'] ? 'selected' : '' }}>
                                                        {{ $category['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="table-responsive-sm dashboard-table">
                    <table class="table" id="custom-table">
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

        .dataTables_filter {
            display: none;
        }

        .primary-btn {
            display: flex;
            justify-content: center;
            width: fit-content;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#custom-table').DataTable({
        //         order: [
        //             [0, 'asc']
        //         ],
        //     });
        // });


        var table = $('#custom-table').DataTable({
            order: [
                [0, 'desc']
            ]
        });

        document.getElementById('customSearch').addEventListener('keyup', function() {
            table.search(this.value).draw();
        });

        // Submit form when changing speciality or category
        document.getElementById('category').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.getElementById('speciality').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        // Clear speciality and keep category
        document.getElementById('clearSpeciality')?.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor behavior
            document.getElementById('speciality').value = ''; // Clear the speciality field
            document.getElementById('filterForm').submit(); // Submit form
        });

        // Clear category and keep speciality
        document.getElementById('clearCategory')?.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor behavior
            document.getElementById('category').value = ''; // Clear the category field
            document.getElementById('filterForm').submit(); // Submit form
        });
    </script>
@endsection
