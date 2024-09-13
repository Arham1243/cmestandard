@extends('layouts.main')
@section('content')
    <div class="topbar" id="topbar">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between">
                <div class="topbar-profile">
                    <div class="topbar-profile__img">
                        <img src='{{ asset($user->profile_img ?? 'assets/images/placeholder.png') }}'
                            alt='{{ $user->full_name }}' class='imgFluid' loading='lazy'>
                    </div>
                    <div class="topbar-profile__details">

                        <div class="name">{{ $user->full_name }}
                            @if ($user->badge)
                                <img src="{{ asset('assets/images/' . $user->badge->name . '.png') }}"
                                    alt='{{ $user->badge->name }}' class='imgFluid profile-content__badge' loading='lazy'>
                            @endif
                        </div>
                        <div class="option">{{ $user->specialityArea->name ?? '' }}</div>


                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if (Auth::check())
                        <a href="{{ route('dashboard.editProfile') }}" target="_blank" class="themeBtn themeBtn--sm"><i class='bx bxs-edit-alt' ></i>Edit
                            Profile</a>
                    @endif
                    <button id="download-pdf" data-doctor-name="{{ $user->full_name }}" class="themeBtn themeBtn--sm"
                        style="width:12rem;">
                        <div class="spinner-border d-none user-select-none" role="status"> </div>
                        <span class="btn-text user-select-none"><i class='bx bxs-download'></i>Download Profile</span>

                    </button>
                </div>
            </div>


        </div>
    </div>

    @include('layouts.doctor-profile')
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const topbar = document.getElementById('topbar');
            if (window.scrollY > 40) {
                topbar.classList.add('scroll');
            } else {
                topbar.classList.remove('scroll');
            }
        });


        const downloadPdfBtn = document.getElementById('download-pdf');
        downloadPdfBtn.addEventListener('click', function(e) {

            const spinner = downloadPdfBtn.querySelector('.spinner-border');
            const btnText = downloadPdfBtn.querySelector('.btn-text');
            // Show spinner and hide text
            spinner.classList.remove('d-none');
            btnText.classList.add('d-none');

            html2canvas(document.getElementById('doctor-details')).then(canvas => {
                canvas.toBlob(function(blob) {
                    const url = URL.createObjectURL(blob);
                    const doctorName = downloadPdfBtn.dataset.doctorName;
                    const formData = new FormData();
                    const BaseURL = document.getElementById("web_base_url").value;
                    formData.append('screenshot', blob, 'screenshot.png');
                    formData.append('doctor_name', doctorName);

                    fetch(`${BaseURL}/doctor-profile/download-pdf`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        }
                    }).then(response => {
                        if (response.ok) {
                            return response.blob();
                        } else {
                            throw new Error('Failed to generate PDF');
                        }
                    }).then(blob => {
                        const link = document.createElement('a');
                        link.href = URL.createObjectURL(blob);
                        link.download = `${doctorName}.pdf`;
                        document.body.appendChild(link);
                        link.click();
                        link.remove();

                        // Hide spinner and show text
                        spinner.classList.add('d-none');
                        btnText.classList.remove('d-none');
                    }).catch(error => {
                        console.error('Error:', error);
                        // Hide spinner and show text in case of error
                        spinner.classList.add('d-none');
                        btnText.classList.remove('d-none');
                    });
                }, 'image/png');
            });
        });
    </script>
@endsection
