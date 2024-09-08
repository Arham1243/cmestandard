@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Add New Admin</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.create_admin')}}" method="POST" enctype="multipart/form-data" class="main-form">
            @csrf
        
        
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Name*:</label>
                <input type="text" name="name" required class="form-control" placeholder="Enter First Name">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Email Address*:</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter Email Address">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Password*:</label>
                <div class="relative-div">
                  <input type="password" name="password" required class="form-control" placeholder="Enter Password">
                  <a href="javascript:void(0)" class="show-password-btn"><i class="fa fa-eye-slash"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Confirm Password*:</label>
                <div class="relative-div">
                  <input type="password" name="password_confirmation" required class="form-control" placeholder="Enter Confirm Password">
                  <a href="javascript:void(0)" class="show-password-btn"><i class="fa fa-eye-slash"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Status*:</label>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user1" name="is_active"  value="1" checked>
                      <label for="user1">Active</label>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user2" name="is_active" value="0" >
                      <label for="user2">In Active</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            
             <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Admin Type*:</label>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="superadmin" name="type"  value="1" checked>
                      <label for="superadmin">Super Admin</label>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="miniadmin" name="type" value="2" >
                      <label for="miniadmin">Mini Admin</label>
                    </div>
                  </li>
                   <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="microadmin" name="type" value="3" >
                      <label for="microadmin">Micro Admin</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
           
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg">Add</button>
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
    //  function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         console.log('sad');
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('.user-details-img')
    //                 .attr('src', e.target.result);
    //                 console.log(e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection