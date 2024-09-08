@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add News</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_news') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row align-items-end">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Title*:</label>
                                <input type="text" name="title" id="name" value="{{ old('title') }}" required
                                    class="form-control" placeholder="Enter Title">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" style="display: none">
                            <div class="form-group">
                                <label>Slug*:</label>
                                <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}" required
                                    class="form-control" placeholder="Enter Slug">
                                @if ($errors->has('slug'))
                                    <span class="error">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Short Description:</label>
                                <textarea rows="5" class="form-control" placeholder="Enter Short Description" name="short_desc">{{ old('short_desc') }}</textarea>
                                @if ($errors->has('short_desc'))
                                    <span class="error">{{ $errors->first('short_desc') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>News thumbnail</h3>
                            <figure><img src="{{asset('admin/images/placeholder.png')}}" class="thumbnail-img" alt="thumbnail">
                            </figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                class="d-none" accept="image/jpeg, image/png">
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Add News</button>
                        </div>
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
        .thumbnail-img {
            max-width: 288px;
            height: 113px;
        }

        .picture {
            max-width: 288px;
            height: 113px;

        }
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function thumb(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.thumbnail-img')
                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#name').change(function(e) {
            $.get('{{ route('admin.check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
        $('#add-record').click(function(e) {
            if (val1.attr('value') != '' && val1.attr('value') != '') {
                $('#add-record-form').submit();
            }
        });
    </script>
@endsection
