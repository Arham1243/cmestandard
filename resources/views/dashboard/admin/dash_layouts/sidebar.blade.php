<div class="side-bar">
      <div class="side-bar-logo">
          
        <a  href="{{route('admin.dashboard')}}"><img src="{{asset($logo->img_path)}}" alt="logo"></a>

      </div>
      <div class="side-bar-links">
        <ul class="navigation-list">
           
          <li class="{{isset($user_menu)?'active':''}}"><a href="{{route('admin.dashboard')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-1.svg')}}" alt="side-links-img"></figure> Dashboard
            </a></li>
            <li class="{{isset($user_mgmmenu)?'active':''}}"><a href="{{route('admin.users_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-1.svg')}}" alt="side-links-img"></figure> User Management
            </a></li>
           
            <!-- <li class="{{-- isset($faq_menu)?'active':'' --}}"><a href="{{-- route('admin.faq_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Faq Management
            </a></li> -->
             <li class="{{ isset($testimonial_menu)?'active':'' }}"><a href="{{ route('admin.testimonial_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-8.svg') }}" alt="side-links-img"></figure> Testimonial/Reviews Management
            </a></li> 
            <!--<li class="{{-- isset($blog_menu)?'active':'' --}}"><a href="{{-- route('admin.blog_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Blogs Management-->
            <!--</a></li>-->
            <!-- <li class="{{isset($news_menu)?'active':'' }}"><a href="{{ route('admin.news_events_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-8.svg') }}" alt="side-links-img"></figure> News/Events Management
            </a></li> -->
            <li class="{{ isset($category_menu)?'active':'' }}"><a href="{{ route('admin.category_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Category Management
            </a></li>
            <li class="{{ isset($category_menu)?'active':'' }}"><a href="{{ route('admin.subcategory_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Subcategory Management
            </a></li>
            <!-- <li class="{{ isset($vendor_menu)?'active':'' }}"><a href="{{ route('admin.vendor_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Vendor Management
            </a></li> -->
            <!-- <li class="{{-- isset($reviews_menu)?'active':'' --}}"><a href="{{-- route('admin.reviews_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Reviews Management
            </a></li>
            
            <li class="{{-- isset($team_menu)?'active':'' --}}"><a href="{{-- route('admin.team_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Team Management
            </a></li>
            <li class="{{-- isset($matches_menu)?'active':'' --}}"><a href="{{-- route('admin.matches_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Matches Management
            </a></li>
             <li class="{{-- isset($album_menu)?'active':'' --}}"><a href="{{-- route('admin.album_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Album Management
            </a></li>
            <li class="{{-- isset($photos_menu)?'active':'' --}}"><a href="{{-- route('admin.photos_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Photos Management
            </a></li>

 -->
            <!-- <li class="{{-- isset($variation_menu)?'active':'' --}}"><a href="{{-- route('admin.variation_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Variation Management
            </a></li> -->
            <li class="{{ isset($variation_menu)?'active':'' }}"><a href="{{ route('admin.variation_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Variation Management
            </a></li>
            <li class="{{ isset($variationimage_menu)?'active':'' }}"><a href="{{ route('admin.variationimage_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Variation image Management
            </a></li>
            <li class="{{isset($color_menu)?'active':''}}"><a href="{{ route('admin.color_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Color Management
            </a></li>
            <li class="{{isset($size_menu)?'active':''}}"><a href="{{ route('admin.size_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> Size Management
            </a></li> 
              <li class="{{isset($products_menu)?'active':''}}"><a href="{{route('admin.products_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-1.svg')}}" alt="side-links-img"></figure> Products Management
            </a></li>
            <li class="{{isset($order_menu)?'active':''}}"><a href="{{route('admin.orders')}}">
            <figure class="mb-0"><img src="{{asset('admin/images/side-link-9.svg') }}" alt="side-links-img"></figure> Orders Management
            </a></li>

            <li class="{{isset($coupon_menu)?'active':''}}"><a href="{{ route('admin.coupon_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-1.svg') }}" alt="side-links-img"></figure> coupon Code Management
            </a></li>
            <!-- <li class="{{-- isset($bookings_menu)?'active':'' --}}"><a href="{{-- route('admin.bookings') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-9.svg') --}}" alt="side-links-img"></figure> Bookings Management
            </a></li> -->
            <!-- <li class="{{-- isset($merchandise_menu)?'active':'' --}}"><a href="{{-- route('admin.merchandise_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Merchandise Management
            </a></li>

           

          
            <li class="{{-- isset($partner_menu)?'active':'' --}}"><a href="{{-- route('admin.partner_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-9.svg') --}}" alt="side-links-img"></figure> Sponsor Management
            </a></li> -->
            
             
          <!-- <li><a href="{{-- route('admin.inquiries_listing') --}}">
              <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-7.svg') --}}" alt="side-links-img"></figure> Inquiries Management
            </a></li> -->

          <li class="li-dropdown"><a href="javascript:void(0)">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-9.svg')}}" alt="side-links-img"></figure> Site Settings
            </a>
            <div class="dropdown-content">
            <ul>
                <li><a href="{{route('admin.showLogo')}}">Logo Management</a></li>
                <li><a href="{{route('admin.socialInfo')}}">Contact / Social Info</a></li>
                <li><a href="{{route('admin.homeSlider')}}">Banners Management</a></li>
                <li><a href="{{route('admin.welcomeSlider')}}">Welcome Baner</a></li>
               
            </ul>
            </div>
        </li>
        
        </ul>
      </div>
    </div>