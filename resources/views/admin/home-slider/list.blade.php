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
                                <h2>Banners Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.addhomeSlider') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Page Name</th>
                                    <th>Heading</th>
                                    <th>Banner</th>
                                    <th>Created At</th>
                                    <!--<th>Status</th>-->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($home_slider as $new)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $new->table_name }}</td>
                                        <td>{{ $new->headings }}</td>
                                        <td><img src="{{ asset($new->img_path) }}" class="list-img" alt="Banner"></td>
                                        <td>{{ date('m/d/y', strtotime($new->created_at)) }}</td>
                                        <!--<td>{{ $new->is_active_img == 1 ? 'Active' : 'Non-Active' }}</td>-->

                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.edithomeSlider', $new->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" onclick="return confirm('Are You sure to delete This Slider')"
                                                        href="{{ route('admin.deletehomeSlider', $new->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
