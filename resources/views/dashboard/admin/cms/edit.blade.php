@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Page Content</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.updateCms')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">
                        @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Page Name*:</label>
                                    <input type="text" readonly name="page_name" id="page_name" value="{{$contents->page_name}}" required class="form-control" >
                                    <input type="hidden" name="id"  value="{{$contents->id}}" >
                                </div>
                            </div>

                          
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Page Heading*:</label>
                                    <input type="text"  name="page_heading" id="page_heading" value="{{$contents->page_heading}}" required class="form-control" >
                                    
                                </div>
                            </div>


                          

                            @if($contents->id == 3 || $contents->id == 1 || $contents->id == 4 || $contents->id == 6 || $contents->id == 7 )
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 1:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor1"  placeholder="Enter Content">{{$contents->content1}}</textarea>
                                    <input type="hidden" id="message1"  name="content1">
                                </div>
                            </div>

                            @if($contents->id == 3 || $contents->id == 1 || $contents->id == 4 )
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 2:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor2"  placeholder="Enter Content">{{$contents->content2}}</textarea>
                                    <input type="hidden" id="message2" name="content2">
                                </div>
                            </div>
                            @endif

                            @endif

                            @if($contents->id == 1 || $contents->id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 3:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor3"  placeholder="Enter Content">{{$contents->content3}}</textarea>
                                    <input type="hidden" id="message3" name="content3">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 4:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor4"  placeholder="Enter Content">{{$contents->content4}}</textarea>
                                    <input type="hidden" id="message4" name="content4">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 5:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor5"  placeholder="Enter Content">{{$contents->content5}}</textarea>
                                    <input type="hidden" id="message5" name="content5">
                                </div>
                            </div>
                              @if($contents->id == 1)
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Image 1*:</label>
                                                <figure><img src="{{asset($contents->img1)}}" id="img1" alt="user-img"></figure>
                                                <label for="user-img1" class="primary-btn primary-bg">Upload</label>
                                                <input type="file" id="user-img1" name="img1" class="d-none" required onchange="imageone(this);" accept="image/jpeg, image/png">
                                    </div>
                                     <h5 class="recommend">Recommended Image Size Is: 464 X 520</h5>
                                       
                                   
                                </div>

                               
                                   
                                @endif

                            @if($contents->id == 1)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 6:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor6"  placeholder="Enter Content">{{$contents->content6}}</textarea>
                                    <input type="hidden" id="message6" name="content6">
                                </div>
                            </div>
                            
                             @if($contents->id == 1)
                              

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Image 2*:</label>
                                                <figure><img src="{{asset($contents->img2)}}" id="img2" alt="user-img"></figure>
                                                <label for="user-img2" class="primary-btn primary-bg">Upload</label>
                                                <input type="file" id="user-img2" name="img2" class="d-none" required onchange="imagetwo(this);" accept="image/jpeg, image/png">
                                    </div>
                                     <h5 class="recommend">Recommended Image Size Is: 465 X 523</h5>
                                 </div>
                                 
                                       
                                   
                                @endif

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Content # 7:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor7"  placeholder="Enter Content">{{$contents->content7}}</textarea>
                                    <input type="hidden" id="message7" name="content7">
                                </div>
                            </div>
                            @endif
                            
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
.recommend{
    color:#D75DB2;
}
</style>
@endsection
@section('js')

<script type="text/javascript">

   function imageone(input) {
        if (input.files && input.files[0]) {
           
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img1')
                    .attr('src', e.target.result);
                  
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function imagetwo(input) {
        if (input.files && input.files[0]) {
           
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img2')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

(()=>{
  
    $('#add-record').click(function(e)
    {
        e.preventDefault();
      
        @if($contents->id == 3 || $contents->id == 1 || $contents->id == 4 || $contents->id == 6 || $contents->id == 7)
        var value1 = CKEDITOR.instances['editor1'].getData();
        var val1 = $("#message1").val(value1);

        @if($contents->id == 3 || $contents->id == 1 || $contents->id == 4 )
        var value2 = CKEDITOR.instances['editor2'].getData();
        var val2 = $("#message2").val(value2);
        @endif

        @endif

        @if($contents->id == 1 || $contents->id == 4)
        var value3 = CKEDITOR.instances['editor3'].getData();
        var val3 = $("#message3").val(value3);
        var value4 = CKEDITOR.instances['editor4'].getData();
        var val4 = $("#message4").val(value4);
        var value5 = CKEDITOR.instances['editor5'].getData();
        var val5 = $("#message5").val(value5);

        @if($contents->id == 1)
        var value6 = CKEDITOR.instances['editor6'].getData();
        var val6 = $("#message6").val(value6);
        var value7 = CKEDITOR.instances['editor7'].getData();
        var val7 = $("#message7").val(value7);
        @endif

        @endif

        
       
        $('#add-record-form').submit();
                //console.log(val1.attr('value'));
                // if(val1.attr('value') == '')
                // {
                //     $.toast({
				// 		heading: 'Error!',
				// 		position: 'bottom-right',
				// 		text:  'Short Description Field Is Required!',
				// 		loaderBg: '#ff6849',
				// 		icon: 'error',
				// 		hideAfter: 2000,
				// 		stack: 6
				// 	});
                // }
                // if(val1.attr('value') == '')
                // {
                //     $.toast({
				// 		heading: 'Error!',
				// 		position: 'bottom-right',
				// 		text:  'Long Description Field Is Required!',
				// 		loaderBg: '#ff6849',
				// 		icon: 'error',
				// 		hideAfter: 2000,
				// 		stack: 6
				// 	});
                // }

                // if(val1.attr('value') != '' && val1.attr('value') != '')
                // {
                //     $('#add-record-form').submit();
                // }
    });
    
})()
</script>
@endsection