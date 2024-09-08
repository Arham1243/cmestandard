@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Badge</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.update_badges_management') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" value="{{ $badge->id }}" name="id">
                    <div class="row justify-content-center">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ $badge->name }}">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-6">
                            <div class="form-group">
                                <label>min Credit Hours:</label>

                                <input type="number" name="min_credit_hours" required class="form-control" value="{{ $badge->min_credit_hours }}">
                                @if ($errors->has('min_credit_hours'))
                                    <span class="error">{{ $errors->first('min_credit_hours') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6">
                            <div class="form-group">
                                <label>Max Credit Hours:</label>

                                <input type="number" name="max_credit_hours" class="form-control" value="{{ $badge->max_credit_hours }}">
                                @if ($errors->has('max_credit_hours'))
                                    <span class="error">{{ $errors->first('max_credit_hours') }}</span>
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <div class="text-center">

                            <button type="submit" class="primary-btn primary-bg">Save Changes</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .recommend {
            color: #D75DB2;
        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        (() => {



        })()
    </script>
@endsection
