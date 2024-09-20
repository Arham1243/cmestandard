 <!-- DASHBOARD START -->

 <section class="dashboard-sidebar">
     <div class="dashboard-sidebar-logo">
         <a href="{{ route('home') }}" title="Visit Site"><img src="{{ asset($logo->img_path) }}" alt="dashboard-logo"></a>
     </div>
     <div class="dashboard-sidebar-links">
         <ul>
             <li class=""><a target="_blank" href="{{ route('doctor_profile', Auth::user()->slug) }}">
                     <figure class="mb-0"><i class='bx bxs-user'></i></figure>
                     <span>{{ Auth::user()->title_full_name }}</span>
                 </a></li>
             <li><a href="{{ route('dashboard.editProfile') }}"
                     class="{{ Request::url() == route('dashboard.editProfile') ? 'active' : '' }}">
                     <figure class="mb-0"><i class='bx bxs-edit-alt'></i></figure>
                     <span>My Profile - Edit</span>
                 </a></li>


             <li><a href="{{ route('dashboard.activity_listing') }}"
                     class="{{ Request::url() == route('dashboard.activity_listing') ? 'active' : '' }}">
                     <figure class="mb-0"><i class='bx bxs-graduation'></i></figure>
                     <span>My CME Trainings</span>
                 </a></li>

             <li><a href="{{ route('dashboard.analytics') }}"
                     class="{{ Request::url() == route('dashboard.analytics') ? 'active' : '' }}">
                     <figure class="mb-0"><i class='bx bx-bar-chart-alt'></i></figure>
                     <span>Analytics</span>
                 </a></li>




             <li><a href="{{ route('logout') }}">
                     <figure class="mb-0"><i class='bx bxs-log-out'></i></figure>
                     <span>Logout</span>
                 </a></li>
         </ul>
     </div>
 </section>
