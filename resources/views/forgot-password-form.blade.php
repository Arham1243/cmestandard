@extends('layouts.main')
@section('content')
    <div class="page-title">
        <div class="page-title__img">
            <img src="{{ asset('assets/images/banner-new.png') }}" alt="image" class="imgFluid">
        </div>
        <div class="page-title__content">
            <h1 class="title">Reset Your Password</h1>
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
                                <h2 class="subHeading">Enter New Password</h2>
                            </div>
                            <form action="{{ route('forget-password-reset') }}" method="POST">
                                @csrf
                                <input name="email" value="{{ $reset_email->email }}" type="hidden">
                                <input name="token" value="{{ $token }}" type="hidden">
                                <div class="row">
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
                                            class="themeBtn themeBtn--full justify-content-center">Submit</button>
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
