@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add Match</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.create_matches')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Team 1*:</label>
                                    <select name="team1" required class="form-control">
                                        @foreach($teams as $t)
                                     
                                        <option value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('team1'))
                                    <span class="error">{{ $errors->first('team1') }}</span>
                                    @endif
                                </div>
                            </div>           
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Team 2*:</label>
                                    <select name="team2" required class="form-control">
                                        @foreach($teams as $t)
                                       
                                        <option value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('team2'))
                                    <span class="error">{{ $errors->first('team2') }}</span>
                                    @endif
                                </div>
                            </div>           
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Dated*:</label>
                                    <input type="datetime-local" required name="dated" class="form-control">
                                    @if ($errors->has('dated'))
                                    <span class="error">{{ $errors->first('dated') }}</span>
                                    @endif
                                </div>
                            </div>              
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Broadcast*:</label>
                                    <input type="text" required name="broadcast" placeholder="Broadcaster Name" class="form-control">
                                    @if ($errors->has('broadcast'))
                                    <span class="error">{{ $errors->first('broadcast') }}</span>
                                    @endif
                                </div>
                            </div>       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Live Stream Link*:</label>
                                    <input type="text"  name="live_stream" placeholder="Live Stream Link" class="form-control">
                                    @if ($errors->has('live_stream'))
                                    <span class="error">{{ $errors->first('live_stream') }}</span>
                                    @endif
                                </div>
                            </div>        
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Match Type*:</label>
                                    <select name="match_type" required class="form-control">
                                      
                                     
                                        <option value="1">Hockey</option>
                                        <option value="2">Broadcast</option>
                                      
                                    </select>
                                    @if ($errors->has('match_type'))
                                    <span class="error">{{ $errors->first('match_type') }}</span>
                                    @endif
                                </div>
                            </div>                                                    
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Match Image Thuumbnail</h3>
                              <figure><img src="{{asset('images/user-details.png')}}" class="thumbnail-img" alt="user-img"></figure>
                              <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file" required onchange="thumb(this);" name="thumbnails" id="thumbnail-img" class="d-none"  accept="image/jpeg, image/png">
                                <h5 class="recommend">Recommended Image Size Is: 495 X 219</h5>
                                @if ($errors->has('thumbnails'))
                                    <span class="error">{{ $errors->first('thumbnails') }}</span>
                                @endif
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
               

    //             if(val1.attr('value'))
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