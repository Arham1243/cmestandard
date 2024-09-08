@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
                <div class="row justify-content-center">
                    <div class="profile">
                        <div class="col-lg-12">
                            <div class="e-profile pdy-30">
                                <h2>Submit A Product Form </h2>
                            </div>

                        <div class="contact-form2">
                                <div class="row m-0">
                                    <div class="col-lg-6">
                                        <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <label>Product Name</label>
                                            <input type="text" name="title" required class="form-control">

                                             <label>Product Weight (lbs)</label>
                                            <input name="weight" required type="number" min="1" class="form-control">
                                            
                                            <label>Product Width (in)</label>
                                            <input name="width" required type="number" min="1" class="form-control">


                                            <label>Company Name</label>
                                            <input name="company" required type="text" class="form-control">



                                            <label for="">Product Category</label>
                                            <select name="category" id="" required class="form-control">
                                                @foreach($product_cat as $pc)
                                                <option value="{{$pc->category_name}}">{{$pc->category_name}}</option>                                               
                                                @endforeach
                                                
                                            </select>
                                            
                                            

                                            <label for="">Product Description</label>
                                            <textarea id="EventDetail" name="description" required rows="4" cols="37"></textarea>
                                        

                                       
                                    </div>
                                    <div class="col-lg-6">


                                        
                                            <label>Price </label>
                                            <input name="price" required type="number" min="1" class=" form-control">
                                            
                                            <label>Product Height (in)</label>
                                            <input name="height" required type="number" min="1" class="form-control">
                                            
                                             <label>Product Length (in)</label>
                                            <input name="length" required type="number" min="1" class="form-control">

                                            <label>How many units of this product do you want to sell? </label>
                                            <input name="stock_qty" required type="number" min="1" class="form-control">

                                            <label for="">Product Image</label>
                                            <div id="drop-area">
                                                
                                                  <p>Drop your image here, or select </p>
                                                  <input type="file" name="product_image" required id="fileElem"  onchange="handleFiles(this.files)">
                                                  <label class="button" for="fileElem">click to browse</label>
                                                
                                              </div>
                                       
                                        
                                    </div>


                                    <div class="col-md-12">
                                                <div class="promote-sec">
                                                <label for="">Do you want others to promote your product? </label>
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
                                                <label for="" class="green-label">how much will promoters get paid out of each unit
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
