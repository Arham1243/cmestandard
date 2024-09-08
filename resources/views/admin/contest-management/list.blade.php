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
                                <h2>Contest Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.add_contest') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Fees</th>
                                    <th>Expiry Date</th>
                                    <th>Live Status</th>
                                    <th>Status</th>
                                    <th>Winning Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($contests as $contest)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $contest->title }}</td>
                                        <td>{{ $contest->fees }}</td>
                                        <td>{{ $contest->expiry_date }}</td>
                                        <td>{{ date("Y-m-d",strtotime($contest->expiry_date)) > date("Y-m-d") ? 'Live' : 'Expired' }}</td>
                                        <td>{{ $contest->is_active == 1 ? 'Active' : 'Non-Active' }}</td>
                                        <td>{{ $contest->winning_amount }}</td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown-{{ $i }}" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown-{{ $i }}">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.edit_contest', $contest->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"
                                                            onclick="confirmDelete('{{ route('admin.delete_contest', $contest->id) }}')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                         </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.suspend_contest', $contest->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> {{ $contest->is_active == 1 ? 'Non-Active' : 'Active' }}</a>
                                                  
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
@endsection

@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this contest?")) {
                window.location.href = url;
            }
        }

    </script>
@endsection
