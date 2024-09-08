@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
					<div class="row justify-content-center">
						<div class="profile">
							<div class="col-lg-12">
								<div class="e-profile">
									<h2>Edit Event</h2>
									<p>Change your event information</p>
								
								</div>

								<div class="contact-form2 pd-10">
                                    <div class="row m-0">
                                        <div class="col-lg-6">
                                            <form action="{{ route('updateevents') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$events->id}}">
                                                <label>Title</label>
                                                <input type="text" name="title" required value="{{$events->title}}" class="form-control">
    
                                                <label>Stock Quantity</label>
                                                    <input type="number" min="1" name="stock_qty" required value="{{$events->stock_qty}}" class="form-control">
                                        
                                                    <label for="">Event Group</label>
                                                    <input name="event_group" value="{{$events->event_group}}" required type="text" class="form-control">
    
                                                    <label for="">Event Type</label>
                                                    <select name="event_type" id="" value="{{$events->event_type}}" required class="form-control">
                                                        <option value="corporate">corporate</option>
                                                        <option value="personal">personal</option>
                                                        <option value="individual">individual</option>
                                                    </select>

                                                <label for="">Description</label>
                                                <textarea name="description"  required id="EditEvent" rows="4" cols="37">{{$events->description}}
                                            </textarea>
                                            
                                            <label for="">Event Date</label>
                                            <input type="date" value="{{$events->event_date}}" required name="event_date" class="form-control">

                                            
                                            
                    
                                        </div>
                                        <div class="col-lg-6">
    
                                                <label for="">alcohol details if applicable</label>
                                                <input name="alcohol_details" value="{{$events->alcohol_details}}" required type="text" class="form-control">
                                            
                                                <label for="">food details if applicable</label>
                                                <input name="food_details" value="{{$events->food_details}}" required type="text" class="form-control">

                                                <label>New Price </label>
                                                <input type="number" min="1" name="price" required value="{{$events->price}}" class=" form-control">

                                                <label>Old Price</label>
                                                <input type="number" min="1" name="old_price"  value="{{$events->old_price}}" class=" form-control">

                                                <label for="">Payment Per Promotion</label>
                                                <input type="number" min="0" name="pay_per_promo"  value="{{$events->pay_per_promo}}" class=" form-control">
                                                
                                                
                                                <label for="">Product Image</label>

                                                <div id="drop-area">
                                                      <p>Drop your image here, or select </p>
                                                      <input type="file" name="image" id="fileElem"  onchange="handleFiles(this.files)">
                                                      <label class="button" for="fileElem">click to browse</label>
                                                    
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
