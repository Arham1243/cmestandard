@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Banner</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" method="POST" class="main-form mc-b-3" enctype="multipart/form-data"
                    action="{{ route('admin.profile.createwelcomeSlider') }}">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Select Profile*:</label>
                                <select name="profile_id" class="form-control w-100" id="profile-selection">
                                    <option value="" selected disabled>Select Profile</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}" {{old('profile_id') == $profile->id ? 'selected' : ''}}>
                                            {{ $profile->username }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('profile_id'))
                                    <span class="error">{{ $errors->first('profile_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Sub Heading:</label>
                                <input type="text" name="subHeading" class="form-control" value="{{old('subHeading')}}">
                                @if ($errors->has('subHeading'))
                                    <span class="text-danger">{{ $errors->first('subHeading') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Main Heading:</label>
                                <input type="text" name="headings" class="form-control" value="{{old('headings')}}">
                                @if ($errors->has('headings'))
                                    <span class="text-danger">{{ $errors->first('headings') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Button Text:</label>
                                <input type="text" name="btn_text" class="form-control" value="{{old('btn_text')}}">
                                @if ($errors->has('btn_text'))
                                    <span class="text-danger">{{ $errors->first('btn_text') }}</span>
                                @endif
                            </div>
                        </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label> Button Link:</label>
                                <input type="url" name="btn_link" class="form-control" value="{{old('btn_link')}}">
                                @if ($errors->has('btn_link'))
                                    <span class="text-danger">{{ $errors->first('btn_link') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label> Description:</label>
                                <textarea rows="5" class="form-control" name="long_desc" placeholder="Enter Long Description">{{old('long_desc')}}</textarea>
                                @if ($errors->has('long_desc'))
                                    <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Banner Image</h3>
                            <figure><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img" alt="thumbnail">
                            </figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                class="d-none" accept="image/jpeg, image/png">
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Add</button>
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
    </script>
@endsection
