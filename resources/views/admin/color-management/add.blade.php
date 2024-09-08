@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Color</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_color') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row align-items-end">

                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Category:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Products:</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">-- Select Products --</option>
                                    @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name" required placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Code:</label>
                                <input type="text" class="form-control" name="code" required placeholder="Enter Code">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" name="price" required placeholder="Enter Price">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" class="form-control" name="qty" required placeholder="Enter Quantity">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">

                            <button id="add-record" type="submit" class="primary-btn primary-bg">Create</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    </section>
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
        (() => {
            $("#category_id").on('change',function(e){
                Loader.show()
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
            
                $.ajax({
                  type: "get",
                  url: "{{route('admin.get_products')}}",
                  data: {category_id: $(this).val() },
                  dataType: "json",
                  success: function (msg) {
                    Loader.hide();
                    if(msg.status == 1)
                    {
                      $('#product_id').empty().append('<option selected="selected" value="0">Select A Product</option>');
                      $(msg.data).each(function(index, element) {
                        $('#product_id').append($('<option>', { 
                          value: element.id,
                          text : element.name 
                        }));
                      });
                    //   $(".course-dd").show();
                    //   $('.course option[value='+{{(isset($id))?$id:''}}+']').attr('selected','selected');
                    }
                    else if(msg.status == 0)
                    {
                      $('#product_id').empty().append('<option selected="selected" value="0">Select A Products</option>');
                     
                      $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'No Product in this Category Found!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                      });
                    }
                  },
                  beforeSend: function () {
                  }
                });
              })

        })()
    </script>
@endsection
