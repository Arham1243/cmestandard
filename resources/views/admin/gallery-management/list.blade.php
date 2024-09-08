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
                                <h2>Gallery Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.add_gallery') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>
                    @if ($galleries->isEmpty())
                        <p>No galleries found.</p>
                    @else
                        <table id="user-table" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Title</th> --}}
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $gallery->title }}</td> --}}
                                        <td>
                                            <img src="{{ asset($gallery->img_path) }}" class="list-img">
                                        </td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this Gallery')"
                                                        href="{{ route('admin.delete_gallery', $gallery->id) }}"><i
                                                            class="fa fa-ban" aria-hidden="true"></i> Delete Gallery</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
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
