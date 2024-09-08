@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="chart-wrapper">
        
         
        <div class="user-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-6 col-12">
              <div class="primary-heading color-dark">
                <h2>Bookings Management</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">
                <table id="user-table" class="table table-bordered" style="width:100%">
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
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('admin.bookings_detail',$booking->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          View</a>
                      
                          <a class="dropdown-item" href="{{route('admin.bookings_delete',$booking->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Delete</a>
                          @if($booking->is_active == 1)
                        <a class="dropdown-item" href="{{route('admin.bookings_suspend',$booking->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                        @else
                        <a class="dropdown-item" href="{{route('admin.bookings_suspend',$booking->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Activate</a>
                        @endif
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

    $('#user-table').DataTable( {
        "order": [[ 1, "desc" ]]
    } );

  /*in page css here*/
})()
</script>
@endsection