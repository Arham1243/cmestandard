@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <form id="logo-form" method="POST" action="{{route('admin.saveLogo')}}" enctype="multipart/form-data">
                @csrf
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add / Update Logo</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="text-right">
                            <button id="submit-btn" type="button" class="primary-btn primary-bg">Save Changes</button>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="img-upload-wrapper  mc-b-3">
                            <figure><img src="{{asset($logo->img_path)}}" id="logo_img_my" alt="user-img"></figure>
                            <label for="user-img" class="primary-btn primary-bg">Upload</label>
                            <input type="file" id="user-img" name="logo" class="d-none" required onchange="readURL(this);" accept="image/jpeg, image/png">
                        </div>
                    </div>
                   <div class="col-lg-12 col-md-12 col-12">
                         <h4 class="recommend">Recommended Logo Size Is: 200 X 112</h4>
                   </div>
                </div>
                 
            </div>
        </form>
        </div>
      

    </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.recommend{
    color:#D75DB2;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo_img_my')
                    .attr('src', e.target.result);
                    console.log(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{



                $('#submit-btn').click(function(e)
                {
                    e.preventDefault();
                    if($("#user-img").val() == "")
                {
                
                    $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Please Select Image!',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
                }
                else
                {
                    $('#logo-form').submit();
                }

                });
               
})()
</script>
@endsection