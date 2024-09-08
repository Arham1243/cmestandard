@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>EDIT PARTICIPANT</h2>
                    </div>
                </div>

            </div>


            <div class="user-wrapper">
                <form class="main-form mc-b-3" id="add-record-form" action="{{ route('admin.update_participant') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row justify-content-center">
                        <input type="hidden" name="id" value="{{ $participant->id }}">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Participant Name:</label>
                                <input type="text" name="name" value="{{ $participant->name }}" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="vote">Vote:</label>
                                <input type="number" name="vote" class="form-control" value="{{ $participant->vote }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Participant Image</h3>
                                <figure><img src="{{ asset($participant->img_path) }}" class="thumbnail-img" alt="user-img">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="homeslider" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">

                                <button id="add-record" type="submit" class="primary-btn primary-bg">Update</button>
                            </div>
                        </div>
                    </div>
                </form>




            </div>
        @endsection
        @section('css')
            <style type="text/css">
                /*in page css here*/
                .thumbnail-img {
                    max-width: 288px;
                    height: 113px;

                }

                .picture {
                    max-width: 288px;
                    height: 113px;

                }
            </style>
        @endsection
        @section('js')
            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script type="text/javascript">
                function thumb(input) {
                    if (input.files && input.files[0]) {

                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('.thumbnail-img')
                                .attr('src', e.target.result);

                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }





                (() => {

                    // $('#add-record').click(function(e)
                    // {
                    // if($("#thumbnail-img").val() == "")
                    // {
                    //         $.toast({
                    //             heading: 'Error!',
                    //             position: 'bottom-right',
                    //             text:  'Please Select A Banner Image!',
                    //             loaderBg: '#ff6849',
                    //             icon: 'error',
                    //             hideAfter: 2000,
                    //             stack: 6
                    //         });
                    // }
                    // else
                    // {
                    //     $('#add-record-form').submit();
                    // }

                    // });

                })()
            </script>
        @endsection
