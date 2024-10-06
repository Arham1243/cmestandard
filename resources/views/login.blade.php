@extends('layouts.main')
@section('content')
    <style>
        .footer-bg {
            height: 100%;
        }
    </style>
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
                                <h2 class="subHeading">Login</h2>
                            </div>
                            <form action="{{ route('login-submit') }}" method="POST">
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
                                        <div class="inputField">
                                            <label class="title">Password</label>
                                            <div class="position-relative">
                                                <input type="password" placeholder="Enter Password :" class="passwordInput"
                                                    id="passwordInput" name="password" required>

                                                <span class="icon showPassword" onclick="showHide()">
                                                    <i class='bx bxs-show' id="toggleIcon"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="themeBtn themeBtn--full justify-content-center">LOGIN</button>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="auth__bottom">
                                            <p><a href="{{ route('forget-password') }}">Forgot Passowrd</a> </p>
                                            <p>Don’t have an account? <a href="{{ route('sign_up') }}">Sign Up</a> </p>
                                        </div>
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
