@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">


            <div class="user-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Newsletter</h2>
                        </div>
                    </div>

                </div>



                <div class="table-responsive">
                    <table id="user-table" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($newsletter as $value)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ date('d-M-Y', strtotime($value->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown show action-dropdown">
                                            <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="action-dropdown">


                                                <a class="dropdown-item"
                                                    onclick="return confirm('Are you sure you want to delete this Newsletter')"
                                                    href="{{ route('admin.newsletter_listing_delete', $value->id) }}"><i
                                                        class="fa fa-ban" aria-hidden="true"></i> Delete Inquiry</a>
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
