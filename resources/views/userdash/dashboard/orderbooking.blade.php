@extends('userdash.layouts.dashboard.main')

@section('content')
 <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Your Bookings</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-lg-right text-md-right">
                           
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm dashboard-table">
                    <table class="table" id="data-table">
                    <thead>
                    <tr>
                    <th>Booking ID</th>
                      
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Product</th>
                      <th>Amount</th>
                      <th>Booking Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </thead>
                        <tbody>
                        <?php $i = 1 ;?>
              
              
                <?php $i = 1 ;?>
                    @foreach($bookings as $booking)
                  
                    <tr>
                    <td>{{$booking->id}}</td>

                    <td>{{$booking->name}}</td>
                
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->phone}}</td>
                    <?php $product = App\Models\Products::where('id',$booking->product_id)->first();?>
                    <td>{{ucfirst($product->name)}}</td>
                    <td>${{$booking->price}}</td>
                    <td>{{date('d-M-y',strtotime($booking->appointment_date))}}</td>     
                    <td>{{$booking->is_active == 1 ? 'Active' : 'Pending'}}</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                    <?php $decrypt = Crypt::encryptString($booking->id);?>
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('dashboard.viewbooking',$decrypt)}}"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                        View</a>
                      
                        {{--<a class="dropdown-item" href="{{route('dashboard.deletebooking',$decrypt)}}" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                        Delete</a>--}}
                        
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $i++;?>
               @endforeach
              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
   .ui-state-active{
      background: #212529 !important;
      color: #f8f9fa !important;
  }
</style>
@endsection
@section('js')
<script type="text/javascript">

(()=>{
    

})()
</script>
@endsection
