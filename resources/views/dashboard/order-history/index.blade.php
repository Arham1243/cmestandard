@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
                <div class="row justify-content-center">
                    <div class="profile pdy-30">
                        <div class="col-lg-12">
                            <div class="order-content pdy-30">
                                <h2>Order History </h2>
                            </div>

                            <table class="table table-hover table-order">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Amount Payable</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="order-list">
    
                                    <?php $num=1;?>
                           @foreach($orders as $order)
                                    <tr>
                                    <td>{{$num}}</td>
                                    <td>{{$order['fname']}} {{$order['lname']}}</td>
                                    <td>{{$order['email']}}</td>
                                    <td>${{$order['total_amount']}}</td>
                                    <td>
                                        <a class="hover-eye" href="{{route('vieworders',$order->id)}}"
                                           title="Edit Coupon">
                                            <button class="btn btn-info btn-sm btn-index-eye">
                                                <i class="fa fa-eye" aria-hidden="true"> </i>
                                            </button>
                                        </a>

                  
                                    </td>
                                    </tr>
                                    <?php $num++;?>
                           @endforeach
                                   
                                </tbody>
                            </table>

                       




                        </div>
                    
                    </div>
                     {{ $orders->links() }}
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
