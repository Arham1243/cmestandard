@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Web Crawl Details</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="detail-list-wrapper">
                                <h4>Web Crawl Keywords:</h4>
                                <p>{{$crawlDetail->keywords}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="detail-list-wrapper">
                                <h4>Crawling Date:</h4>
                                <p>{{date_format($crawlDetail->created_at,'d-m-Y')}}</p>
                            </div>
                        </div>
                       
                    </div>
                    <form action="#" class="main-form mc-b-3">
                        <div class="row align-items-end">

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
                    </form>
                    
                    <div class="table-responsive">
                          <form action="{{route('admin.crawlStatusUpdate')}}" method="POST" class="main-form mc-b-3">
                               <input type="hidden" class="keyword_id" name="keyword_id" value="{{$crawlDetail->id}}">
                              @csrf
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Crawl Title</th>
                                    <th>URL</th>
                                       @if(Auth::guard('admin')->user()->type == 1 || Auth::guard('admin')->user()->type == 2)
                                   <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Published</th>
                                    <th>Archived</th>
                                   
                                    @endif
                                      <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php $i = 1;?>
                                @foreach($crawlDetail->keywordHasCrawls as $key => $value)
                                
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->result_title}}</td>
                                    <td><a href="{{$value->result_url}}">{{$value->result_url}}</a></td>
                                   
                                    @if(Auth::guard('admin')->user()->type == 1 || Auth::guard('admin')->user()->type == 2)
                                    <td>
                                    <select class="form-control main_category" id="{{$value->id}}" name="main_category-{{$value->id}}">
                                        <option selected disabled value="0">Select One</option>
                                        @foreach($main_cat as $m)
                                        <option {{$m->id == $value->main_category_id ? 'selected' : ''}} value="{{$m->id}}">{{$m->title}}</option>
                                        @endforeach
                                        
                                    </select>
                                    </td>
                                    <input type="hidden" name="link_id[]" value="{{$value->id}}">
                                    <td>
                                        
                                    <select class="form-control sub_category" id="{{$value->id}}" name="sub_category-{{$value->id}}">
                                        <option selected disabled value="0">Select One</option>
                                        @foreach($sub_cat as $s)
                                        <option {{$s->id == $value->sub_category_id ? 'selected' : ''}} value="{{$s->id}}">{{$s->title}}</option>
                                        @endforeach
                                      
                                    </select>
                                    </td>
                                <!--    <td><label class="switch">-->
                                <!--    <input name="is_published-{{$value->id}}" id="{{$value->id}}" type="checkbox" value="{{$value->is_published == 1? '1':'0' }}" {{$value->is_published == 1? 'checked' :'' }}>-->
                                    
                                <!--  <span class="slider round"></span>-->
                                <!--</label>-->
                                <!--</td>-->
                                <td>
                                    <label for="pubyes">Yes</label>
                                    <input type="radio" id="pubyes" name="is_published-{{$value->id}}" value="1" {{$value->is_published == 1? 'checked' :'' }}>
                                     <label for="pubno">No</label>
                                    <input type="radio" id="pubno" name="is_published-{{$value->id}}" value="0" {{$value->is_published == 0? 'checked' :'' }}>
                                </td>
                                
                                 <td>
                                    <label for="arcyes">Yes</label>
                                    <input type="radio" id="arcyes" name="is_archived-{{$value->id}}" value="1" {{$value->is_archived == 1? 'checked' :'' }}>
                                    <label for="arcno">No</label>
                                    <input type="radio" id="arcno" name="is_archived-{{$value->id}}" value="0" {{$value->is_archived == 0? 'checked' :'' }}>
                                </td>
                                
                                    <!--<td>-->
                                    <!--    <label class="switch">-->
                                    <!--  <input type="checkbox" name="is_archived-{{-- $value->id --}}" id="{{-- $value->id --}}" value="{{-- $value->is_archived == 1? '1':'0' --}}" {{-- $value->is_archived == 1? 'checked' :'' --}}>-->
                                      
                                    <!--  <span class="slider round"></span>-->
                                    <!--    </label>-->
                                    <!--</td>-->
                                    
                                    <td>
                                        <div class="dropdown show action-dropdown">
                                            <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                <a class="dropdown-item" href="{{route('admin.crawlEdit',$value->id)}}">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="dropdown show action-dropdown">
                                            <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                <a class="dropdown-item" href="{{route('admin.crawlEdit',$value->id)}}">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                     @endif
                                </tr>
                                <?php $i++;?>
                               @endforeach
                             
                            </tbody>
                             
                                  
                                
                        </table>
                         @if(Auth::guard('admin')->user()->type == 1 || Auth::guard('admin')->user()->type == 2)
                          <!--<a href="javascript:void(0)" class="primary-btn primary-bg save-btn">Save</a>-->
                            <button type="submit" class="primary-btn primary-bg save-btn">Save</button>
                          @endif
                          </form>
                    </div>

                </div>
            </div>
        </div>
         
    </section>
     <!-- ALERT MODAL -->

     <div class="modal fade alert-modal" id="archive-modal" tabindex="-1" role="dialog"
        aria-labelledby="alert-modal-1-modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="primary-heading color-dark text-center">
                        <figure class="mc-b-2"><img src="{{asset('admin/images/archive-icon.svg')}}" alt="archive-icon"></figure>
                        <h4 class="mc-b-2">Are you sure you want to archive this?</h4>
                        <div class="text-center">
                            <a href="#" class="primary-btn secondary-bg">Yes</a>
                            <a href="#" class="primary-btn primary-bg">No</a>
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
	
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/ 
//   var main_cat = $('.main_category').on('change', function() {
//             return $(this).find(":selected").val() ;
//     });
   
//   $(".save-btn").click(function ()  {
//     //  var is_published = {};
//     //   //var obj = {};
//     //  var is_archived = [];

//       var main_cat = $('.main_category:selected').map(function() {
//           return $(this).val();
//         }).get();
//         console.log(main_cat);
//         return 0;
        
//     var is_published =  $('input[name="is_published"]:checked').map(function(){
        
//       return $(this).attr('id');
      
//     }).get();
    
//     var is_archived =  $('input[name="is_archived"]:checked').map(function(){
        
//       return $(this).attr('id');
      
//     }).get();
    
//     var keyword_id = $('.keyword_id').val();
//     console.log(keyword_id);
    
//     $.ajaxSetup({
//             headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//           });
    
//       $.ajax({
          

//             type: "POST",

//             url: "{{route('admin.crawlStatusUpdate')}}",

//             data: {is_published: is_published, is_archived: is_archived, keyword_id: keyword_id },



//             success: function (msg) {
//               $.toast({
//               heading: 'Success!',
//               position: 'bottom-right',
//               text:  'Crawl Status Updated!',
//               loaderBg: '#ff6849',
//               icon: 'success',
//               hideAfter: 2000,
//               stack: 6
//             });
//             setInterval(() => {
//                 location.reload();
//               }, 2000);
               
//             },
//             beforeSend: function () {
                
//             }
//         });
    
//     //   console.log('is_published '+is_published);
//     //   console.log('is_archived '+is_archived);
//     //   return 0;


// });
  
})()
</script>
@endsection