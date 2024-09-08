 <!-- DASHBOARD START -->

 <section class="dashboard-sidebar">
     <div class="dashboard-sidebar-logo">
         <a href="{{ route('welcome') }}" title="Visit Site"><img src="{{ asset($logo->img_path) }}"
                 alt="dashboard-logo"></a>
     </div>
     <div class="dashboard-sidebar-links">
         <ul>
             <li class=""><a href="{{ route('welcome') }}">
                     <figure class="mb-0"><img src="{{ asset('userdash/images/dashboard-link-1.png') }}"
                             alt="dashboard-link-icon"></figure>
                     <span>Home</span>
                 </a></li>
             <li><a href="{{ route('dashboard.myProfile') }}">
                     <figure class="mb-0"><img src="{{ asset('userdash/images/dashboard-link-4.png') }}"
                             alt="dashboard-link-icon"></figure>
                     <span>My Profile</span>
                 </a></li>
             <li><a href="{{ route('dashboard.passwordChange') }}">
                     <figure class="mb-0"><img src="{{ asset('userdash/images/dashboard-link-4.png') }}"
                             alt="dashboard-link-icon"></figure>
                     <span>Change Password</span>
                 </a></li>

             <li><a href="{{ route('dashboard.activity_listing') }}">
                     <figure class="mb-0"><img src="{{ asset('userdash/images/dashboard-link-2.png') }}"
                             alt="dashboard-link-icon"></figure>
                     <span>my Trainings</span>
                 </a></li>




             <li><a href="{{ route('logout') }}">
                     <figure class="mb-0"><img src="{{ asset('userdash/images/dashboard-link-5.png') }}"
                             alt="dashboard-link-icon"></figure>
                     <span>Logout</span>
                 </a></li>
         </ul>
     </div>
 </section>
