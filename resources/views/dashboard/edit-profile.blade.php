@extends('layouts.dashboard.main')

@section('content')
    <div class="col-lg-8 pdy-30">
        <div class="row justify-content-center">
            <div class="profile">
                <div class="col-lg-12">
                    <div class="e-profile">
                        <h2>Edit Profile </h2>
                        <p>Change your profile information</p>
                        <div class="p-image">
                            @if (isset($user->img_tab))
                                <img src="{{ asset($user->img_tab->img_path) }}" width="76px"; height= "77px"; alt="">
                            @else
                                <img src="{{ asset('dash/images/icon-db.png') }}" width="76px"; height= "77px";
                                    alt="">
                            @endif
                            <h2>{{ $user->fname }}
                            </h2>
                            <p>{{ $user->email }}</p>
                            </img>
                        </div>
                    </div>

                    <div class="contact-form1">
                        <form action="{{ route('dashboard.submitProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>First Name</label>
                            <input type="text" name="fname" value="{{ $user->fname }}" placeholder="Your Name"
                                required class=" form-control">

                            <label>Last Name</label>
                            <input type="text" name="lname" value="{{ $user->lname }}" placeholder="Last Name"
                                required class=" form-control">

                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" readonly
                                placeholder="Your E-mail" class=" form-control">

                            <label>Date of Birth</label>
                            <input type="date" name="dob" value="{{ $user->dob }}" required class="form-control"
                                id="exampleInputEmail1">

                            <label>Address (Optional)</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                                id="exampleInputEmail1">

                            <label>Zip Code (Optional)</label>
                            <input type="text" name="zip_code" value="{{ $user->zip_code }}" class="form-control"
                                id="exampleInputEmail1">

                            <div class="custom-control custom-radio custom-control-inline pl-0 ">
                                <label for="exampleInputEmail1">Select any one*:</label>
                            </div>
                            @if ($user->age == '18+')
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="age" value="18+"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label web-p" for="customRadioInline1">I am 18+</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="age" value="Under 18"
                                        class="custom-control-input">
                                    <label class="custom-control-label web-p" for="customRadioInline2">I am under 18</label>
                                </div>
                            @else
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="age" value="Under 18"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label web-p" for="customRadioInline2">I am under 18</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="age" value="18+"
                                        class="custom-control-input">
                                    <label class="custom-control-label web-p" for="customRadioInline1">I am 18+</label>
                                </div>
                            @endif
                            <br />
                            <label>Profile Image</label><br>

                            <input type="file" name="avatar" id=""><br>
                            <div class="update-info"><button type="submit">Update Info</button> </div>


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
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page css here*/
        })()
    </script>
@endsection
