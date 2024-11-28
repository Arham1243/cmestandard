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
                                <h2>All Trainings</h2>
                            </div>
                        </div>

                    </div>

                    <form id="bulkActionForm" method="POST"
                        action="{{ route('admin.bulk-actions', ['resource' => 'trainings']) }}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="custom-form ">
                                    <div class="form-fields d-flex " style="gap: 1rem">
                                        <select class="field" id="bulkActions" name="bulk_actions" required>
                                            <option value="" disabled selected>Bulk Actions</option>
                                            <option value="approve_trainings">Approve</option>
                                        </select>
                                        <button type="submit" class="primary-btn pl-4">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="user-table" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <div class="selection select-all-container"><input type="checkbox"
                                                    id="select-all">
                                            </div>
                                        </th>
                                        <th>CME ID</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        {{-- <th>Provider / Accreditor</th>
                                    <th>Format</th>
                                    <th>Type</th>
                                    <th>Status </th> --}}
                                        <th>Month/Year</th>
                                        <th>Credit Hours</th>
                                        <th>Certificate</th>
                                        <th>Training Status</th>
                                        <th>Added On</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($trainings as $training)
                                        <tr>
                                            <td>
                                                <div style="width: 2rem">
                                                    <div class="selection item-select-container">
                                                        <input type="checkbox" class="bulk-item" name="bulk_select[]"
                                                            value="{{ $training->id }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $training->custom_id }}</td>
                                            <td>{{ $training->user->full_name ?? '' }}</td>
                                            <td>{{ $training->title }}</td>
                                            <td>{{ $training->category->name ?? '' }}</td>
                                            {{-- <td>{{ $training->grand_provide }}</td>
                                        <td>{{ $training->format }}</td>
                                        <td>{{ $training->type }}</td>
                                        <td>{{ $training->status }}</td> --}}
                                            <td>{{ date('M d, Y', strtotime($training->date)) }} </td>
                                            <td>{{ date('M d, Y', strtotime($training->created_at)) }} </td>
                                            <td>{{ $training->credit_hours }}</td>
                                            <td>
                                                <a href="{{ asset($training->certificate) }}" target="_blank"
                                                    class="file-icon text-capitalize"><i
                                                        class='bx bxs-file-blank'></i><br>open
                                                    in new tab</a>
                                            </td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $training->training_status)) }}</td>

                                            <td>
                                                <div class="dropdown show action-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="action-dropdown">

                                                        {{-- <a class="dropdown-item"
                                                        href="{{ route('admin.edit_training', $training->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View Details
                                                    </a> --}}
                                                        <a class="dropdown-item"
                                                            onclick="return confirm('Are you sure you want to delete?')"
                                                            href="{{ route('admin.delete_training', $training->id) }}">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                        </a>


                                                        @php
                                                            $statuses = [
                                                                'pending' => [
                                                                    'icon' => 'fa-ban',
                                                                    'label' => 'Mark as Pending',
                                                                ],
                                                                'admin_approved' => [
                                                                    'icon' => 'fa-check',
                                                                    'label' => 'Approved',
                                                                ],
                                                                'on_hold' => [
                                                                    'icon' => 'fa-pause',
                                                                    'label' => 'Put On Hold',
                                                                ],
                                                                'revised' => [
                                                                    'icon' => 'fa-edit',
                                                                    'label' => 'Mark as Revised',
                                                                ],
                                                                'declined' => [
                                                                    'icon' => 'fa-times',
                                                                    'label' => 'Decline',
                                                                ],
                                                            ];
                                                        @endphp

                                                        @foreach ($statuses as $status => $details)
                                                            @if ($training->training_status != $status)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.change_training_status', ['id' => $training->id, 'status' => $status]) }}">
                                                                    <i class="fa {{ $details['icon'] }}"
                                                                        aria-hidden="true"></i> {{ $details['label'] }}
                                                                </a>
                                                            @endif
                                                        @endforeach


                                                    </div>

                                                </div>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
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
    </style>
@endsection
@section('js')
    <script type="text/javascript"></script>
@endsection
