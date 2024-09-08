@extends('layouts.main')
@section('content')
    <style>
        .footer-bg {
            height: 100%;
        }
    </style>

    {{-- <div class="page-title">
        <div class="page-title__img">
            <img src="{{ asset('assets/images/banner-new.png') }}" alt="image" class="imgFluid">
        </div>
        <div class="page-title__content">
            <?php App\Helpers\Helper::inlineEditable('h1', ['class' => 'title'], 'Licensing services', '1content42'); ?>

        </div>
    </div> --}}

    <div class="obj-cme">
        <div class="container">
            <div class="section-content text-center mb-5 pb-2">
                <?php App\Helpers\Helper::inlineEditable('h2', ['class' => 'subHeading'], 'Objectives of CME', 'content12'); ?>

            </div>
            <div class="row pt-5">
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="assets/images/report-ico 1.png" alt="image" class="imgFluid" loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Stay current with the latest developments within their specialty to improve
                                overall patient care.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="{{ asset('assets/images/Product-page.png') }}" alt="image" class="imgFluid"
                                    loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Address real-world challenges that health care physicians face day to day.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="assets/images/shield-ico 1.png" alt="image" class="imgFluid" loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Learn and refine skills through simulation-based hands-on training.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="assets/images/report-ico 1.png" alt="image" class="imgFluid" loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Gain professional growth and a means to advance career status.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="{{ asset('assets/images/Product-page.png') }}" alt="image" class="imgFluid"
                                    loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Meet licensing/certification requirements.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon">
                                <img src="assets/images/shield-ico 1.png" alt="image" class="imgFluid" loading="lazy" />
                            </div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Earn membership in professional organizations around the world.</div>
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
