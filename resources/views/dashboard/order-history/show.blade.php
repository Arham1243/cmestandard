@extends('layouts.dashboard.main')

@section('content')

<div class="col-lg-8 pdy-30">
                    <div class="row justify-content-center">
                        <div class="profile pdy-30">
                            <div class="col-lg-12">
                                <div class="edit-id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="order-content">
                                                <h2>Order Details</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="save-info">
                                                <a href="{{route('myorders')}}">Back</a>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <table class="table table-hover table-order1">

                                    <tbody class="order-list">
                                        <tr>
                                            <th scope="row">ID</th>
                                            <td>{{ $orders->id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $orders->fname }} {{ $orders->lname }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $orders->email }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>{{ $orders->phone }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{ $orders->address }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Massage</th>
                                            <td>{!! $orders->note !!}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Total Amount Payable</th>
                                            <td>${!! $orders->total_amount !!}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Order Date & Time </th>
                                            <td>{!! $orders->created_at !!}</td>

                                        </tr>

                                    </tbody>
                                </table>
                                <div class="edit-id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="order-content">
                                                <h2>Order Product</h2>
                                            </div>
                                        </div>
                                       
                                    </div>


                                </div>
                                <table class="table table-hover table-order1">
                                    <thead class="order-detail">
                                        <tr>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">QTY</th>
                                            <th scope="col">Sub Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="order-list1">
                                    @foreach($details as $detail)
                                        <tr>
                                            <td><img src="{{ asset($detail['image']) }}" width="80px" height="80px" alt=""></td>
                                            <td>{{ $detail['name'] }}</td>
                                            <td>${{ number_format($detail['price'],2) }}</td>
                                            <td>{{ $detail['qty'] }}</td>
                                            <td>${{ number_format($detail['sub_total'],2) }}</td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                @if(isset($orders->shipping_detail))
                                <?php $uns =  unserialize($orders->shipping_detail);
                                
                                ?>
                                
                                 <div class="edit-id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="order-content">
                                                <h2>Shipping Info</h2>
                                            </div>
                                        </div>
                                       
                                    </div>


                                </div>
                                <table class="table table-hover table-order1">
                                    <thead class="order-detail">
                                        <tr>
                                            <th scope="col">Shipping Method</th>
                                            <th scope="col">Shipping Amount</th>
                                            <th scope="col">Shipping Destination</th>
                                             <th scope="col">Shipping Service</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="order-list1">
                                   <tr>
                                        <td>{{ $uns['ship_method'] }}</td>
                                        <td>${{ number_format($uns['shipping_amount'],2) }}</td>
                                         <td>{{ $uns['destination'] }}</td>
                                         <td>{{ $uns['shipping_service'] }}</td>
                                   </tr>
                                    </tbody>
                                </table>
                                
                                @if($uns['ship_method'] == "FEDEX")
                                
                                 <table class="table table-hover table-order1">
                                    <thead class="order-detail">
                                        <tr>
                                            <th scope="col">Country</th>
                                            <th scope="col">State</th>
                                           
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="order-list1">
                                   <tr>
                                        <td>{{ $uns['country'] }}</td>
                                        <td>{{ $uns['states'] }}</td>
                                        
                                   </tr>
                                    </tbody>
                                </table>
                                @endif
                                
                                
                                @endif
    
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
  /*in page css here*/
  let dropArea = document.getElementById('drop-area');
  @if (session('notify_success'))
    $.toast({
            heading: 'Success!',
            position: 'bottom-right',
            text:  '{{session('notify_success')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 2000,
            stack: 6
        });
        @endif
  
})()
</script>
@endsection
