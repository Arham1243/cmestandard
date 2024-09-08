@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>View Qoute Inquiry</h2>
            </div>
          </div>
        </div>
        <form  class="main-form">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Full Name*:</label>
                <input type="text" class="form-control"  value="{{$quote['company_name']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Address*:</label>
                <input type="text" class="form-control"  value="{{$quote['address']}}"readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Other Address*:</label>
                <input type="text" class="form-control"  value="{{$quote['other_address']}}"readonly>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>City*:</label>
                <input type="text" class="form-control"  value="{{$quote['city']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>State*:</label>
                <input type="text" class="form-control"  value="{{$quote['state']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Zip Code*:</label>
                <input type="text" class="form-control"  value="{{$quote['zip']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Email*:</label>
                <input type="text" class="form-control"  value="{{$quote['email']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Home Phone NO*:</label>
                <input type="text" class="form-control"  value="{{$quote['h_phone']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Cell Phone NO*:</label>
                <input type="text" class="form-control"  value="{{$quote['phone']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Contact Method*:</label>
                <input type="text" class="form-control"  value="{{$quote['contact_method']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Event Date*:</label>
                <input type="text" class="form-control"  value="{{$quote['e_date']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Event Location*:</label>
                <input type="text" class="form-control"  value="{{$quote['e_location']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>About Us*:</label>
                <input type="text" class="form-control"  value="{{$quote['about_us']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Event Planning*:</label>
                <input type="text" class="form-control"  value="{{$quote['e_planning']}}" readonly>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>No Of Persons*:</label>
                <input type="text" class="form-control"  value="{{$quote['persons']}}" readonly>
              </div>
            </div>
            
            
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Delivery Date*:</label>
                <input type="text" class="form-control"  value="{{$quote['d_date']}}" readonly>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Delivery Time*:</label>
                <input type="text" class="form-control"  value="{{$quote['d_time']}}" readonly>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Pickup Day*:</label>
                <input type="text" class="form-control"  value="{{$quote['pickup']}}" readonly>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Pickup Time*:</label>
                <input type="text" class="form-control"  value="{{$quote['p_time']}}" readonly>
              </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-12">
              <div class="form-group">
                <label>Message:</label>
                <div class="relative-div">
                  <textarea type="email" rows="8" class="form-control"  readonly >{{$quote['message']}}</textarea>
                </div>
              </div>
            </div>
            
            
          </div>
          <div class="text-center">
            <a href="{{route('admin.quotes_listing')}}" class="primary-btn secondary-bg">Go Back</a>
          </div>
        </form>
      </div>
    </div>

  

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