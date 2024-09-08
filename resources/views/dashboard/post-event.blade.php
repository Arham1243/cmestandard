@extends('layouts.dashboard.main')

@section('content')

<div class="col-lg-8 pdy-30">
                <div class="row justify-content-center">
                    <div class="profile">
                    <form action="{{route('store.event')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-lg-12">
                            <div class="e-profile pdy-30">
                                <h2>Submit A Event Form </h2>
                            </div>

                            <div class="contact-form2">
                                <div class="row m-0">
                                    <div class="col-lg-6">

                                            <label>Event Title</label>
                                            <input name="title" type="text" required class=" form-control">

                                            <label>event group</label>
                                            <input name="event_group" required type="text" class="form-control">

                                            <label>type of event</label>
                                            <select name="event_type" id="" required class="form-control">
                                                @foreach($event_cat as $ec)
                                                <option value="{{$ec->category_name}}">{{$ec->category_name}}</option>
                                                @endforeach
                                            </select>

                                           

                                            <label for="">Event Details</label>
                                            <textarea  id="EventDetail" name="description" required rows="4" cols="37">

                                        </textarea>

                                        <label>Ticket Price </label>
                                            <input name="price" type="number"  required min="1" class=" form-control">

                                       

                                        
                                    </div>
                                    <div class="col-lg-6">

                                        <label for="">alcohol details if applicable</label>
                                            <input name="alcohol_details" required type="text" class="form-control">

                                            <label for="">food details if applicable</label>
                                            <input name="food_details" required type="text" class="form-control">
                                        
                                            <label for="">Event Date</label>
                                            <input type="date" required name="event_date" class="form-control">
                                            
                                            <label for="">Event Image</label>
                                            <div id="drop-area">
                                                
                                                  <p>Drop your image here, or select </p>
                                                  <input type="file" id="fileElem" name="event_image" id="image" required  onchange="handleFiles(this.files)">
                                                  <label class="button" for="fileElem">click to browse</label>
                                                  
                                              </div>

                                            <label>How many tickets do you want to sell? </label>
                                            <input name="stock_qty" required type="number" min="1" class="form-control">
                                           

                                             
                                                                
                                        
                                    </div>



                                    <div class="col-md-12">
                                                <div class="promote-sec">
                                                <label for="">Do you want others to promote your event? </label>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"> <a href="javascript:void(0)" onclick="showDiv()">Yes</a> </li>
                                                    <li class="list-inline-item"> <a href="javascript:void(0)" onclick="hideDiv()">No</a> </li>
                                                </ul>
                                                </div>
                                    </div> 

                                        <div id="payoutBox" class="payoutBox" style="display: none;">
                                            <div class="col-md-12">
                                            <h3> <span><img src="{{asset('images/promote-head-before.png')}}" alt="Image"></span> Payout Per Promotion
                                            </h3>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="green-label">how much will promoters get paid out of each ticket
                                                sale?</label>
                                                <div class="input-dollar">
                                                    <!-- <input type="text" class="form-control"> -->
                                                    <input name="pay_per_promo" type="number"  min="0" class="form-control pay-promo">
                                                    <i class="fa fa-dollar"></i>
                                                </div>
                                            </div>
                                            </div>
                                        </div>


                                </div>

                            </div>




                        </div>
                        <div class="save-info">
                            <button type="submit">save</button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
 .promote-sec{
    border-bottom: 1px solid #d6d6d6;
    border-top: 1px solid #d6d6d6;
    text-align: center;
    margin-top: 12px;
    
}
 .promote-sec ul li {
    background-color: #16c7a6;
    border-radius: 5px;
    margin-right: 5px;
    padding: 3px 10px;
 }

  .promote-sec ul li a {
    color: #fff;
    text-transform: uppercase;
    font-size: 13px;
    line-height: 23px;
}
.promote-sec ul li:last-child {
    background-color: #000;
}
.promote-sec ul li a {
    color: #fff;
    text-transform: uppercase;
    font-size: 13px;
    line-height: 23px;
}

.payoutBox{
    text-align: center;
    width: 100%;
}

.pay-promo{
    width: auto;
    margin: 0 auto;
}

</style>
@endsection
@section('js')
<script type="text/javascript">
    function showDiv() {
      document.getElementById('payoutBox').style.display = "block";
    }
    function hideDiv() {
      document.getElementById('payoutBox').style.display = "none";
    }
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
