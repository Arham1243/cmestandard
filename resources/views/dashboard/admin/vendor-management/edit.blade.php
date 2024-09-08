@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Edit Vendor</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.savevendor')}}" method="POST" enctype="multipart/form-data" class="main-form create_user_form">
            @csrf
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <div class="form-group">
                <label> Vendor title*:</label>
                <input type="text" name="title"  value="{{$vendor->title}}" class="form-control" placeholder="Enter Title">
                <input type="hidden" name="id" value="{{$vendor->id}}">
              </div>
              @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
@endif
            </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Vendor Image</h3>
                              <figure><img src="{{isset($vendor->img_path) && null !== $vendor->img_path ? asset($vendor->img_path) : asset('images/user-details.png')}}" class="thumbnail-img main_image" alt="user-img"></figure>
                              <label for="main_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file"  onchange="mainimage(this);" name="vendor_image" id="main_image" class="d-none"  accept="image/jpeg, image/png">
                                <!-- <h5 class="recommend">Recommended Image Size Is: 574 X 603</h5> -->
                                @if ($errors->has('vendor_image'))
                                    <span class="error">{{ $errors->first('vendor_image') }}</span>
                                @endif
                            </div>
                          </div>
      
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg add-user">Update</button>
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
</style>
@endsection
@section('js')
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
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection