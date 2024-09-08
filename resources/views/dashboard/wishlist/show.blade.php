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
                                            <h2>View Event</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="save-info">
                                            <a href="{{route('events')}}">Back</a>
                
                                        </div>
                                    </div>
                                </div>
                            
   
                        </div>
                            <table class="table table-hover table-order1">
                             
                                <tbody class="order-list">
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td>{{ $events->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $events->title }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">New Price</th>
                                        <td>{{ $events->price }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Event Group</th>
                                        <td>{{ $events->event_group }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Event Type</th>
                                        <td>{{ $events->event_type }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">alcohol details if applicable</th>
                                        <td>{{ $events->alcohol_details }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">food details if applicable</th>
                                        <td>{{ $events->food_details }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Event Type</th>
                                        <td>{{ $events->event_type }}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Old Price</th>
                                        <td>{!! $events->old_price !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Per Promotion </th>
                                        <td>{!! $events->pay_per_promo !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Event Date</th>
                                        <td>{!! $events->event_date !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Stock Quantity</th>
                                        <td>{!! $events->stock_qty !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{!! $events->description !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Created At </th>
                                        <td>{!! $events->created_at !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Is Trending </th>
                                        <td>{!! $events->is_trending == 1 ? "Yes" : "No" !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Is Active </th>
                                        <td>{!! $events->is_active == 1 ? "Yes" : "No" !!}</td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">Image</th>
                                        <td><img src="{{ asset($events->img_tab->img_path) }}" alt="" width="100px" height="100px"></td>
                                      
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
