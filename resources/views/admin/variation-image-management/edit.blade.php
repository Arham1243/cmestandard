@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Variation Image</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.savevariationimage')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                     
                        <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Product:</label>
                                   
                                  <select class="form-control" name="product" required>
                                      @foreach($products as $p)
                                      <option {{$variationimage->product_id == $p->id ? 'selected':''}}  value="{{$p->id}}">{{$p->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Color:</label>
                                    <input type="hidden" name="id"  value="{{$variationimage->id}}" >
                                  <select  class="form-control" name="color" required>
                                      @foreach($color as $c)
                                      <option {{$variationimage->color_id == $c->id ? 'selected':''}} value="{{$c->id}}">{{$c->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>
                            
                     
                            

                            <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Image*</h3>
                              <figure><img src="{{isset($variationimage->img_path) && null !== $variationimage->img_path ?  asset($variationimage->img_path) : asset('images/user-details.png')}}" class="thumbnail-img main_image" alt="user-img"></figure>
                              <label for="main_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file"  onchange="mainimage(this);" name="main_image" id="main_image" class="d-none"  accept="image/jpeg, image/png">
                                <!-- <h5 class="recommend">Recommended Image Size Is: 574 X 603</h5> -->
                                @if ($errors->has('main_image'))
                                    <span class="error">{{ $errors->first('main_image') }}</span>
                                @endif
                            </div>
                           
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Save Changes</button>
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
    
})()
</script>
@endsection