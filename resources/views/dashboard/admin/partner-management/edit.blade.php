@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Sponsor</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.savepartner')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">
                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Title*:</label>
                                    <input type="text" name="title" id="name" value="{{$partner->title}}" required class="form-control" placeholder="Enter Title">
                                    <input type="hidden" name="id"  value="{{$partner->id}}" >
                                    @if ($errors->has('title'))
                                     <span class="error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                           
                         
                       
                      
                            
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Thumbnail Image</h3>
                              <figure><img src="{{asset($partner->img_path)}}" class="thumbnail-img" alt="user-img"></figure>
                              <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file"  onchange="thumb(this);" name="thumbnails" id="thumbnail-img" class="d-none"  accept="image/jpeg, image/png">
                              <h5 class="recommend">Recommended Image Size Is: 432 X 304</h5>
   
                            </div>
                               
                           </div>
                         
                             
                           </div>
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button type="submit" class="primary-btn primary-bg">Save Changes</button>
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

 


})()
</script>
@endsection