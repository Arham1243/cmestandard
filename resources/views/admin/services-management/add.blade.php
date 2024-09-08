@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Service</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_service') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-12 col-md-12 col-6">
                            <div class="form-group">
                                <label>Title:</label>

                              
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="col-lg-12 col-md-12 col-6">
                            <div class="form-group">
                                <label>Description:</label>

                                <textarea name="short_desc" class="form-control">{{ old('short_desc') }}</textarea>
                                @if ($errors->has('short_desc'))
                                    <span class="error">{{ $errors->first('short_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Long Description*:</label>
                                <textarea rows="5" class="form-control ckeditor" id="editor2" placeholder="Enter Long Description">{{ old('long_desc') }}</textarea>
                                <input type="hidden" id="message2" name="long_desc">
                                @if ($errors->has('long_desc'))
                                    <span class="error">{{ $errors->first('long_desc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 text-center">
                            <div class="img-upload-wrapper ">
                                <h3>Service Image</h3>
                                <figure>
                                    <img src="{{ old('img_path') ? old('img_path') : asset('admin/images/placeholder.png') }}"
                                        class="thumbnail-img" id="profie-img" alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file"onchange="readURL(this, 'profie-img');" name="img_path"
                                    id="thumbnail-img" class="d-none" accept="image/jpeg, image/png">

                            </div>
                            @if ($errors->has('img_path'))
                                <span class="error">{{ $errors->first('img_path') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <div class="text-center">

                            <button type="submit" class="primary-btn primary-bg">Add New</button>

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
        function validateAndSubmit() {
            var fieldsToValidate = [{
                id: "long_desc",
                editorId: "long_desc_editor"
            }];

            var allFieldsValid = true;

            for (var i = 0; i < fieldsToValidate.length; i++) {
                var field = fieldsToValidate[i];
                if (!validateField(field.id, field.editorId)) {
                    allFieldsValid = false;
                }
            }
            console.log(allFieldsValid)
            if (allFieldsValid) {
                $("#add-record-form").submit();
            }
        }

        function validateField(fieldId, editorId) {
            var fieldValue = CKEDITOR.instances[editorId].getData().trim();
            var fieldName = $("#" + editorId).attr("placeholder");
            if (fieldValue === "") {
                $.toast({
                    heading: "Error!",
                    position: "bottom-right",
                    text: fieldName + " is !",
                    loaderBg: "#ff6849",
                    icon: "error",
                    hideAfter: 2000,
                    stack: 6,
                });
                return false;
            }

            $("#" + fieldId).val(fieldValue);
            return true;
        }

        $(document).ready(function() {
            $("#form-submit-btn").click(function(e) {
                e.preventDefault();
                validateAndSubmit();
            });
        });
    </script>
@endsection
