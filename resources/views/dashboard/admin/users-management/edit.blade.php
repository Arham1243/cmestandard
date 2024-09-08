@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Users</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.saveprofile')}}" method="POST" enctype="multipart/form-data" class="main-form">
            @csrf
        <div class="row mc-b-2">
          <div class="col-lg-8 col-md-8 col-12 col-center">
            <div class="user-img-wrapper mc-b-3">
              <figure>
                @if(isset($user->img_path) && null !== $user->img_path)                  
                <img src="{{asset($user->img_path)}}" class="user-details-img" alt="user-img">
                @else
              <img src="{{asset('images/user-details.png')}}" class="user-details-img" alt="user-img">
                @endif
              
            </figure>
              <label for="user-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
              <input type="file"  onchange="readURL(this);" name="avatar" id="user-img" class="d-none"  accept="image/jpeg, image/png">
             
            </div>
            
          </div>
        </div>
        
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Full Name*:</label>
                <input type="text" name="fullname" value="{{$user->fullname}}" required class="form-control" placeholder="Enter Full Name">
                @if ($errors->has('fullname'))
                                        <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                    @endif
              </div>
            </div>
           
          
               
                <input type="hidden" name="email" value="{{$user->email}}" required class="form-control" placeholder="Enter Email Address">
                <input type="hidden" name="id" value="{{$user->id}}" required class="form-control" placeholder="Enter Email Address">
             
         
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Phone*:</label>
                <div class="relative-div">
                <input type="tel" name="phone" required class="form-control" value="{{$user->phone}}" >
                  
                  @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Address*:</label>
                <div class="relative-div">
                <input type="text" name="address" required class="form-control" value="{{$user->address}}" >
                @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>City*:</label>
                <div class="relative-div">
                <input type="text" name="city" required class="form-control" value="{{$user->city}}" >
                @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Country*:</label>
                <div class="relative-div">
                <input type="text" required name="country" class="form-control" value="{{$user->country}}" >
                @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Status*:</label>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user1" name="is_active" {{$user->is_active == 1 ? 'Checked' : ''}}   value="1">
                      <label for="user1">Active</label>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user2" name="is_active" {{$user->is_active == 0 ? 'Checked' : ''}}  value="0" >
                      <label for="user2">In Active</label>
                    </div>
                  </li>
                </ul>
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