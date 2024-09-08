@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Forgot Password","INNERCONTENT37",);?>
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
                <div class="form_heading text-center">
                    <?php App\Helpers\Helper::inlineEditable("h6",["class" => " "],"Check your inbox for a password reset link. If you don't see it, please check your spam folder.","INNERCONTENT38",);?>
                </div>
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
