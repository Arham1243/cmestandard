@extends('layouts.main')
@section('content')
    <div class="full-section">
        <div class="group3-img">
            <img src='{{ asset('assets/images/Group 1707479537.png') }}' alt='image' class='imgFluid' loading='lazy'>
        </div>
        <div class="container">
            <div class="about-us__content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="section-content section-content--alt">
                            <div class="subHeading">Please Check Your Email! </div>
                            <p> We've sent a password reset link to <strong>{{ $email }}</strong>. Just click the link
                                in the email
                                to
                                reset your password. If you don't see it, make sure to check your spam folder.</p>
                        </div>
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
            /*in page js here*/
        })()
    </script>
@endsection
