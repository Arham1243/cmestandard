@extends('layouts.main')
@section('content')
    
    <div class="section-wrapper">
        <div class="banner-wrapper">
            <div class="banner">
                <div class="banner-bg">
                    <img src="{{ asset('assets/images/banner1.png') }}" alt='image' class='imgFluid' loading='lazy'>
                </div>

                <div class="doctor-img__container">
                    <img src="{{ asset('assets/images/banner-imgs.png') }}" alt='image' class='imgFluid' loading='lazy'>
                </div>
                <div class="container">

                    <div class="banner-content">
                        <div class="title">{{ $welcome_slider->subHeading }}</div>
                        @php
                            $heading = $welcome_slider->headings;
                            $headingArray = explode(' ', $heading);
                            $lastWord = array_pop($headingArray);
                            $remainingHeading = implode(' ', $headingArray);
                        @endphp

                        <h1 class="banner-heading">
                            {!! $remainingHeading !!} <span>{{ $lastWord }}</span>
                        </h1>

                        <p>{{ $welcome_slider->long_desc }}</p>
                        <div class="banner-btn"><a href="{{ route('sign_up') }}" class="themeBtn">get started</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- about-us -->
        <div class="about-us">
            <div class="group3-img">
                <img src='{{ asset('assets/images/Group 1707479537.png') }}' alt='image' class='imgFluid' loading='lazy'>
            </div>
            <div class="container">
                <div class="about-us__content">
                    <div class="section-content--light">
                        <?php App\Helpers\Helper::inlineEditable('div', ['class' => 'heading'], 'About us', 'content1'); ?>

                        <?php App\Helpers\Helper::inlineEditable('h2', ['class' => 'subHeading'], 'What is CME', 'content2'); ?>

                        <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.", 'content3'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="why-cme ">
        <div class="container">
            <div class="why-cme__content">
                <div class="section-content">
                    <div class="heading">Why CME</div>
                    <div class="subHeading w-75 mx-auto">Why You Should Choose
                        CME Standard as your Companion?</div>
                    <p>Continuing Medical Education (CME) is essential for physicians throughout their careers for several
                        important reasons:</p>


                </div>
            </div>


            <div class="row pt-4">
                <div class="col-md-5">
                    <div class="why-cme__img">
                        <img src='{{ asset('assets/images/Group 1707479605 (1).png') }}' alt='image' class='imgFluid'
                            loading='lazy'>
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
                                <strong>In summary, CME is not just a regulatory requirement but a fundamental aspect of
                                    professional
                                    development and quality assurance in medicine. It supports physicians in delivering
                                    safe,
                                    effective, and up-to-date care, ultimately benefiting both individual patients and the
                                    healthcare system as a whole.</strong>
                            </p>


                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- why-accredited -->
    <div class="why-accre">
        <div class="group2-img" style="display: none;">
            <img src="{{ asset('assets/images/group3.png') }}" alt='image' class='imgFluid' loading='lazy'>
        </div>
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-md-5 offset-md-1">
                    <div class="section-content text-light" style="padding: 0;">
                        <h2 class="subHeading">Why Accredited CME</h2>
                        <p>Accredited Continuing Medical Education (CME) is highly valued and preferred for several
                            important reasons:</p>
                    </div>
                    <ul class="why-accre__pra">
                        <li class="why-accre__list">
                            <strong>Relevance and Quality Assurance:</strong>
                            Accredited CME programs undergo rigorous review and approval processes to ensure they meet high
                            standards of educational quality, relevance to medical practice, and alignment with
                            evidence-based medicine. This ensures that the content is up-to-date, accurate, and applicable
                            to the needs of physicians across various specialties and practice settings.
                        </li>
                        <li class="why-accre__list">
                            <strong>Meeting Regulatory and Professional Requirements:</strong>
                            Many regulatory bodies, professional societies, hospitals, and healthcare organizations require
                            physicians to participate in accredited CME to maintain licensure, certification, and other
                            professional privileges. Accredited CME programs provide assurance that the education received
                            meets these requirements and contributes to ongoing professional development.
                        </li>
                    </ul>
                    <a href="{{ route('why-accredited') }}" class="read-more__btn">Read-More</a>
                </div>
                <div class="col-md-6 pt-5">
                    <div class="why-accre__img">
                        <img src="{{ asset('assets/images/why-ac.png') }}" alt='image' class='imgFluid'
                            loading='lazy'>
                        <img src="{{ asset('assets/images/2333.png') }}" alt='image' class='imgFluid yellow-bg'
                            loading='lazy'>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- obj-cme -->
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
                                <img src="{{ asset('assets/images/report-ico 1.png') }}" alt="image" class="imgFluid"
                                    loading="lazy" />
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
                            <div class="obj-icon"> <img src="{{ asset('assets/images/shield-ico 1.png') }}"
                                    alt="image" class="imgFluid" loading="lazy" /></div>
                        </div>
                        <div class="obj-box__content">
                            <div class="title">Learn and refine skills through simulation-based hands-on training.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="obj-boxs">
                        <div class="obj-icon__box">
                            <div class="obj-icon"> <img src="{{ asset('assets/images/report-ico 1.png') }}"
                                    alt="image" class="imgFluid" loading="lazy" /></div>
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
                            <div class="obj-icon"> <img src="{{ asset('assets/images/shield-ico 1.png') }}"
                                    alt="image" class="imgFluid" loading="lazy" />
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

    <!-- top-doc -->
    <div class="top-doc">
        <div class="container-fluid p-0">
            <div class="section-content text-center">
                <?php App\Helpers\Helper::inlineEditable('h2', ['class' => 'subHeading'], 'Meet our Top Doctors', 'content19'); ?>

            </div>
            <div class="row pt-5 g-0 drs-slider">
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr1.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr2.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr3.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr4.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr3.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr6.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr7.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr8.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr9.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr10.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 g-0 drs-slider--reverse" dir="rtl">
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr1.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr2.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr3.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr4.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr3.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr6.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr7.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr8.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr9.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="top-doc__content">
                        <div class="top-doctors__img">
                            <img src="{{ asset('assets/images/dr10.png') }}" alt='image' class='imgFluid'
                                loading='lazy'>
                        </div>
                        <div class="top-doc__details top-doc__right">
                            <div class="dr-name">
                                Dr name
                            </div>
                            <div class="title"> Psychologist</div>

                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

    <!-- faqs -->
    {{-- <div class="faqs">
        <div class="container">
            <div class="section-content text-center">
                <?php App\Helpers\Helper::inlineEditable('h2', ['class' => 'subHeading'], 'Learn more about our platform <br> by user questions', 'content20'); ?>

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

            <a href="{{ route('faqs') }}" class="themeBtn mt-3 mx-auto d-block w-fit">View More</a>
        </div>
    </div> --}}

    <!-- reviews -->
    <div class="reviews">
        <div class="group-img">
            <img src='{{ asset('assets/images/Group 1707479537.png') }}' alt='image' class='imgFluid'
                loading='lazy'>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-content--light">
                        <?php App\Helpers\Helper::inlineEditable('h2', ['class' => 'subHeading'], 'Our Platform’s Impact in Their Own Words', 'content21'); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reviews-pra">
                        <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut fugit voluptate provident ullam expedita! Eligendi, excepturi. Corrupti exercitationem aut ipsum.', 'content22'); ?>

                    </div>
                </div>
            </div>
            <div class="row review-box__slider">
                @foreach ($testimonials as $i => $testimonial)
                    <div class="col-md-4">
                        <div class="review-box">
                            <div class="review-content">
                                <p class="review">{{ $testimonial->description }}</p>
                                <div class="review-content__details">
                                    <div class="person-img">
                                        <img src="{{ asset($testimonial->img_path) }}" alt='image' class='imgFluid'
                                            loading='lazy'>
                                    </div>
                                    <div class="review-person">
                                        <div class="name">
                                            {{ $testimonial->name }}
                                        </div>
                                        <div class="title">
                                            {{ $testimonial->designation }}
                                        </div>

                                    </div>
                                    <div class="quotation">
                                        <img src="{{ asset('assets/images/quotation.png') }}" alt='image'
                                            class='imgFluid' loading='lazy'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>

    <!-- contact-form -->
    <div class="contact-form">
        <div class="container">
            <div class="contact-form__content">
                <div class="msg-form">
                    <div class="msg-form__contant">
                        <?php App\Helpers\Helper::inlineEditable('div', ['class' => 'message-heading contact-heading'], 'Send a Message', 'content25'); ?>

                        <form action="{{ route('contact-us-submit') }}" method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <input type="text" class="msg-form__item" required="" placeholder="First Name"
                                        name="fname" value="{{ old('fname') }}">
                                    @error('fname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="msg-form__item" required="" placeholder="Last Name"
                                        name="lname" value="{{ old('lname') }}">
                                    @error('lname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <input type="tel" class="msg-form__item" required="" name="phone"
                                        minlength="7" maxlength="14" placeholder="Your Phone" name="phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="msg-form__item" required="" name="email"
                                        placeholder="Your Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <textarea name="message" class="msg-form__item" required="" placeholder="Enter a brief description">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <input type="submit" class="themeBtn" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="contact-info">
                    <div class="contact-content">
                        <?php App\Helpers\Helper::inlineEditable('div', ['class' => 'contact-heading'], 'Contact Info', 'content23'); ?>

                        <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, praesentium placeat odit aliquam magni perferendis.', 'content24'); ?>


                        <div class="contact-icon__main">
                            <div class="contact-icon">
                                <div class="icon">
                                    <i class='bx bxs-phone'></i>
                                </div>
                                <a href="tel:{{ $config['COMPANYPHONE'] }}" class="contact-title">phone:
                                    {{ $config['COMPANYPHONE'] }}</a>
                            </div>
                            <div class="contact-icon">
                                <div class="icon">
                                    <i class='bx bxs-envelope'></i>
                                </div>
                                <a href="mailto:{{ $config['COMPANYEMAIL'] }}"
                                    class="contact-title">{{ $config['COMPANYEMAIL'] }}</a>
                            </div>
                        </div>
                        <ul class="footer-icons contact-info__icons">
                            <li><a href="{{ $config['FACEBOOK'] }}" target="_blank"><i
                                        class="bx bxl-facebook-circle"></i></a></li>
                            <li><a href="{{ $config['TWITTER'] }}" target="_blank"><i class="bx bxl-twitter"></i></a>
                            </li>
                            <li><a href="{{ $config['LINKEDIN'] }}" target="_blank"><i
                                        class="bx bxl-linkedin-square"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
        <!-- <div class="group-img">
                                            <img src="{{ asset('assets/images/Group 1707479537.png') }}" alt="image" class="imgFluid" loading="lazy">
                                        </div> -->
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
