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
            <h1 class="title">WHY ACCREDITED CME</h1>

        </div>
    </div> --}}

    <!-- why-accredited -->
    <div class="why-accre why-accre--alt" style="background-color: transparent;">
        <div class="group2-img" style="display: none;">
            <img src="{{ asset('assets/images/group3.png') }}" alt='image' class='imgFluid' loading='lazy'>
        </div>
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-md-5 offset-md-1">
                    <div class="section-content" style="padding: 0;">
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

                </div>
                <div class="col-md-6 pt-5">
                    <div class="why-accre__img">
                        <img src="{{ asset('assets/images/why-ac.png') }}" alt='image' class='imgFluid' loading='lazy'>
                        <img src="{{ asset('assets/images/2333.png') }}" alt='image' class='imgFluid yellow-bg'
                            loading='lazy'>
                    </div>

                </div>
                <div class="col-md-10 mt-5 pt-5">
                    <ul class="why-accre__pra">
                        <ul class="why-accre__list">
                            <li class="why-accre__list">
                                <strong>Freedom from Commercial Bias:</strong>
                                Accredited CME adheres to strict guidelines that prevent commercial influence over the
                                educational content. This ensures that the information presented is unbiased, objective, and
                                focused solely on advancing medical knowledge and improving patient care outcomes.
                                Physicians can trust that accredited CME provides a neutral environment for learning and
                                teaching.
                            </li>
                            <li class="why-accre__list">
                                <strong>Supporting Best Practices and Evidence-Based Medicine:</strong>
                                Accredited CME programs are designed to promote best practices and evidence-based medicine.
                                They help physicians stay informed about the latest research findings, clinical guidelines,
                                and innovations in medical treatment and healthcare delivery. This knowledge enables
                                physicians to deliver safe, effective, and compassionate care based on the most current
                                evidence and standards of practice.
                            </li>
                            <li class="why-accre__list">
                                <strong>Enhancing Professional Development:</strong>
                                Participation in accredited CME supports physicians in their professional growth and
                                lifelong learning journey. It provides opportunities to acquire new skills, refresh existing
                                knowledge, and explore emerging trends in medicine and healthcare. This continuous learning
                                process is essential for maintaining competence, improving clinical outcomes, and advancing
                                in one's medical career.
                            </li>

                        </ul>

                    </ul>
                    <div class="section-content" style="padding: 0;">
                        <p><strong>In conclusion, accredited CME plays a vital role in ensuring that physicians have access
                                to high-quality, relevant, and unbiased educational opportunities that support their
                                professional responsibilities and commitment to delivering excellent patient care. It is an
                                essential component of maintaining competence, meeting professional requirements, and
                                upholding the highest standards of medical practice.</strong></p>
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
