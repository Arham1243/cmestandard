@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Web Crawl</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form action="{{route('admin.crawlUpdate')}}" method="POST" class="main-form mc-b-3">
                        @csrf
                         <div class="row align-items-end">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Crawl Title*:</label>
                                    <input type="text" name="result_title" required class="form-control" value="{{$crawlDetail->result_title}}" placeholder="Enter Title">
                                </div>
                            </div> 
                            
                             <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Crawl URL*:</label>
                                    <input type="text" name="result_url" required class="form-control" value="{{$crawlDetail->result_url}}" placeholder="Enter Title">
                                </div>
                            </div> 
                            <input type="hidden" name="id" required class="form-control" value="{{$crawlDetail->id}}">
                         
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                        <div class="text-right">
                            <!-- <a href="#" class="primary-btn primary-bg" data-toggle="modal" data-target="#alert-modal-1">Run</a> -->
                            <button type="submit" class="primary-btn primary-bg">Save</button>
                        </div>
                    </div>
                    </form>

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