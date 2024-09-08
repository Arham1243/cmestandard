@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>View Inquiry</h2>
            </div>
          </div>
        </div>
        <form  class="main-form">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>First Name*:</label>
                <input type="text" class="form-control"  value="{{$inquiry['fname']}}">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Last Name*:</label>
                <input type="text" class="form-control"  value="{{$inquiry['lname']}}">
              </div>
            </div>
           
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Email Address:</label>
                <div class="relative-div">
                  <input type="email" class="form-control"  value="{{$inquiry['email']}}">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Phone:</label>
                <div class="relative-div">
                  <input type="email" class="form-control"  value="{{$inquiry['phone']}}">
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="form-group">
                <label>Message:</label>
                <div class="relative-div">
                  <textarea type="email" rows="8" class="form-control" >{{$inquiry['message']}}</textarea>
                </div>
              </div>
            </div>
            
          </div>
          <div class="text-center">
            <a href="{{route('admin.inquiries_listing')}}" class="primary-btn secondary-bg">Go Back</a>
          </div>
        </form>
      </div>
    </div>

  </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection