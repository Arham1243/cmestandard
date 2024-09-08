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
            <h1 class="title">CME for Career Advancement</h1>

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
                        <h2 class="subHeading">CME for Career Advancement</h2>
                        <p>
                            Continuing Medical Education (CME) not only supports physicians in maintaining clinical competence but also plays a crucial role in their career advancement and professional growth. Here’s how CME contributes to career advancement:
                        </p>
                    </div>
                    <ul class="why-accre__pra">
                        <ul class="why-accre__list">
                            <li class="why-accre__list">
                                <strong>Demonstration of Commitment to Excellence:</strong>
                                Engaging in CME demonstrates a physician's commitment to staying current with medical advancements and best practices. Employers and colleagues recognize this proactive approach as a hallmark of professionalism and dedication to providing high-quality patient care. It showcases a willingness to continuously improve and adapt to changes in the healthcare landscape, which is highly valued in leadership and managerial roles.
                            </li>
                            <li class="why-accre__list">
                                <strong>Enhanced Leadership Skills:</strong>
                                CME often includes opportunities for leadership development and management training. Physicians who participate in CME gain skills in team management, communication, decision-making, and conflict resolution. These skills are essential for effectively leading medical teams, overseeing healthcare operations, and driving organizational success.
                            </li>
                           
                           
                            
                        </ul>
                        
                    </ul>
                </div>
                <div class="col-md-6 pt-5">
                    <div class="why-accre__img">
                        <img src="{{ asset('assets/images/why-ac.png') }}" alt='image' class='imgFluid' loading='lazy'>
                        <img src="{{ asset('assets/images/2333.png') }}" alt='image' class='imgFluid yellow-bg'
                            loading='lazy'>
                    </div>

                </div>
                <div class="col-md-10 mt-5 ">
                    <ul class="why-accre__pra">
                        <ul class="why-accre__list">
                            <li class="why-accre__list">
                                <strong>Ability to Address Challenges Effectively:</strong>
                                CME equips physicians with the knowledge and skills needed to address complex challenges encountered in healthcare settings. Whether it's navigating regulatory changes, implementing new technologies, improving patient outcomes, or managing resource constraints, CME provides the tools and insights necessary to make informed decisions and find innovative solutions.
                            </li>
                            <li class="why-accre__list">
                                <strong>Expanded Career Opportunities:</strong>
                                Continuing education broadens a physician's expertise and can open doors to new career opportunities. Specialized CME courses or certifications in areas such as medical management, healthcare administration, or specific medical specialties enhance credentials and make physicians more competitive candidates for leadership positions, academic roles, and consulting opportunities.
                            </li>
                            <li class="why-accre__list">
                                <strong>Networking and Professional Connections:</strong>
                                CME activities often facilitate networking with peers, experts, and leaders in the field. Building professional relationships through CME can lead to mentorship opportunities, collaborations on research projects, and referrals for career advancement. These connections are invaluable for staying informed about job openings, career trends, and professional development opportunities.
                            </li>
                            <li class="why-accre__list">
                                <strong>Meeting Requirements for Promotions and Certifications:</strong>
                                In many healthcare organizations, advancement to higher positions or certifications requires physicians to demonstrate ongoing professional development through CME. By fulfilling these requirements, physicians enhance their eligibility for promotions, leadership roles, and specialty certifications that recognize advanced skills and expertise.
                            </li>
                        
                        </ul>
                        
                    </ul>
                    <div class="section-content" style="padding: 0;">
                        <p><strong>In summary, CME is not only a means of maintaining clinical competency but also a strategic investment in career advancement. It equips physicians with the knowledge, skills, and credentials needed to excel in leadership positions, manage medical teams effectively, tackle workplace challenges, and seize new career opportunities in the dynamic field of healthcare. By actively pursuing continuing education, physicians position themselves as proactive leaders committed to continuous improvement and excellence in patient care.</strong></p>
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
