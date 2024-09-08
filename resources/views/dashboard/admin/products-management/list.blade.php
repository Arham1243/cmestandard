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
                <h2>Products Management</h2>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="text-right">
                <a href="{{route('admin.add_products')}}" class="primary-btn primary-bg">Add New</a>
              </div>
            </div>
          </div>

         
          <div class="table-responsive">
            <table id="user-table" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  
                  <th>Title</th>
                  <!-- <th>Slug</th> -->
                  <th> Price ($)</th>
                  <!-- <th>Cost Price ($)</th> -->
                
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Image</th>
                  <th>Created At</th>
                 
                  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ;?>
                @foreach($products as $product)
               
                <tr>
                  <td>{{$i}}</td>
                  
                  <td>{{$product->name}}</td>
                  <!-- <td>{{-- $product->slug --}}</td> -->
                  <td>${{$product->price}}</td>
                
                 
                  <td>{{$product->category_id != 0 ? $product->productBelongsToCategory->title : '--'}}</td>
                  <td>{{$product->sub_category_id != 0 ? $product->productBelongsToSubCategory->title : '--'}}</td>
                  <td><img width="80px" height="80px" src="{{asset($product->img_path)}}"></td>
                  <td>{{date('d-M-Y',strtotime($product->created_at))}}</td>
                
                  
                  <td>{{$product->is_active == 1 ? 'Active' : 'Non-Active'}}</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      
                        <a class="dropdown-item" href="{{route('admin.edit_products',$product->slug)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Edit</a>
                          <a class="dropdown-item" href="{{route('admin.delete_products',$product->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Delete</a>
                          @if($product->is_active == 1)
                        <a class="dropdown-item" href="{{route('admin.suspend_products',$product->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                        @else
                        <a class="dropdown-item" href="{{route('admin.suspend_products',$product->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Activate</a>
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

  </section>

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