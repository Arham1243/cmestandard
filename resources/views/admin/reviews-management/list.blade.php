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
                <h2>Reviews Management</h2>
              </div>
            </div>
            
          </div>

        

          <div class="table-responsive">
            <table id="user-table" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>User Name</th>
                  <th>Rating</th>
                  <th>Email</th>
                  <th>Review</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ;?>
                @foreach($reviews as $review)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$review->get_products->title}}</td>
                  <td>{{$review->full_name}}</td>
                  <td>{{$review->rating.' '. 'Stars'}}</td>
                  <td>{{$review->email}}</td>
                  <td>{{$review->message}}</td>
                

                 
                
                   <td>{{ date('d-M-Y',strtotime($review->created_at)) }}</td>       
                  <td>{{$review->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                  
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      
                        <a class="dropdown-item" href="{{route('admin.edit_review',$review->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> View Review</a>
                         
                          @if($review->is_active == 1)
                        <a class="dropdown-item" href="{{route('admin.suspend_review',$review->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Disapprove</a>
                        @else
                        <a class="dropdown-item" href="{{route('admin.suspend_review',$review->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Approve</a>
                        @endif
                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this Review?')" href="{{route('admin.delete_review',$review->id)}}"><i class="fa fa-trash"
                          aria-hidden="true"></i>
                        Delete</a>
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
  
  /*in page css here*/
})()
</script>
@endsection