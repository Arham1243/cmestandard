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
                                            <h2>View Product</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="save-info">
                                            <a href="{{route('products')}}">Back</a>
                
                                        </div>
                                    </div>
                                </div>
                            
   
                        </div>
                            <table class="table table-hover table-order1">
                             
                                <tbody class="order-list">
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td>{{ $products->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $products->title }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">New Price</th>
                                        <td>{{ $products->price }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Old Prices</th>
                                        <td>{!! $products->old_price !!}</td>
                                      
                                    </tr>
                                     <tr>
                                        <th scope="row">Product Weight (lbs)</th>
                                        <td>{!! $products->weight !!}</td>
                                      
                                    </tr>
                                     <tr>
                                        <th scope="row">Product Width (cm)</th>
                                        <td>{!! $products->width !!}</td>
                                      
                                    </tr>
                                     <tr>
                                        <th scope="row">Product Height (cm)</th>
                                        <td>{!! $products->height !!}</td>
                                      
                                    </tr>
                                     <tr>
                                        <th scope="row">Product Length (cm)</th>
                                        <td>{!! $products->length !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Per Promotion </th>
                                        <td>{!! $products->pay_per_promo !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Stock Quantity</th>
                                        <td>{!! $products->stock_qty !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name</th>
                                        <td>{!! $products->company !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Category</th>
                                        <td>{!! $products->category !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{!! $products->description !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Created At </th>
                                        <td>{!! $products->created_at !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Is Trending </th>
                                        <td>{!! $products->is_trending == 1 ? "Yes" : "No" !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Is Active </th>
                                        <td>{!! $products->is_active == 1 ? "Yes" : "No" !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Image</th>
                                        <td><img src="{{ asset($products->img_tab->img_path) }}" alt="" width="100px" height="100px"></td>
                                      
                                    </tr>
                                </tbody>
                            </table>






                        </div>

                    </div>
                </div>
            </div>

@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
  .btn-sm{
    padding: 6px 7px;
}
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
