@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Forgot Password","INNERCONTENT35",);?>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="javascript:;">forgot password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="login_form_section">
        <div class="container">
            <div class="login_form">
                <div class="form_heading">
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"forgot password","INNERCONTENT36",);?>
                </div>
                <form action="{{ route('forget_password_submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for=""> Email address <s>*</s></label>
                                <input type="text" placeholder="Enter Email" name="email" required
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="drop_form_btn">
                                <button class="themebtn">Continue</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
