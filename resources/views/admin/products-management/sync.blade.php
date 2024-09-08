@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">
                <div class="value-wrapper my-5 py-5">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-12">
                            <div class="primary-heading color-dark text-center mb-4">
                                <h2>Sync Products</h2>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="text-center">
                                <a href="{{ route('admin.get_orion_products') }}" class="primary-btn primary-bg">Sync Now</a>
                            </div>
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
