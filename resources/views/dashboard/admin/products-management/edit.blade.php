@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Product</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form"   class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Name*:</label>
                                    <input type="text" name="name" id="name" value="{{$product->name}}" required class="form-control" placeholder="Enter Product Name">
                                    @if ($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                           
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Slug*:</label>
                                    <input type="text" name="slug" id="slug" value="{{$product->slug}}" required class="form-control" placeholder="Enter Slug">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Price ($)*:</label>
                                    <input type="number" name="price" id="price" value="{{$product->price}}" min="1"  class="form-control" placeholder="Enter Price in $">
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Qty*:</label>
                                    <input type="number" name="qty" id="qty" value="{{$product->qty}}" min="1" required class="form-control" placeholder="Enter Qty">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Category:</label>
                                   <select name="category" class="form-control cat-dd" required>
                                   <option selected value="">Select A Category</option>
                                       @foreach($cat as $c)
                                       <option {{$product->category_id == $c->id ? 'selected':''}} value="{{$c->id}}">{{$c->title}}</option>
                                       @endforeach
                                   </select>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                            <div class="form-group">
                                <label>Sub Category*:</label>
                                <select name="sub_category" required  class="form-control subcat-dd">
                                @if($product->sub_category_id != 0)
                                <option value="{{$product->sub_category_id}}" selected="selected">{{$product->productBelongsToSubCategory->title}}</option>
                                @else
                                <option value="">Select A Sub Category </option>
                                @endif
                              
                                </select>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Color:</label>
                                   <select name="color[]" class="form-control" id="flavor-select" multiple>
                                     
                                       @foreach($flavor as $f)
                                      
                                       <option value="{{$f->id}}">{{$f->name.'-'.$f->code}}</option>
                                       @endforeach
                                   </select>
                                   
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="form-group">
                                    <label>Size:</label>
                                   <select name="size[]" multiple id="size-select" class="form-control">
                                    
                                       @foreach($size as $s)
                                       <option value="{{$s->id}}">{{$s->name.'-'.$s->code}}</option>
                                       @endforeach
                                   </select>
                                   
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Short Description*:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor1"  placeholder="Enter Short Description">{{$product->short_desc}}</textarea>
                                    <input type="hidden" id="message1"  name="short_desc">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Long Description*:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor2"  placeholder="Enter Long Description">{{$product->long_desc}}</textarea>
                                    <input type="hidden" id="message2" name="long_desc">
                                </div>
                            </div>

                           
                            
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Main Image*</h3>
                              <figure><img src="{{isset($product->img_path) && null !== $product->img_path ?  asset($product->img_path) : asset('images/user-details.png')}}" class="thumbnail-img main_image" alt="user-img"></figure>
                              <label for="main_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file"  onchange="mainimage(this);" name="main_image" id="main_image" class="d-none"  accept="image/jpeg, image/png">
                                <!-- <h5 class="recommend">Recommended Image Size Is: 574 X 603</h5> -->
                                @if ($errors->has('main_image'))
                                    <span class="error">{{ $errors->first('main_image') }}</span>
                                @endif
                            </div>

                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Other Images* (You Can Select Multiple Images)</h3>
                              <figure><img src="{{$product->productsHasMultiImages->isEmpty()  ?   asset('images/user-details.png') : asset($product->productsHasMultiImages[0]->img_path) }}" class="thumbnail-img other_image" alt="user-img"></figure>
                              <label for="other_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file"  onchange="otherimage(this);" name="other_image[]" id="other_image" class="d-none"  accept="image/jpeg, image/png" multiple>
                                <!-- <h5 class="recommend">Recommended Image Size Is: 574 X 603</h5> -->
                                @if ($errors->has('other_image'))
                                    <span class="error">{{ $errors->first('other_image') }}</span>
                                @endif
                            </div>
                          
                           </div>
                         
                           @if(!$product->productsHasMultiImages->isEmpty())
                           <div class="col-lg-12 col-md-12 col-12 text-center">
                                <h4>Current Multi Images Attached:-</h4>
                             
                                            <div class="row align-items-center mc-b-3">
                                        <table class="table table-hover table-order1">
                                            <thead>
                                            <tr>
                                            <th>S.No</th>
                                                <th>Image</th>
                                                <th>Delete Image?</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="order-list text-center">
                                        @foreach($product->productsHasMultiImages as $imgs)
                                            <tr>
                                              
                                              
                                                <td>{{$loop->iteration}}</td>
                                            <td><img class="downimg" src="{{asset($imgs->img_path)}}"></td>
                                            <td><a href="{{route('admin.delete_multiimg',$imgs->id)}}" ><img class="delimg" src="{{asset('images/trash.jpg')}}"></a></td>
                                       
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        </div>
                                      
                            </div>
                                    
                             @endif   
                           

                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                        <button id="add-record" type="button" class="primary-btn primary-bg">Update</button>
                        </div>
                    </div>
                    </form>

                </div>
                
            </div>
        </div>
    </section>

@endsection
@section('css')
<link rel="stylesheet" href="jquery-ui-multiselect-widget-master/jquery.multiselect.css" />
<style type="text/css">
	/*in page css here*/
    .downimg {
        width: auto;
        height: 100px;
        object-fit: cover;
    }
    .delimg {
        width: auto;
        height: 30px;
        object-fit: cover;
    }
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}
.picture {
    max-width: 288px;
    height: 113px;
   
}
.recommend{
    color:#D75DB2;
}
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="jquery-ui-multiselect-widget-master/src/jquery.multiselect.js" type="text/javascript"></script>
<script type="text/javascript">
function mainimage(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.main_image')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function otherimage(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.other_image')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


