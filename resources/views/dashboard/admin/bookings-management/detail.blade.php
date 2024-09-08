@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
<div class="main-wrapper">
        <div class="chart-wrapper">
        <div class="user-wrapper">   
                <div class="invoice">
                        <div class="invoice__header">
                            <img class="invoice__logo" src="{{asset(isset($logo) ? $logo->img_path : 'images/logo.png')}}" alt="">
                        </div>
                        <div class="invoice_heading">
                            <h1>Booking Invoice</h1>
                        </div>
                        <div class="row invoice__address">
                            <div class="col-6">
                                <div class="text-right">
                                    

                                    <p>Name:</p>
                                    

                                   
                                    <p>Phone:</p>
                                    <p>Email:</p>
                                   
                                    <h6>Msg:</h6>
                                   
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-left">
                                    
                                  
                                    <p>{{$bookings->name}}</p>
                                    <p>{{$bookings->phone}}</p>
                                  
                                    <p>{{$bookings->email}}</p>
                                                                          
                                    <h6>{{isset($bookings->msg) ? $bookings->msg : ''}}</h6>

                                   
                                </div>
                            </div>
                        </div>

                        <div class="row invoice__attrs">
                            <div class="col-2">
                                <div class="invoice__attrs__item">
                                    <small>Booking#</small>
                                    <h3>{{$bookings->id}}</h3>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="invoice__attrs__item">
                                    <small>Date</small>
                                    <h3>{{date('M d,Y', strtotime($bookings->appointment_date))}}</h3>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="invoice__attrs__item">
                                    <small>Total Amount</small>
                                    <h3>${{$bookings->price}}</h3>
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
                               
                               <?php
                                $product = App\Models\Products::where('id',$bookings->product_id)->first();
                                ?>
                               
                              
                                <tr>
                                    <td style="width: 50%">{{$product['name']}} <span> Color: {{$bookings->color_name}}</span><span> Size: {{$bookings->size_name}}</span></td>
                                    <td ><img width="80px" height="80px" src="{{asset($product->img_path)}}"></td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$bookings->quantity_selected}}</td>
                                    <td>${{$bookings->price}}</td>
                                   
                                   
                                </tr>
                                

                                
                               
                                <tr>
                                <td></td>
                                 
                                    <td class="text-right" colspan="3"><h6>Grand Total</h6></td>
                                    <td>${{$bookings->price}}</td>
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