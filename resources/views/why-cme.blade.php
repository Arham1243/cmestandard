@extends('layouts.main')
@section('content')
    <style>
        .footer-bg {
            height: 100%;
        }
    </style>

    <!-- page-title -->
    {{-- <div class="page-title">
        <div class="page-title__img">
            <img src="{{ asset('assets/images/banner-new.png') }}" alt="image" class="imgFluid">
        </div>
        <div class="page-title__content">
            <h1 class="title">Why CME</h1>

        </div>
    </div> --}}

    <!-- why-cme -->
    <div class="why-cme " style="padding: 4rem 0; margin: 0;">
        <div class="container">
            <div class="why-cme__content">
                <div class="section-content">
                    <div class="heading">Why CME</div>
                    <div class="subHeading w-75 mx-auto">Why You Should Choose
                        CME Standard as your Companion?</div>
                   <p>Continuing Medical Education (CME) is essential for physicians throughout their careers for several important reasons:</p>


                </div>
            </div>


            <div class="row pt-4">
                <div class="col-md-5">
                    <div class="why-cme__img">
                        <img src='{{ asset('assets/images/Group 1707479605 (1).png') }}' alt='image' class='imgFluid' loading='lazy'>
                    </div>
                </div>
                <div class="col-md-7 pt-2">
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Keeping Pace with Medical Advancements: </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            Medicine is a rapidly evolving field with new research, technologies, and
                                            treatment options emerging constantly. CME ensures that physicians stay current
                                            with these advancements, allowing them to integrate new knowledge into their
                                            clinical practice for the benefit of their patients.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Maintaining Competence: </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            CME helps physicians maintain and enhance their professional competence. It
                                            allows them to review and reinforce existing knowledge, learn new skills, and
                                            adapt to changes in medical guidelines and best practices. This continuous
                                            learning process is crucial for delivering high-quality care.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Improving Patient Outcomes: </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            Updated medical knowledge and skills acquired through CME contribute directly to
                                            improved patient outcomes. Physicians who participate in CME are better equipped
                                            to diagnose conditions accurately, prescribe appropriate treatments, and manage
                                            patient care effectively.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Enhancing Professional Development: </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            CME supports physicians in achieving personal and professional growth. It
                                            fosters critical thinking, problem-solving abilities, and leadership skills,
                                            which are all essential for advancing in the medical profession and providing
                                            leadership within healthcare teams.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Meeting Regulatory and Institutional Requirements:
                                        </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            In many countries, licensure and maintenance of hospital privileges require
                                            physicians to complete a certain number of CME credits annually or over a
                                            defined period. Meeting these requirements ensures that physicians are
                                            accountable for maintaining their competence and adhering to professional
                                            standards.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="why-cme__boxs">
                                <div class="boxs-content accordian2">
                                    <div class="box-header accordian2-header">
                                        <div class="boxs-icon__main" id="icon">
                                            <div class="boxs-icon_rec">
                                                <div class="boxs-icon">
                                                    <img src="{{ asset('assets/images/check.png') }}" alt="image"
                                                        class="imgFluid" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-title heading">Promoting Lifelong Learning: </div>
                                    </div>
                                    <div class="box-details accordian2-content">
                                        <p class="paragraph">
                                            Medicine is a lifelong learning journey. CME encourages a culture of continuous
                                            improvement and lifelong learning among healthcare professionals, fostering a
                                            commitment to staying informed and adapting to the evolving healthcare
                                            landscape.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="why-cme__content text-start mt-5">
                        <div class="section-content alt p-0">
                            <p class="p-0">
                                <strong>In summary, CME is not just a regulatory requirement but a fundamental aspect of professional
                                    development and quality assurance in medicine. It supports physicians in delivering safe,
                                    effective, and up-to-date care, ultimately benefiting both individual patients and the
                                    healthcare system as a whole.</strong>
                            </p>


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