(()=>{
    
    @if(isset($product->color) && null !== ($product->color))

var flavor_values="{{$product->color}}";
// $("#flavor-select").val([values]);
// console.log(values);
$.each(flavor_values.split(","), function(i,e){
    // console.log(e);
    $("#flavor-select option[value='" + e + "']").prop("selected", true);
});
@endif

@if(isset($product->size)  && null !== ($product->size))
var size_values="{{$product->size}}";
// $("#flavor-select").val([values]);
// console.log(values);
$.each(size_values.split(","), function(i,e){
    // console.log(e);
    $("#size-select option[value='" + e + "']").prop("selected", true);
});
@endif

    $('#flavor-select').multiselect({
    // checkAllText: "All Selected",
    // uncheckAllText: "None Selected",
    // noneSelectedText: "None Selected",
    // selectedText: "You selected # of #" //The multiselect knows to display the second # as the total
});

$('#size-select').multiselect({
    // checkAllText: "All Selected",
    // uncheckAllText: "None Selected",
    // noneSelectedText: "None Selected",
    // selectedText: "You selected # of #" //The multiselect knows to display the second # as the total
});
    @if($product->sub_category_id != 0)
  $('.subcat-dd').removeAttr("style").show();
//   $('.agent-dd').removeAttr("style").show();
  @else
  $('.subcat-dd').removeAttr("style").hide();
//   $('.agent-dd').removeAttr("style").hide();
  @endif
  $('.cat-dd').on('change', function() {
    $('.subcat-dd').removeAttr("style").hide();
//   $('.agent-dd').removeAttr("style").hide();
  var cat_id = this.value;
// console.log(team_id);
// return 0;
if(cat_id != 0){
            $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  
    $.ajax({
        

          type: "get",

          url: "{{route('admin.get_sub_cat')}}",

          data: {cat_id: cat_id },
          dataType: "json",


          success: function (msg) {
              
              if(msg.status == 1)
              {
                  //console.log(msg.data);
                  $('.subcat-dd').empty().append('<option selected="selected" value="">Select A Sub Category (Optional)</option>');
                  $(msg.data).each(function(index, element) {
                      // console.log(index);
                      // return 0;
                      // if(index == 0)
                      // {
                      //   $('.team-dd').append($('<option>', { 
                      //   value: 0,
                      //   text : 'Select A Team' 
                      //   }));
                      // }
                      $('.subcat-dd').append($('<option>', { 
                    value: element.id,
                    text : element.title 
                    }));
                     
                       
              });
                      // $( ".user_table" ).DataTable();
                      //  $(".table-responsive").show();
                      $(".subcat-dd").show();
                       
      
                      // $("#checkall").click(function(){
      
                      // // $('input[name="check_apt[]"]').not(this).prop('checked', this.checked);
      
                      // });
                  // $.toast({
                  // heading: 'Success!',
                  // position: 'bottom-right',
                  // text:  'To book appointment on this date, user have to pay! $'+ msg.param.price + ' Or select any other date!',
                  // loaderBg: '#ff6849',
                  // icon: 'success',
                  // hideAfter: 8000,
                  // stack: 6
                  // });

              //     setInterval(() => {
              //     window.location.href =
              // }, 4000); 

              }
              else if(msg.status == 0)
              {
                  
                   
                $('.subcat-dd').empty().append('<option selected="selected" value="">Select A Sub Category (Optional)</option>');
                      $('.subcat-dd').removeAttr("style").hide();
                          $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'No Sub Category Found!',
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

        }
       
});


  $('#name').change(function(e) {
    $.get('{{ route('admin.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });

  $( "#add-record" ).click(function(e) {
        console.log('hhh');
    e.preventDefault();
    // e.preventDefault();
        var value1 = CKEDITOR.instances['editor1'].getData();
        var val1 = $("#message1").val(value1);
        var value2 = CKEDITOR.instances['editor2'].getData();
        var val2 = $("#message2").val(value2);
        // var value3 = CKEDITOR.instances['editor3'].getData();
        // var val3 = $("#message3").val(value3);
    //   var data = $(".create_user_form").serialize();
      var data = new FormData(document.getElementById("add-record-form"));
       //console.log(data);
    //   return 0;
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('admin.saveproducts')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
    		 
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2500,
                        stack: 6
                    });
    
                    $('#add-record-form')[0].reset();
                    setInterval(() => {
                        
                         window.location.href = "{{route('admin.products_listing')}}";
                    }, 2500);
                     
                    // $("#change-password-modal").modal("hide"); 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
    });


    // $('#add-record').click(function(e)
    // {
    //     e.preventDefault();
    //     var value1 = CKEDITOR.instances['editor1'].getData();
    //     var val1 = $("#message1").val(value1);
    //     var value2 = CKEDITOR.instances['editor2'].getData();
    //     var val2 = $("#message2").val(value2);
    //             //console.log(val1.attr('value'));
    //             if(val1.attr('value') == '')
    //             {
    //                 $.toast({
	// 					heading: 'Error!',
	// 					position: 'bottom-right',
	// 					text:  'Short Description Field Is Required!',
	// 					loaderBg: '#ff6849',
	// 					icon: 'error',
	// 					hideAfter: 2000,
	// 					stack: 6
	// 				});
    //             }
    //             if(val1.attr('value') == '')
    //             {
    //                 $.toast({
	// 					heading: 'Error!',
	// 					position: 'bottom-right',
	// 					text:  'Long Description Field Is Required!',
	// 					loaderBg: '#ff6849',
	// 					icon: 'error',
	// 					hideAfter: 2000,
	// 					stack: 6
	// 				});
    //             }

    //             if(val1.attr('value') != '' && val1.attr('value') != '')
    //             {
    //                 $('#add-record-form').submit();
    //             }
    // });
    
})()
</script>
@endsection