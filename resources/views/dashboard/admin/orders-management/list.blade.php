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
                <h2>Orders Management</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">
                <table id="user-table" class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                    <th>Order ID</th>
                      
                      <th>Fname</th>
                      <th>Lname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Amount</th>
                      <th>Dated</th>
                      <th>Pay Status</th>
                      <th>Status</th>
                      <th>Actions</th>
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
                    <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                    <td>{{$order->pay_status == 1 ? 'Paid' : 'Unpaid'}}</td>





                    <td>{{$order->is_active == 1 ? 'Active' : 'Closed'}}</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('admin.order_detail',$order->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          View</a>
                      
                          <a class="dropdown-item" href="{{route('admin.order_delete',$order->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Delete</a>
                          @if($order->is_active == 1)
                        <a class="dropdown-item" href="{{route('admin.order_suspend',$order->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                        @else
                        <a class="dropdown-item" href="{{route('admin.order_suspend',$order->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Activate</a>
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