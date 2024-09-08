@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Edit SubCategory</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.savesubcategory')}}" method="POST" class="main-form create_user_form">
            @csrf
        
          <div class="row">


          <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label>Sub Category title*:</label>
                <input type="text" name="title" id="name" value="{{$subcategory->title}}"  class="form-control" placeholder="Enter Title">
                <input type="hidden" name="id" value="{{$subcategory->id}}">
              </div> 
            @if($errors->has('title'))
              <div class="error">{{ $errors->first('title') }}</div>
            @endif
            </div>

            
            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Slug*:</label>
                                    <input type="text" name="slug" id="slug" required value="{{$subcategory->slug}}" class="form-control" placeholder="Enter Slug">
                                    @if ($errors->has('slug'))
                                    <span class="error">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>
              
              <div class="col-lg-12 col-md-12 col-12">
              <div class="form-group">
                    <label>Main Category*:</label>
                <select class="form-control" name="category_id" aria-label="Default select example">

                <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
            
                  @foreach( $maincategory as $value)
                    <option value="{{$value->id}}" {{ ($value->id == $subcategory->category_id)? 'selected' : ''}} >{{$value->title}}</option>
                    @endforeach
                    
                </select>
              </div>
              @if($errors->has('category_id'))
              <div class="error">{{ $errors->first('category_id') }}</div>
            @endif
            
            </div>

         
      
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg add-user">Update</button>
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

$('#name').change(function(e) {
    $.get('{{ route('admin.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
    
(()=>{
    
})()
</script>
@endsection