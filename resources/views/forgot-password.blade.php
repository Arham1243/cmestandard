@extends('layouts.main')
@section('content')
        <!-- page-title -->
        <div class="page-title">
            <div class="page-title__img">
                <img src="{{ asset('assets/images/banner-new.png') }}" alt="image" class="imgFluid">
            </div>
            <div class="page-title__content">
                <h1 class="title">Log In</h1>
            </div>
        </div>
    
    
    
        <!-- login -->
        <div class="login">
            <div class="auth mar-y">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="auth__form">
                                <div class="section-content text-center mb-4">
                                    <h2 class="subHeading">Reset Password</h2>
                                </div>
                                <form action="{{ route('forget_password_submit') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="inputField">
                                                <label class="title">Email</label>
                                                <div class="position-relative">
                                                    <input type="email" placeholder="Enter Email :" name="email" required
                                                        value="{{ old('email') }}">
    
                                                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12">
                                            <button type="submit"
                                                class="themeBtn themeBtn--full justify-content-center">Continue</button>
                                        </div>
                                    </div>
                                </form>
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
