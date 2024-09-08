@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
					<div class="row justify-content-center">
						<div class="profile">
							<div class="col-lg-12">
								<div class="e-profile">
									<h2>Edit Product</h2>
									<p>Change your Product information</p>
								
								</div>

								<div class="contact-form2 pd-10">
                                    <div class="row m-0">
                                        <div class="col-lg-6">
                                            <form action="{{ route('updateproducts') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$products->id}}">
                                                <label>Title</label>
                                                <input type="text" name="title" required value="{{$products->title}}" class=" form-control">
                                                
                                                 <label>Product Weight (lbs)</label>
                                                <input name="weight" required type="number" value="{{$products->weight}}" min="1" class="form-control">
                                                
                                                <label>Product Width (cm)</label>
                                                <input name="width" required type="number" value="{{$products->width}}" min="1" class="form-control">
    
                                                <label>Stock Quantity</label>
                                                    <input type="number" min="1" name="stock_qty" required value="{{$products->stock_qty}}"  class=" form-control">
                                                    
                                                    <label for="">Company Name</label>
                                                    <input name="company" value="{{$products->company}}" required type="text" class="form-control">
    
                                                <label for="">Description</label>
                                                <textarea name="description"  required id="EditEvent" rows="4" cols="37">{{$products->description}}
                                            </textarea>
    
                                          
                                           
                    
                                        </div>
                                        <div class="col-lg-6">
    
                                        <label for="">Product Category</label>
                                        <select name="category" value="{{$products->category}}" id="" required class="form-control">
                                            <option value="crockrey">crockrey</option>
                                            <option value="confitionery">confitionery</option>
                                            <option value="dairy">dairy</option>
                                            <option value="household equipments">household equipments</option>
                                            <option value="electronics">electronics</option>
                                            <option value="gadgets">gadgets</option>
                                            <option value="others">others</option>
                                            
                                        </select>
                                        
                                            <label>Product Height (cm)</label>
                                            <input name="height" required type="number" value="{{$products->height}}" min="1" class="form-control">
                                            
                                             <label>Product Length (cm)</label>
                                            <input name="length" required type="number" value="{{$products->length}}" min="1" class="form-control">
                                            
                                                <label>New Price </label>
                                                <input type="number" min="1" name="price" required value="{{$products->price}}" class=" form-control">
    
                                                <label>Old Price</label>
                                                <input type="number" min="1" name="old_price"  value="{{$products->old_price}}" class=" form-control">

                                                <label for="">Payment Per Promation</label>
                                                <input type="number" min="0" name="pay_per_promo"  value="{{$products->pay_per_promo}}" class=" form-control">
                                                <label for="">Product Image</label>
                                               
                                                <div id="drop-area">
                                                      <p>Drop your image here, or select </p>
                                                      <input type="file" name="image" id="fileElem"  onchange="handleFiles(this.files)">
                                                      <label class="button" for="fileElem">click to browse</label>
                                                    
                                                  </div>
                                            
                                            
                                        </div>
                                    </div>
    
                                </div>
                                <div class="save-info">
                                <button type="submit">Update Info</button>
                    
                                            </div>

							</div>
                            </form>
						</div>
					</div>
				</div>

@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
  .btn-sm{
    padding: 6px 7px;
}
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
