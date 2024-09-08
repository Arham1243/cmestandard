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
                      
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Amount</th>
                      <th>Created At</th>
                      <th>Pay Status</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php $i = 1 ;?>
                    @foreach($orders as $order)
                  
                    <tr>
                    <td>{{$order->id}}</td>

                    <td>{{$order->fname}}  {{$order->lname}}</td>
          
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>${{$order->total_amount}}</td>
                    <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                    <td>{{$order->pay_status == 1 ? 'Paid' : 'Unpaid'}}</td>





                    <td>@if($order->is_active == 0)
                      Pending
                      @endif
                      @if($order->is_active == 1)
                      Delivered
                      @endif
                      @if($order->is_active == 2)
                      Cancel
                      @endif
                    </td>
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('admin.view_order',$order->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          View</a>
                      
                          <a class="dropdown-item" onclick="return confirm('Are you sure you want to Delete the Order')" href="{{route('admin.delete_order',$order->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Delete</a>
                          @if($order->is_active != 2)
                       
                        <a class="dropdown-item"  href="{{ route('admin.order_status_update',$order->id)}}?status=0"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</a>
                        <a class="dropdown-item"   href="{{ route('admin.order_status_update',$order->id)}}?status=1"><i class="fa fa-check" aria-hidden="true"></i>Delivered</a>
                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to Cancel this Order')"  href="{{ route('admin.order_status_update',$order->id)}}?status=2"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a>
                       
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

    $('#user-table').DataTable( {
        "order": [[ 1, "desc" ]]
    } );

    $(".orderstatus").click(function(){

      var status =$(this).attr('data-status');
      var id =$(this).attr('data-id');
      // alert(id);
      Loader.show();
          
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'get',
    			dataType:'json',
    			data:{status,id},
			    // enctype: 'multipart/form-data',
                // processData: false,  // tell jQuery not to process the data
                // contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                    Loader.hide();
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 1000,
                        stack: 6
                    });
    
                  
                    setInterval(() => {
                        
                        //  window.reload();
                        location.reload();
                    }, 1000);
                     
                    // $("#change-password-modal").modal("hide"); 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
  
    
      
    });
  /*in page css here*/
})()
</script>
@endsection