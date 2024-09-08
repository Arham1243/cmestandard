@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Team</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.saveteam')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                <label>Team Title*:</label>
                                    <input type="text" name="title" id="name" value="{{$team->name}}" required class="form-control" placeholder="Enter Title">
                                    <input type="hidden" name="id"  value="{{$team->id}}" >
                                    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
@endif
                                </div>
                            </div>
                            

                            
                           
                            
                        </div>
                        
                         
                             
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

.recommend{
    color:#D75DB2;
}
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
function thumb(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }




(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


    // $('#add-record').click(function(e)
    // {
    //     e.preventDefault();
    //     var value1 = CKEDITOR.instances['editor1'].getData();
    //     var val1 = $("#message1").val(value1);
      
      
    //             //console.log(val1.attr('value'));
               

    //             if(val1.attr('value') )
    //             {
    //                 $('#add-record-form').submit();
    //             }

    //             else
    //             {
    //                 $.toast({
    //           heading: 'Error!',
    //           position: 'bottom-right',
    //           text:  'Description Is Required!',
    //           loaderBg: '#ff6849',
    //           icon: 'error',
    //           hideAfter: 5000,
    //           stack: 6
    //         });
    //             }
    // });
    
})()
</script>
@endsection