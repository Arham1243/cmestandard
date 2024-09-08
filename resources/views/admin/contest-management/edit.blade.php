@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Contest</h2>
                    </div>
                </div>
            </div>
            <div class="user-wrapper">
                <form id="edit-contest-form" action="{{ route('admin.update_contest') }}" method="POST" class="main-form mc-b-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $contest->id }}">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" value="{{ $contest->title }}">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Fees:</label>
                                <input type="number" name="fees" class="form-control" value="{{ $contest->fees }}">
                                @if ($errors->has('fees'))
                                    <span class="error">{{ $errors->first('fees') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Expiry Date:</label>
                                <input type="date" name="expiry_date" class="form-control" value="{{ $contest->expiry_date }}">
                                @if ($errors->has('expiry_date'))
                                    <span class="error">{{ $errors->first('expiry_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Winning Amount:</label>
                                <input type="number" name="winning_amount" class="form-control" value="{{ $contest->winning_amount }}">
                                @if ($errors->has('winning_amount'))
                                    <span class="error">{{ $errors->first('winning_amount') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="text-center">
                                <button type="submit" class="primary-btn primary-bg">Save Changes</button>
                            </div>
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

        .picture {
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
            // Your JavaScript code here, if needed
        })()
    </script>
@endsection
