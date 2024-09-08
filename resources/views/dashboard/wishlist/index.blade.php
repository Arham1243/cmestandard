@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
                <div class="row justify-content-center">
                    <div class="profile pdy-30">
                        <div class="col-lg-12">
                          

               
                     <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th scope="col" class="text-center dark-gren-12">URL</th>
                            <th scope="col" class="text-center dark-gren-12">Description</th>
                             <!--<th scope="col" class="text-center dark-gren-12">Add To Wish List</th>-->
                        </tr>
                    </thead>
                   <tbody>
                        @foreach($wishlist as $key => $value)
                          <?php $filtered_url = parse_url($value->crawl_url);
                            $host = $filtered_url['host'];
                          
                         ?>
                        
                        <tr>
                            <th scope="row"><a href="{{$value->crawl_url}}" target="_blank"><a href="{{$value->crawl_url}}" target="_blank"
                                        class="dark-gren-8">{{$host}}</a></a></th>
                            <td>{{$value->result_description}}</td>
                               
                        </tr>
                       @endforeach
                     
                    </tbody>
                
            </table>
                    </div>
                   </div>

                    </div>
                </div>
                
            </div>
               
               
            </div>

            <!-- <img src="images/ballon.png" class="arow-2" alt="">
            <img src="images/doll.png" class="doll-pic" alt="">
            <img src="images/airplane.png" class="arow-2" alt=""> -->
        </div>
    </div>
    
    <!--<img src="{{asset('images/carton.png')}}" class="carton-pic" alt="">-->



@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
  	.table-bordered{
	    border: 3px solid #dee2e6;
	}
.btn-sm{
    padding: 6px 7px;
}
</style>
@endsection
@section('js')
<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();        
    });
</script>
<script type="text/javascript">
(()=>{
  /*in page css here*/
//   let dropArea = document.getElementById('drop-area');
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
