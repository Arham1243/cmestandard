@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Category</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.savecategory') }}" method="POST" enctype="multipart/form-data"
                class="main-form create_user_form">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label> Category title*:</label>
                            <input type="text" name="title" id="name" value="{{ $category->title }}"
                                class="form-control" placeholder="Enter Title">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                        </div>
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>



                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg add-user">Update</button>
                        </div>
                    </div>
            </form>
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
    <script type="text/javascript">
        (() => {

            /*in page js here*/
        })()
    </script>
@endsection
