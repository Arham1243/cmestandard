@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>{{$publication->title}}</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.savetestimonial')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">


<div class="col-lg-12 col-md-12 col-12">
        <div class="my-4">
<ul class='info info--wraper'>
    @foreach([$publication->name1, $publication->name2, $publication->name3] as $name)
        @if($name)
            <li>{{ $name }}</li>
        @endif
    @endforeach
</ul>

<ul class='info'>
    @foreach([$publication->email1, $publication->email2, $publication->email3] as $email)
        @if($email)
            <li><a href="mailto:{{ $email }}"><i class="fa fa-envelope" aria-hidden="true"></i>{{ $email }}</a></li>
        @endif
    @endforeach
</ul>


    </div>
</div>
<div class="col-lg-12 col-md-12 col-12">
   @if ($publication->publication_type == 1)
   @if ($publication->abstract != null)
    <div class="mt-2 mb-4">
        <div class="primary-subtitle">Abstract:</div>
        <div class="editor-content">
            {!! $publication->abstract !!}
        </div>
    </div>
@endif

@if ($publication->keywords != null)
    <div class="my-4">
        <div class="primary-subtitle">Keywords:</div>
        <div class="editor-content">
            {!! $publication->keywords !!}
        </div>
    </div>
@endif

@if ($publication->introduction != null)
    <div class="my-4">
        <div class="primary-subtitle">1. Introduction:</div>
        <div class="editor-content">
            {!! $publication->introduction !!}
        </div>
    </div>
@endif

@if ($publication->materials_and_methods != null)
    <div class="my-4">
        <div class="primary-subtitle">2. Materials and Methods:</div>
        <div class="editor-content">
            {!! $publication->materials_and_methods !!}
        </div>
    </div>
@endif

@if ($publication->results != null)
    <div class="my-4">
        <div class="primary-subtitle">3. Results:</div>
        <div class="editor-content">
            {!! $publication->results !!}
        </div>
    </div>
@endif



@if ($publication->figure != null)
    <div class="my-4">
        <div class="primary-subtitle">Figure:</div>
        <div class="editor-content">
            {!! $publication->figure !!}
        </div>
    </div>
@endif
@if (!$result_images->isEmpty())
    <div class="my-4 ml-4">
        <div class="row">
            @foreach ($result_images as $image)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-card">
                        <div class="gallery-card__img">
                            <a href="{{ $image->result_image_path }}" class="gallery-card__img" data-fancybox="gallery">
                                <img src="{{ $image->result_image_path }}" alt="image" class="imgFluid">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if ($publication->table_publication != null)
    <div class="my-4">
        <div class="primary-subtitle">Table:</div>
        <div class="editor-content">
            {!! $publication->table_publication !!}
        </div>
    </div>
@endif

@if ($publication->theorem != null)
    <div class="my-4">
        <div class="primary-subtitle">Theorem:</div>
        <div class="editor-content">
            {!! $publication->theorem !!}
        </div>
    </div>
@endif

@if ($publication->proof_of_theorem != null)
    <div class="my-4">
        <div class="primary-subtitle">Proof of Theorem:</div>
        <div class="editor-content">
            {!! $publication->proof_of_theorem !!}
        </div>
    </div>
@endif

@if ($publication->discussion != null)
    <div class="my-4">
        <div class="primary-subtitle">4. Discussion:</div>
        <div class="editor-content">
            {!! $publication->discussion !!}
        </div>
    </div>
@endif

@if ($publication->conclusions != null)
    <div class="my-4">
        <div class="primary-subtitle">5. Conclusions:</div>
        <div class="editor-content">
            {!! $publication->conclusions !!}
        </div>
    </div>
@endif

@if ($publication->patents != null)
    <div class="my-4">
        <div class="primary-subtitle">6. Patents:</div>
        <div class="editor-content">
            {!! $publication->patents !!}
        </div>
    </div>
@endif

@if ($publication->author_contribution != null)
    <div class="my-4">
        <div class="primary-subtitle">Author contribution:</div>
        <div class="editor-content">
            {!! $publication->author_contribution !!}
        </div>
    </div>
@endif

@if ($publication->funding != null)
    <div class="my-4">
        <div class="primary-subtitle">Funding:</div>
        <div class="editor-content">
            {!! $publication->funding !!}
        </div>
    </div>
@endif

@if ($publication->institutional_review_board_statement != null)
    <div class="my-4">
        <div class="primary-subtitle">Institutional Review Board Statement:</div>
        <div class="editor-content">
            {!! $publication->institutional_review_board_statement !!}
        </div>
    </div>
@endif

@if ($publication->informed_consent_statement != null)
    <div class="my-4">
        <div class="primary-subtitle">Informed Consent Statement:</div>
        <div class="editor-content">
            {!! $publication->informed_consent_statement !!}
        </div>
    </div>
@endif

@if ($publication->data_availability_statement != null)
    <div class="my-4">
        <div class="primary-subtitle">Data Availability Statement:</div>
        <div class="editor-content">
            {!! $publication->data_availability_statement !!}
        </div>
    </div>
@endif

@if ($publication->acknowledgments != null)
    <div class="my-4">
        <div class="primary-subtitle">Acknowledgments:</div>
        <div class="editor-content">
            {!! $publication->acknowledgments !!}
        </div>
    </div>
@endif

@if ($publication->conflicts_of_interest != null)
    <div class="my-4">
        <div class="primary-subtitle">Conflicts of Interest:</div>
        <div class="editor-content">
            {!! $publication->conflicts_of_interest !!}
        </div>
    </div>
@endif

@if ($publication->appendix_a != null)
    <div class="my-4">
        <div class="primary-subtitle">Appendix A:</div>
        <div class="editor-content">
            {!! $publication->appendix_a !!}
        </div>
    </div>
@endif

@if ($publication->appendix_b != null)
    <div class="my-4">
        <div class="primary-subtitle">Appendix B:</div>
        <div class="editor-content">
            {!! $publication->appendix_b !!}
        </div>
    </div>
@endif

@if ($publication->references_publication != null)
    <div class="my-4">
        <div class="primary-subtitle">References:</div>
        <div class="editor-content">
            {!! $publication->references_publication !!}
        </div>
    </div>
@endif

@elseif($publication->publication_type == 2)
    <a href="{{ $publication->document_path }}" target="_blank" class="primary-btn primary-bg">View
        Publication</a>
@endif
</div>

                           </div>
                         
                             
                           </div>
                       
                    </form>

                </div>
                
            </div>
        </div>
        </div>
        </div>
    

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}

.recommend{
    color:#D75DB2;
}
.full-img{
    width: 100%;
    height: 550px;
    object-fit:contain;
    object-position:top;
    border-radius:1rem;
    
}
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
// function thumb(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.thumbnail-img')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }




(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


//     $('#add-record').click(function(e)
//     {
//         e.preventDefault();
//         var value1 = CKEDITOR.instances['editor1'].getData();
//         var val1 = $("#message1").val(value1);
//         var value2 = CKEDITOR.instances['editor2'].getData();
//         var val2 = $("#message2").val(value2);
      
//                 //console.log(val1.attr('value'));
               

//                 if(val1.attr('value') != '' && val2.attr('value') != '' )
//                 {
//                     $('#add-record-form').submit();
//                 }

//                 else
//                 {
//                     $.toast({
//               heading: 'Error!',
//               position: 'bottom-right',
//               text:  'Short & Long Description Is Required!',
//               loaderBg: '#ff6849',
//               icon: 'error',
//               hideAfter: 5000,
//               stack: 6
//             });
//                 }
//     });
    
})()
</script>
@endsection