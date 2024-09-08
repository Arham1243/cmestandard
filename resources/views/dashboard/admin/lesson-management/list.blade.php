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
                <h2>Lesson Management</h2>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="text-right">
                <a href="{{route('admin.add_lesson')}}" class="primary-btn primary-bg">Add New</a>
              </div>
            </div>
          </div>

          <!-- <form action="#" class="main-form mc-b-3">
            <div class="row align-items-end">
              <div class="col-lg-4 col-12">
                <div class="form-group">
                  <label>Filter By Type</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Select 1</option>
                    <option>Select 2</option>
                    <option>Select 3</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-12">
                <div class="form-group">
                  <label>Filter By Status</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Select 1</option>
                    <option>Select 2</option>
                    <option>Select 3</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-12">
                <div class="row align-items-end">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                      <label>Sort By Date:</label>
                      <div class="relative-div">
                        <input type="text" class="form-control date-picker" placeholder="To">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                      <div class="relative-div">
                        <input type="text" class="form-control date-picker" placeholder="From">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form> -->

          <div class="table-responsive">
            <table id="user-table" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Created At</th>
                 
                  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ;?>
                @foreach($lesson as $lesson)
               
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$lesson->slug}}</td>
                  <td>{{$lesson->title}}</td>
                  <td>{{date('d-M-Y',strtotime($lesson->created_at))}}</td>
                
                  
                  <td>{{$lesson->is_active == 1 ? 'Active' : 'Non-Active'}}</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      
                        <a class="dropdown-item" href="{{route('admin.edit_lesson',$lesson->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Edit</a>
                          <a class="dropdown-item" href="{{route('admin.delete_lesson',$lesson->id)}}"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                          Delete</a>
                          @if($lesson->is_active == 1)
                        <a class="dropdown-item" href="{{route('admin.suspend_lesson',$lesson->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                        @else
                        <a class="dropdown-item" href="{{route('admin.suspend_lesson',$lesson->id)}}"><i class="fa fa-ban" aria-hidden="true"></i> Activate</a>
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