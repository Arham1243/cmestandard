@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">



                <div class="invoice">
                    <div class="invoice_heading">
                        <h1>Invoice</h1>
                    </div>
                    <div class="invoice_details">
                        <ul>
                            <li><span class="key">Order#:</span> <span class="value">{{ $order->id }}</span></li>
                            <li><span class="key">Date:</span> <span
                                    class="value">{{ date('M d,Y', strtotime($order->created_at)) }}</span></li>
                            <li><span class="key">Order Amount:</span> <span
                                    class="value">${{ $order->total_amount }}</span></li>
                            <li><span class="key">First Name:</span> <span class="value">{{ $order->fname }}</span>
                            </li>
                            <li><span class="key">Last Name:</span> <span class="value">{{ $order->lname }}</span></li>
                            <li><span class="key"> Address:</span> <span class="value">{{ $order->address }}</span>
                            </li>
                            <li><span class="key"> Country:</span> <span class="value">{{ $order->country }}</span></li>
                            <li><span class="key"> Phone:</span> <span class="value">{{ $order->phone }}</span></li>
                            <li><span class="key"> Email:</span> <span class="value">{{ $order->email }}</span></li>
                            <li><span class="key"> Zip:</span> <span class="value">{{ $order->zip }}</span></li>
                            
                        </ul>
                    </div>




                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>S#</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $grand_total = 0;
                                $num = 01; ?>
                                <?php
                                
                                // dd($order_detail);
                                ?>

                                @foreach ($order_detail as $od)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>
                                            @foreach ($products as $product)
                                                @if ($od['product_id'] == $product->id)
                                                    <img class="list-img" 
                                                        src="{{ asset($product->img_path ?? 'assets/images/placeholder.png') }}">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td style="width: 50%">{{ ucfirst($od['name'] ?? '') }}
                                            @foreach ($products as $product)
                                                @if ($od['product_id'] == $product->id)
                                                    <div class="name">{{ $product->title }}</div>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>${{ $od['price'] }}</td>
                                        <td>{{ $od['quantity'] }}</td>
                                        <td>${{ $od['sub_total'] }}</td>
                                        <?php $grand_total += $od['sub_total'];
                                        $num++; ?>
                                    </tr>
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
        .ui-state-active {
            background: #212529 !important;
            color: #f8f9fa !important;
        }

        .downimg {
            width: auto;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {


        })()
    </script>
@endsection
