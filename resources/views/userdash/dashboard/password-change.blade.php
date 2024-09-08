@extends('userdash.layouts.dashboard.main')

@section('content')
  <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Change Password</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right">
                            <a href="{{route('dashboard.myProfile')}}" class="primary-btn primary-bg mc-r-2"><i class="fa fa-user"></i> My Profile</a>
                           
                        </div>
                    </div>
                </div>
                    <form action="{{ route('dashboard.update.password') }}" method="post"  enctype="multipart/form-data"  class="main-form">
                        	@csrf	
                    <div class="row">
                        
                
                          
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Password <span>*</span></label>
                                <input type="password" name="password" placeholder="Enter New Password Here" required id="myInput" class=" form-control">
                               @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" placeholder="Retype Password Here" required id="myInput" class=" form-control">
                                @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 text-center">
                    <button type="submit" class="primary-btn primary-bg text-center">Update Password</button>
</div>
                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo_img_my')
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
