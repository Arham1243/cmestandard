<div class="profile-wrapper" id="doctor-details">
    <div class="doc-profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="doc-profile__img">
                        <img src='{{ asset($user->profile_img ?? 'assets/images/user.png') }}'
                            alt='{{ $user->title_full_name }}' class='imgFluid' loading='lazy'>
                    </div>
                    <div class="doc-profile__content">
                        <div class="doc-details">
                            <h2 class="doc-profile__name">
                                {{ $user->title_full_name }}
                                @if ($user->badge)
                                    <img src="{{ asset('assets/images/' . $user->badge->name . '.png') }}"
                                        alt='{{ $user->badge->name }}' class='imgFluid profile-content__badge'
                                        loading='lazy'>
                                @endif
                            </h2>
                            <h3 class="doc-profile__desti">{{ $user->specialityArea->name ?? '' }}</h3>

                        </div>
                    </div>
                    @if ($user->bio)
                        <div class="doc-profile__bio">
                            <h4 class="doc-profile__heading"> biography</h4>
                            <p class="doc-profile__pra">{{ $user->bio }}</p>
                        </div>
                    @endif

                </div>
                <div class="col-md-6">
                    <div class="doc-profile__infoSec">
                        <div class="specialty-sec">
                            <div class="doc-info__section">
                                <div class="info-item">
                                    <div class="doc-profile__heading">User Membership ID: </div>
                                    <div class="doc-profile__pra">{{ $user->custom_id }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Badge: </div>
                                    <div class="doc-profile__pra">
                                        {{ $user->badge ? $user->badge->name : '' }}
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Specialty Area:</div>
                                    <div class="doc-profile__pra">{{ $user->specialityArea->name ?? '' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Special Interests:</div>
                                    <div class="doc-profile__pra">{{ $user->specialityInterest->name ?? '' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Qualifications:</div>
                                    <div class="doc-profile__pra">{{ $user->qualification }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Country:</div>
                                    <div class="doc-profile__pra">{{ $user->country }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Country ID Number:</div>
                                    <div class="doc-profile__pra">{{ $user->country_id_num }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Medical practice license Number:</div>
                                    <div class="doc-profile__pra">{{ $user->medical_license_number }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Institution/Clinic Name:</div>
                                    <div class="doc-profile__pra">{{ $user->institution_name }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Institution/Clinic City:</div>
                                    <div class="doc-profile__pra">{{ $user->institution_city }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Phone:</div>
                                    <div class="doc-profile__pra">{{ $user->phone }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Birthday:</div>
                                    <div class="doc-profile__pra">{{ date('M d, Y', strtotime($user->birthday)) }}
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="doc-profile__heading">Member since:</div>
                                    <div class="doc-profile__pra">{{ date('M d, Y', strtotime($user->created_at)) }}
                                    </div>
                                </div>


                            </div>

                        </div>
                        @if ($user->email_show_on_profile == '1' || $user->phone_show_on_profile == '1')
                            <div class="doc-contact__content">
                                <div class="doc-profile__heading">CONTACT</div>
                                @if ($user->email_show_on_profile == '1')
                                    <div class="doc-contact__item">
                                        <div class="doc-contact__info">
                                            {{ $user->email }} <br>
                                        </div>
                                    </div>
                                @endif
                                @if ($user->phone_show_on_profile == '1')
                                    <div class="doc-contact__item">
                                        <div class="doc-contact__info">
                                            {{ $user->phone }} <br>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="doc-profile__listing">
        <div class="container">
            @if (!$trainings->isEmpty())
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>CME ID</th>
                                <th class="text-start">Title</th>
                                <th>Category</th>
                                <th>Provider / Accreditor</th>
                                <th>Format</th>
                                <th>Type</th>
                                <th>Status </th>
                                <th>Month/Year</th>
                                <th>Credit Hours</th>
                                <th>Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $training)
                                <tr>
                                    <td>{{ $training->custom_id }}</td>
                                    <td class="text-start">{{ $training->title }}</td>
                                    <td>{{ $training->category->name ?? '' }}</td>
                                    <td>{{ $training->grand_provide }}</td>
                                    <td>{{ $training->format }}</td>
                                    <td>{{ $training->type }}</td>
                                    <td>{{ $training->status }}</td>
                                    <td>{{ date('M d, Y', strtotime($training->date)) }} </td>
                                    <td>{{ $training->credit_hours }}</td>
                                    <td>
                                        <a href="{{ asset($training->certificate) }}" target="_blank"
                                            class="file-icon"><i class='bx bxs-file-blank'></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
