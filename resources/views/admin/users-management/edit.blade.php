@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit User</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.update_user') }}" method="POST" enctype="multipart/form-data" class="main-form">
                @csrf
                <div class="row mc-b-2">
                    <div class="col-lg-8 col-md-8 col-12 col-center">
                        <div class="user-img-wrapper mc-b-3">
                            <figure>
                                <img src="{{ $user->profile_img ?? asset('admin/images/placeholder.png') }}"
                                    class="user-details-img" alt="user-img">
                            </figure>
                            <label for="user-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" onchange="readURL(this);" name="profile_img" id="user-img" class="d-none"
                                accept="image/jpeg, image/png">

                        </div>

                    </div>
                </div>

                <div class="row">
                    <input type="hidden" name="id" value="{{ $user->id }}">


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Full Name*:</label>
                            <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control"
                                placeholder="Enter Full Name">
                            @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Email*:</label>
                            <input type="text" readonly value="{{ $user->email }}" class="form-control">
                        </div>
                    </div>






                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Password*:</label>
                            <input type="text" name="password" value="{{ $user->password_sample }}" required
                                class="form-control" placeholder="Enter Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>




                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg">Save Changes</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    </div>
@endsection
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style type="text/css">
        /*in page css here*/
        .img-fluid {
            max-width: 113px;
            height: 113px;
        }

        .datepicker-inline {
            position: absolute;
            left: 0;
            top: 80%;
            z-index: 100;
            background: #fff;
            width: 100%;
            margin: auto;
            box-shadow: 0 0 15px 5px #00000020;
            padding: 1rem;
        }

        .table-condensed {
            width: 100%;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var calendarVisible = false;

            $("#calendarContainer").datepicker({
                minViewMode: "years", // Change to years for year input
                format: "yyyy", // Use 'yyyy' format for year
                autoclose: true,
            });

            $("#calendarContainer").hide();

            $("#yearInput").click(function() { // Change to 'yearInput'
                if (calendarVisible) {
                    $("#calendarContainer").hide();
                    calendarVisible = false;
                } else {
                    $("#calendarContainer").show();
                    calendarVisible = true;
                }
            });

            $(document).click(function(event) {
                if (!$(event.target).closest("#calendarContainer, #yearInput").length) {
                    $("#calendarContainer").hide();
                    calendarVisible = false;
                }
            });

            $("#calendarContainer")
                .datepicker()
                .on("changeDate", function(event) {
                    var selectedYear = event.date.getFullYear();
                    $("#yearInput").val(selectedYear); // Change to 'yearInput'
                    $("#calendarContainer").hide();
                    calendarVisible = false;
                });


        });



        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log('sad');
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.user-details-img')
                        .attr('src', e.target.result);
                    console.log(e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        (() => {

            /*in page css here*/
        })()
    </script>
@endsection
