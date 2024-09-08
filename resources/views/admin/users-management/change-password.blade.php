@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-12">
            <div class="primary-heading color-dark d-flex align-items-center justify-content-between">
              <h2>Change Password</h2>
              <h2>{{$user->full_name}}</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.user_password_change_submit')}}" method="POST" enctype="multipart/form-data" class="main-form">
            @csrf
            <input type="hidden" value="{{$user->id}}" name="user_id">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>old Password*:</label>
                <input type="text"  value="{{$user->password_sample}}" class="form-control" readonly>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>New Password*:</label>
                <input type="text"  class="form-control" placeholder="Enter New Password" name="password">
              </div>
            </div>
           
            <div class="col-lg-12 col-12">
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
    .img-fluid {
    max-width: 113px;
    height: 113px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
     function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.user-details-img')
                    .attr('src', e.target.result);
                    console.log(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection