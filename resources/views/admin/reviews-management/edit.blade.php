@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>View Review</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="#" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                    @csrf
                    <input type="hidden" name="id" value="{{ $review->id }}">
                    <div class="row align-items-end">
                        <div class="col-lg-12">
                            <div class="sub-title">User Details</div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>User Name*:</label>
                                <input readonly type="text" name="user_full_name" class="form-control"
                                    value="{{ $review->get_user->full_name }}">
                                @if ($errors->has('user_full_name'))
                                    <span class="error">{{ $errors->first('user_full_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>User Email*:</label>
                                <input readonly type="text" name="user_email" class="form-control"
                                    value="{{ $review->get_user->email }}">
                                @if ($errors->has('user_email'))
                                    <span class="error">{{ $errors->first('user_email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>User Phone*:</label>
                                <input readonly type="text" name="user_phone" class="form-control"
                                    value="{{ $review->get_user->phone }}">
                                @if ($errors->has('user_phone'))
                                    <span class="error">{{ $errors->first('user_phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 mt-2 mb-4">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="sub-title">Review Details</div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Full Name*:</label>
                                <input readonly type="text" name="full_name" class="form-control"
                                    value="{{ $review->full_name }}">
                                @if ($errors->has('full_name'))
                                    <span class="error">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Email*:</label>
                                <input readonly type="text" name="email" class="form-control"
                                    value="{{ $review->email }}">
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Review*:</label>
                                <textarea readonly name="message" class="form-control">{{ $review->message }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="error">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>


            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="text-center">
                    <a href="{{ route('admin.reviews_listing') }}" class="primary-btn primary-bg">Go Back</a>
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
        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .sub-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-transform: capitalize;
            margin-bottom: 1rem;
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




        (() => {

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
