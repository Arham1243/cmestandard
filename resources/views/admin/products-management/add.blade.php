@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="primary-heading color-dark mb-4">
                <h2>Add Product</h2>
            </div>

        </div>
        <div class="user-wrapper">
            <form id="add-record-form" class="main-form mc-b-3" action="{{ route('admin.create_products') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="form-group">
                            <label>Name*:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="form-control" placeholder="Enter Product Name">
                            @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="form-group">
                            <label>Price*:</label>
                            <input type="text" name="price" id="price" value="{{ old('price') }}" min="1"
                                class="form-control" placeholder="Enter Price">
                            @if ($errors->has('price'))
                                <span class="error">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="form-group">
                            <label>Category *:</label>

                            <select name="category_id">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Short Description*:</label>
                            <textarea rows="5" class="form-control" name="short_desc" placeholder="Enter Short Description">{{ old('short_desc') }}</textarea>
                            @if ($errors->has('short_desc'))
                                <span class="error">{{ $errors->first('short_desc') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Description*:</label>
                            <textarea rows="5" class="form-control ckeditor" id="long_desc_editor" placeholder="Long Description">{{ old('long_desc') }}</textarea>
                            <input type="hidden" id="long_desc" name="long_desc">
                            @if ($errors->has('long_desc'))
                                <span class="error">{{ $errors->first('long_desc') }}</span>
                            @endif
                        </div>
                    </div> --}}
                    <div class="col-lg-2 col-md-12 col-12">
                        <div class="form-group">
                            <label>Featured Product:</label>
                            <div class="input-field--check">
                                <input type="checkbox" name="is_featured" id="is_featured">
                                <label for="is_featured" class="toggle">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="form-group">
                            <label>Include this product in Deal of the Day?:</label>
                            <div class="input-field--check">
                                <input type="checkbox" name="in_deal" id="in_deal">
                                <label for="in_deal" class="toggle">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Main Image</h3>
                            <figure><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img main_image"
                                    id="product-img" alt="user-img"></figure>
                            <label for="img_path" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="readURL(this, 'product-img');" name="img_path" id="img_path"
                                class="d-none" accept="image/jpeg, image/png">
                            @if ($errors->has('img_path'))
                                <span class="error">{{ $errors->first('img_path') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="file-upload-contain my-3 form-group">
                            <label class="title mb-3">Other Images:</label>
                            <input id="multiplefileupload" type="file" name="product_images[]" accept="" multiple />
                        </div>
                        @if ($errors->has('product_images'))
                            <span class="text-danger">{{ $errors->first('product_images') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg" id="">Add New</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/file-upload.css') }}" />
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js"></script>
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
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
                    text: fieldName + " is Required!",
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
