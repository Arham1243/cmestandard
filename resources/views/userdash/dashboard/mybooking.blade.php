@extends('userdash.layouts.dashboard.main')

@section('content')
 <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Your Orders</h2>
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
                            <th>Order ID</th>
                  
                  <th>Fname</th>
                  <th>Lname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Pay Status</th>
            
                
                
                 
                  
                  <th>Status</th>
                  <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ;?>
                @foreach($orders as $order)
              
                <tr>
                  <td>{{$order->id}}</td>

                  <td>{{$order->fname}}</td>
                  <td>{{$order->lname}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->phone}}</td>
                  <td>${{$order->total_amount}}</td>
                  <td>{{$order->pay_status == 1 ? 'Paid' : 'Unpaid'}}</td>
                  
                  
                  
                
                  
                  <td>@if($order->is_active == 0)
                    Pending
                    @endif
                    @if($order->is_active == 1)
                    Delivered
                    @endif
                    @if($order->is_active == 2)
                    Cancel
                    @endif</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                    <?php $decrypt = Crypt::encryptString($order->id);?>
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('dashboard.viewAppointment',$decrypt)}}"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                        View</a>
                      
                        {{-- <a class="dropdown-item" href="{{route('dashboard.deleteAppointment',$decrypt)}}" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                        Delete</a> --}}
                        
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

    // $(document).ready(function() {
    //     $('#data-table').DataTable({
    //         order: [[0, 'desc']],
    //     });
    // });

(()=>{
    

})()
</script>
@endsection
