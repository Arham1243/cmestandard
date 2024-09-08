@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"My account","INNERCONTENT39",);?>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="javascript:;">My account</a>
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
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Enter New Password","INNERCONTENT40",);?>
                </div>
                <form action="{{ route('forget-password-reset') }}" method="POST">
                    @csrf
                    <input name="email" value="{{ $reset_email->email }}" type="hidden">
                            <input name="token" value="{{ $token }}" type="hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for="">Password<s>*</s></label>
                                <input type="password" placeholder="********" name="password" required >
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="drop_form_btn">
                                <button class="themebtn">Submit</button>
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
