@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Web Crawls</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="text-right">
                               @if(Auth::guard('admin')->user()->type == 1)
                            <a href="{{route('admin.newWebCrawl')}}" class="primary-btn primary-bg">Launch New Crawl</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="user-wrapper">
                    <!--<form action="#" class="main-form mc-b-3">-->
                    <!--    <div class="row align-items-end">-->

                    <!--        <div class="col-lg-4 col-12">-->
                    <!--            <div class="row align-items-end">-->
                    <!--                <div class="col-lg-6 col-md-6 col-12">-->
                    <!--                    <div class="form-group">-->
                    <!--                        <label>Sort By Date:</label>-->
                    <!--                        <div class="relative-div">-->
                    <!--                            <input type="text" class="form-control date-picker" placeholder="To">-->
                    <!--                            <i class="fa fa-calendar"></i>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-lg-6 col-md-6 col-12">-->
                    <!--                    <div class="form-group">-->
                    <!--                        <div class="relative-div">-->
                    <!--                            <input type="text" class="form-control date-picker" placeholder="From">-->
                    <!--                            <i class="fa fa-calendar"></i>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->
                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Crawl Title</th>
                                    <th>Added on</th>
                                    <th>Total Links</th>
                                    <th>Published</th>
                                    <th>Archived</th>
                                    <!--<th>Crawl Duration</th>-->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($all_crawls) >= 1)
                                <?php $i = 1;?>
                                @foreach($all_crawls as $key => $value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->keywords}}</td>
                                    <td>{{date_format($value->created_at,'d-m-Y')}}</td>
                                    <?php $total_links = count($value->keywordHasCrawls);
                                    $total_published = App\Models\Crawls::where('is_published',1)->where('keyword_id',$value->id)->count();
                                    $total_archived = App\Models\Crawls::where('is_archived',1)->where('keyword_id',$value->id)->count();
                                    ?>
                                    <td>{{$total_links >=1 ? $total_links : '--'}}</td>
                                    <td>{{$total_published > 0 ? $total_published : 0}}</td>
                                    <td>{{$total_archived > 0 ? $total_archived : 0}}</td>
                                    <!--<td>1 hour</td>-->
                                    <td>
                                        <div class="dropdown show action-dropdown">
                                            <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                <a class="dropdown-item" href="{{route('admin.crawlDetail',$value->id)}}">Detail</a>
                                                   @if(Auth::guard('admin')->user()->type == 1)
                                                <a class="dropdown-item" href="{{route('admin.crawlDelete',$value->id)}}">Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++;?>
                               @endforeach
                               @endif
                            </tbody>
                        </table>
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
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection