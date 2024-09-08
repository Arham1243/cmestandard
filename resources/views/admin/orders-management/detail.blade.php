@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
<div class="main-wrapper">
        <div class="chart-wrapper">
        <div class="user-wrapper">   
                              <div class="invoice">
                                  <div class="primary-heading color-dark">
                                <h2>Invoice</h2>
                            </div>
                    <div class="invoice_details">
                        <ul>
                            <li><span class="key">Order#:</span> <span class="value">{{ $order->id }}</span></li>
                            <li><span class="key">Date:</span> <span
                                    class="value">{{ date('M d,Y', strtotime($order->created_at)) }}</span></li>
                            <li><span class="key">Order Amount:</span> <span
                                    class="value">${{ $order->total_amount??'N/A' }}</span></li>
                            <li><span class="key">First Name:</span> <span class="value">{{ $order->fname??'N/A' }}</span>
                            </li>
                            <li><span class="key">Last Name:</span> <span class="value">{{ $order->lname??'N/A' }}</span></li>
                            <li><span class="key"> Address:</span> <span class="value">{{ $order->address??'N/A' }}</span>
                            </li>
                            <li><span class="key"> Country:</span> <span class="value">{{ $order->country??'N/A' }}</span></li>
                            <li><span class="key"> Phone:</span> <span class="value">{{ $order->phone??'N/A' }}</span></li>
                            <li><span class="key"> Email:</span> <span class="value">{{ $order->email??'N/A' }}</span></li>
                            <li><span class="key"> Zip:</span> <span class="value">{{ $order->zip??'N/A' }}</span></li>
                            {{-- <li><span class="key"> Order Notes:</span> <span
                                    class="value">{{ isset($order->note) ? $order->note : 'N/A' }}</span></li> --}}
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
                                                        src="{{ asset($product->img_path ?? 'admin/images/placeholder.png') }}">
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
</div>
</div>
@endsection
@section('hcss')
<!-- <link rel="stylesheet" href="{{asset('css/demo.css')}}"> -->
@endsection
@section('css')
<style>
    /* .sidebar {
        width: 270px;
        position: fixed;
        left: 0;
        padding: 102px 2rem .5rem;
        height: 100%;
        overflow: hidden;
        z-index: 19;
        background: #f5f5f5;
    } */
    section.content {
        overflow-y: auto;
        overflow-x: hidden;
    }
    .invoice {
        min-width: auto;
    }
    .table thead th,
    .table-bordered, .table-bordered td, .table-bordered th {
        border-bottom: 1px solid #9c9ea6;
    }
    .table-bordered, .table-bordered td, .table-bordered th {
        border: 1px solid #9c9ea6;
    }
    .invoice_heading {
        text-align: center;
        margin: 25px auto;
        width: 25%;
        border: 2px solid black;
        margin-top: 0px;
        /* border-radius: 25px; */
        }
</style>
@endsection