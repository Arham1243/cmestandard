@extends('layouts.main')
@section('content')

<style>
.footer-bg{
    height:100%;
}
</style>


<!-- page-title -->
<div class="page-title">
    <div class="page-title__img">
        <img src="{{ asset("assets/images/banner-new.png") }}" alt="image" class="imgFluid">
    </div>
    <div class="page-title__content">
        <?php App\Helpers\Helper::inlineEditable("h1", ["class" => "title"], "faqs", "content43"); ?>

    </div>
</div>

<!-- faqs -->
<div class="faqs">
    <div class="container">
        <div class="section-content text-center">
            <?php App\Helpers\Helper::inlineEditable("h2", ["class" => "subHeading"], "Learn more about our platform <br> by user questions", "content44"); ?>

        </div>
        <div class="row pt-4">
             @foreach ($faqs as $i => $faq)

            <div class="col-md-6">
                <div class="faqs-content">
                    <div class="faqs-box">
                        <div class="faqs-single accordian active">
                            <div class="faqs-single__header accordian-header">
                                <div class="faqs-content__title">{{ $faq->question }}</div>
                                <div class="faq-icon"><i class='bx bx-plus'></i></div>
                            </div>
                            <div class="faqs-single__content accordian-content">
                                <div class="hidden-wrapper faqs-content__pra">
                                     {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
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