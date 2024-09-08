@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add Variation</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.create_variation')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">

                        <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Product:</label>
                                   
                                  <select class="form-control col-dd" name="product" required>
                                  <option value="">Select Product</option>
                                      @foreach($products as $p)
                                      <option  value="{{$p->id}}">{{$p->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                    

                            <div class="col-lg-4 col-md-4 col-4">
                            <div class="form-group">
                                <label>Color*:</label>
                                <select name="color" required  class="form-control coloradd">
                                <option value="">Select Color</option>
                                </select>
                            </div>
                            </div>
                            
                        <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Size Name:</label>
                                 
                                    <select  class="form-control" name="size_id" required>
                                    <option value="">select size</option>
                                      @foreach($size as $c)
                                      <option value="{{$c->id}}">{{$c->name}}</option>
                                      @endforeach
                                  </select>
                                  
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Stock*:</label>
                                    <input type="text"  class="form-control" name="stock"  required   placeholder="Stock" >
                                  
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
// function thumb(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.thumbnail-img')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }

//     function mainpic(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.picture')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }


(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


//     $('#add-record').click(function(e)
//     {
//         e.preventDefault();
//         var value1 = CKEDITOR.instances['editor1'].getData();
//         var val1 = $("#message1").val(value1);
//         var value2 = CKEDITOR.instances['editor2'].getData();
//         var val2 = $("#message2").val(value2);
//                 //console.log(val1.attr('value'));
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Short Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Long Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }

//                 if(val1.attr('value') != '' && val1.attr('value') != '')
//                 {
//                     $('#add-record-form').submit();
//                 }
//     });

$('.coloradd').removeAttr("style").hide();
    $('.col-dd').on('change', function() {
    $('.coloradd').removeAttr("style").hide();
//   $('.agent-dd').removeAttr("style").hide();
  var product_id = this.value;
// console.log(product_id);
// return 0;


if(product_id != 0){
            $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  
    $.ajax({
        

          type: "get",

          url: "{{route('admin.get_color')}}",

          data: {product_id: product_id },
          dataType: "json",


          success: function (msg) {
            //   console.log(msg.data);
            //   return 0;
            //   console.log(msg.data.[0]);
            
            //   return 0;
              if(msg.status == 1)
              {
                  
                $(".coloradd").empty();
            $(msg.data).each(function(index, element) {
                // console.log(index);
                // console.log(element.variationimage_belongs_to_color.name);
                if(element.variationimage_belongs_to_color.name === undefined){
                       console.log("sss");
                                
                }
                else{
                    
                    $('.coloradd').append($('<option>', { 
                    value: element.variationimage_belongs_to_color.id,
                    text : element.variationimage_belongs_to_color.name
                 }));  
                }
              });  
             $(".coloradd").show();
                       
      

              }
              else 
              {
                  
                   
                $('.coloradd').empty().append('<option selected="selected" value="">Select Color </option>');  
                          $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'No Color Found!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                      });
                      $(".coloradd").show();
              }
            
                                              
              },
              beforeSend: function () {
                  
              }
          });

        }
        // else
        // {
        //   $('.team-dd').empty().append('<option selected="selected" value="0">Select A Manger</option>');
        //   $('.team-dd').removeAttr("style").hide();
       
        //               $.toast({
        //                 heading: 'Error!',
        //                 position: 'bottom-right',
        //                 text:  'Select A Valid Manager!',
        //                 loaderBg: '#ff6849',
        //                 icon: 'error',
        //                 hideAfter: 5000,
        //                 stack: 6
        //               });
        // }
});
    
})()
</script>
@endsection