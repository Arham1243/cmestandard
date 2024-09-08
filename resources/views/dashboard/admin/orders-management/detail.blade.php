@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
<div class="main-wrapper">
        <div class="chart-wrapper">
        <div class="user-wrapper">   
                <div class="invoice">
                      
                        <div class="invoice_heading">
                            <h1>Invoice</h1>
                        </div>
                        <div class="row invoice__address">
                            <div class="col-6">
                                <div class="text-right">
                                    

                                    <p>First Name:</p>
                                    <p>Last Name:</p>

                                    <address>
                                       Address:<br>
                                        
                                    </address>

                                    <p>Country:</p>

                                    <p>Phone:</p>
                                    <p>Email:</p>
                                    <p>Zip:</p>
                                    <h6>Order Notes:</h6>
                                   
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-left">
                                    
                                  
                                    <p>{{$orders->fname}}</p>
                                    <p>{{$orders->lname}}</p>

                                    <address>
                                    {{$orders->address}}<br>
                                        
                                    </address>

                                    <p>{{$orders->country}}</p>
                                    <p>{{$orders->phone}}</p>
                                    <p>{{$orders->email}}</p>
                                    <p>{{$orders->zip}}</p>
                                    <h6>{{isset($orders->note) ? $orders->note : 'N/A'}}</h6>

                                   
                                </div>
                            </div>
                        </div>

                        <div class="row invoice__attrs">
                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Order#</small>
                                    <h3>{{$orders->id}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Date</small>
                                    <h3>{{date('M d,Y', strtotime($orders->created_at))}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Total Amount</small>
                                    <h3>${{$orders->total_amount}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Order Amount</small>
                                    <h3>${{$orders->order_amount}}</h3>
                                </div>
                            </div>
                            
                        </div>


                        <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>ITEM DESCRIPTION</th>
                                    <th>ITEM IMAGE</th>
                                    <th>UNIT PRICE</th>
                                    <th>QUANTITY</th>
                                  
                                    <th >TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $grand_total = 0;
                                $num =01;?>
                                @foreach($order_detail as $od)
                              
                                <tr>
                                    <td style="width: 50%">{{ucfirst($od['name'])}}  <br>@if(isset($od['flavor_name']) && null !== ($od['flavor_name']))<span>Flavor: {{ucfirst($od['flavor_name'])}}</span>@endif
                                   <br> @if(isset($od['size_name']) && null !== ($od['size_name']))<span> Size: {{ucfirst($od['size_name'])}}</span>@endif</td>
                                    <td ><img width="80px" height="80px" src="{{asset($od['image'])}}"></td>
                                    <td>${{$od['price']}}</td>
                                    <td>{{$od['quantity_selected']}}</td>
                                   
                                    <td>${{$od['sub_total']}}</td>
                                    <?php $grand_total += $od['sub_total'];
                                    $num++?>
                                </tr>
                                @endforeach

                                <tr>
                                <td></td>
                                    
                                    <td class="text-right" colspan="3"><h6>Subtotal Total</h6></td>
                                    <td>${{$grand_total}}</td>
                                    
                                </tr>
                                
                                @if(!empty($orders->coupon_price))
                                    <tr>
                                <td></td>
                                 
                                 
                                    <td class="text-right" colspan="3"><h6>Coupon Discount:({{$orders->coupon_code}})</h6></td>
                                    <td>$ {{$orders->coupon_price}}</td>
                                    
                                </tr>
                                @endif
                               
                               
                                <tr>
                                <td></td>
                              
                                    <td class="text-right" colspan="3"><h6>Grand Total</h6></td>
                                    <td>${{$orders->total_amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>

                       

                      
                    

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