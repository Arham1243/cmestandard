<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\FrontEndEditorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Mail;



// ---------------------------------------All View Pages---------------------------------------
Route::get('/about-us', [IndexController::class, 'about_us'])->name('about-us');
Route::get('/faqs', [IndexController::class, 'faqs'])->name('faqs');
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/objectives-of-cme', [IndexController::class, 'objectives_of_cme'])->name('objectives-of-cme');
Route::get('/why-accredited', [IndexController::class, 'why_accredited'])->name('why-accredited');
Route::get('/cme-for-improved-patient-care', [IndexController::class, 'patient_care'])->name('patient-care');
Route::get('/cme-for-career-advancement', [IndexController::class, 'career_advancement'])->name('career_advancement');
Route::get('/why-cme', [IndexController::class, 'why_cme'])->name('why-cme');
Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/index', [IndexController::class, 'home'])->name('index');
Route::get('/welcome', [IndexController::class, 'home'])->name('welcome');
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/sign-up', [IndexController::class, 'sign_up'])->name('sign_up');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-and-conditions', [IndexController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::get('/user-profile/{slug}', [IndexController::class, 'doctor_profile'])->name('doctor_profile');
// Route::get('/doctor-profile/{slug}', [IndexController::class, 'doctor_profile_new'])->name('doctor_profile_new');
// ---------------------------------------All View Pages---------------------------------------

// ---------------------------------------All View Actions---------------------------------------
Route::post('/doctor-profile/download-pdf', [IndexController::class, 'doctor_profile_download_pdf'])->name('doctor_profile.download_pdf');
Route::get('/change-training-status/{id}', [IndexController::class, 'change_training_status'])->name('change_training_status');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/contact-us-submit', [UserController::class, 'contact_us_submit'])->name('contact-us-submit');
Route::post('/newsletter_submit', [UserController::class, 'newsletter_submit'])->name('newsletter_submit');
Route::post('/login', [UserController::class, 'login_submit'])->name('login-submit');
Route::post('/sign-up', [UserController::class, 'signup_submit'])->name('sign-up-submit');
Route::post('/add-review', [IndexController::class, 'add_review'])->name('add-review');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
// ---------------------------------------All View Actions---------------------------------------


// ---------------------------------------ORDERS Submitting---------------------------------------
Route::get('/order-submit', [CartController::class, 'order_submit'])->name('order.submit');
Route::post('/pay-status', [CartController::class, 'paystatus'])->name('paystatus');
Route::get('stripe', [CartController::class, 'stripePost'])->name('stripe.post');
Route::post('/subscription-create', [CartController::class, 'subscription_create'])->name('subscription.create');
Route::get('/payment-success', [CartController::class, 'checkout_landing'])->name('checkout_landing');
Route::get('/payment', [CartController::class, 'paysecure'])->name('paysecure');
Route::post('/pay-status', [CartController::class, 'paystatus'])->name('paystatus');
// ---------------------------------------ORDERS Submitting---------------------------------------


// ---------------------------------------Forget Password---------------------------------------
Route::get('/forget-password', [UserController::class, 'forget_password'])->name('forget-password');
Route::get('/forgot-password-message', [UserController::class, 'forgot_password_message'])->name('forgot-password-message');
Route::post('/forget-password-post', [UserController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/forget-password-token/{token}', [UserController::class, 'forget_password_token'])->name('forget-password-token');
Route::post('/forget-password-reset', [UserController::class, 'forget_password_reset'])->name('forget-password-reset');
// ---------------------------------------Forget Password---------------------------------------



// ---------------------------------------Cart---------------------------------------
Route::post('update-cart', [CartController::class, 'updatecart'])->name('update-cart');
Route::get('remove-cart/{cart_id}', [CartController::class, 'removecart'])->name('remove-cart');
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::post('/place-order', [CartController::class, 'placeorder'])->name('placeorder');
// ---------------------------------------Cart---------------------------------------


// ---------------------------------------Admin---------------------------------------
Route::get('/admins', function () {
  return redirect('admin/login');
})->name('admin.admin');

Route::middleware(['guest'])->prefix('admin')->namespace('Admin')->group(function () {
  Route::get('/login', [AdminLoginController::class, 'get_login'])->name('admin.login');
  Route::post('/perform-login', [AdminLoginController::class, 'performLogin'])->name('admin.performLogin');
});

Route::middleware(['admin'])->prefix('admin')->namespace('admin')->group(function () {
  Route::get('/', function () {
    return redirect('/admin/dashboard');
  });
  Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('admin.dashboard');









  // ---------------------------------------Inquiries---------------------------------------
  Route::get('/inquiries-listing', [AdminDashController::class, 'inquiries_listing'])->name('admin.inquiries_listing');
  Route::get('/inquiries-listing/view/{id}', [AdminDashController::class, 'inquiries_listing_view'])->name('admin.inquiries_listing_view');
  Route::get('/inquiries-listing/delete/{id}', [AdminDashController::class, 'inquiries_listing_delete'])->name('admin.inquiries_listing_delete');
  // ---------------------------------------Inquiries---------------------------------------

  // ---------------------------------------Inquiries---------------------------------------
  Route::get('/quotes-listing', [AdminDashController::class, 'quotes_listing'])->name('admin.quotes_listing');
  Route::get('/quotes-listing/view/{id}', [AdminDashController::class, 'quotes_listing_view'])->name('admin.quotes_listing_view');
  Route::get('/quotes-listing/delete/{id}', [AdminDashController::class, 'quotes_listing_delete'])->name('admin.quotes_listing_delete');
  // ---------------------------------------Inquiries---------------------------------------


  // ---------------------------------------Users---------------------------------------
  Route::get('/users-listing', [AdminDashController::class, 'users_listing'])->name('admin.users_listing');
  Route::get('/add-users', [AdminDashController::class, 'add_users'])->name('admin.add_users');
  Route::post('/create-users', [AdminDashController::class, 'create_users'])->name('admin.create_users');
  Route::get('/edit-users/{id}', [AdminDashController::class, 'edit_user'])->name('admin.edit_user');
  Route::post('/edit-users', [AdminDashController::class, 'update_user'])->name('admin.update_user');
  Route::get('/suspend-user/{id}', [AdminDashController::class, 'suspend_user'])->name('admin.suspend_user');
  Route::get('/user-show-on-homepage/{id}', [AdminDashController::class, 'user_show_on_homepage'])->name('admin.user_show_on_homepage');
  Route::get('/delete-user/{id}', [AdminDashController::class, 'delete_user'])->name('admin.delete_user');
  // ---------------------------------------Users---------------------------------------

  // ---------------------------------------Logo Management---------------------------------------
  Route::get('/logo-management', [SiteSettingsController::class, 'showLogo'])->name('admin.showLogo');
  Route::post('/logo-management-save', [SiteSettingsController::class, 'saveLogo'])->name('admin.saveLogo');
  // ---------------------------------------Logo Management---------------------------------------

  // ---------------------------------------Social Management---------------------------------------
  Route::get('/contact-social-info', [SiteSettingsController::class, 'socialInfo'])->name('admin.socialInfo');
  Route::post('/contact-social-info', [SiteSettingsController::class, 'saveSocialInfo'])->name('admin.saveSocialInfo');
  // ---------------------------------------Social Management---------------------------------------

  // ---------------------------------------Testimonial Management---------------------------------------
  Route::get('/testimonial-listing', [AdminDashController::class, 'testimonial_listing'])->name('admin.testimonial_listing');
  Route::get('/add-testimonial', [AdminDashController::class, 'add_testimonial'])->name('admin.add_testimonial');
  Route::post('/create-testimonial', [AdminDashController::class, 'create_testimonial'])->name('admin.create_testimonial');
  Route::get('/edit-testimonial/{id}', [AdminDashController::class, 'edit_testimonial'])->name('admin.edit_testimonial');
  Route::post('/edit-testimonial', [AdminDashController::class, 'savetestimonial'])->name('admin.savetestimonial');
  Route::get('/suspend-testimonial/{id}', [AdminDashController::class, 'suspend_testimonial'])->name('admin.suspend_testimonial');
  Route::get('/delete-testimonial/{id}', [AdminDashController::class, 'delete_testimonial'])->name('admin.delete_testimonial');
  // ---------------------------------------Testimonial Management---------------------------------------



  // ---------------------------------------Users_sepcialiy_areas Management---------------------------------------
  Route::get('/speciality-areas-listing', [AdminDashController::class, 'speciality_areas_listing'])->name('admin.speciality_areas_listing');
  Route::get('/add-speciality-areas', [AdminDashController::class, 'add_speciality_areas'])->name('admin.add_speciality_areas');
  Route::post('/save-speciality-areas', [AdminDashController::class, 'save_speciality_areas'])->name('admin.save_speciality_areas');
  Route::get('/edit-speciality-areas/{id}', [AdminDashController::class, 'edit_speciality_areas'])->name('admin.edit_speciality_areas');
  Route::post('/update-speciality-areas', [AdminDashController::class, 'update_speciality_areas'])->name('admin.update_speciality_areas');
  Route::get('/suspend-speciality-areas/{id}', [AdminDashController::class, 'suspend_speciality_areas'])->name('admin.suspend_speciality_areas');
  Route::get('/delete-speciality-areas/{id}', [AdminDashController::class, 'delete_speciality_areas'])->name('admin.delete_speciality_areas');
  // ---------------------------------------Users_sepcialiy_areas Management---------------------------------------


  // ---------------------------------------Users_sepcialiy_interests Management---------------------------------------
  Route::get('/speciality-interests-listing', [AdminDashController::class, 'speciality_interests_listing'])->name('admin.speciality_interests_listing');
  Route::get('/add-speciality-interests', [AdminDashController::class, 'add_speciality_interests'])->name('admin.add_speciality_interests');
  Route::post('/save-speciality-interests', [AdminDashController::class, 'save_speciality_interests'])->name('admin.save_speciality_interests');
  Route::get('/edit-speciality-interests/{id}', [AdminDashController::class, 'edit_speciality_interests'])->name('admin.edit_speciality_interests');
  Route::post('/update-speciality-interests', [AdminDashController::class, 'update_speciality_interests'])->name('admin.update_speciality_interests');
  Route::get('/suspend-speciality-interests/{id}', [AdminDashController::class, 'suspend_speciality_interests'])->name('admin.suspend_speciality_interests');
  Route::get('/delete-speciality-interests/{id}', [AdminDashController::class, 'delete_speciality_interests'])->name('admin.delete_speciality_interests');
  // ---------------------------------------Users_sepcialiy_interests Management---------------------------------------


  // ---------------------------------------Planning Tips Management---------------------------------------
  Route::get('/planning-listing', [AdminDashController::class, 'planning_listing'])->name('admin.planning_listing');
  Route::get('/add-planning', [AdminDashController::class, 'add_planning'])->name('admin.add_planning');
  Route::post('/create-planning', [AdminDashController::class, 'create_planning'])->name('admin.create_planning');
  Route::get('/edit-planning/{id}', [AdminDashController::class, 'edit_planning'])->name('admin.edit_planning');
  Route::post('/edit-planning', [AdminDashController::class, 'save_planning'])->name('admin.saveplanning');
  Route::get('/suspend-planning/{id}', [AdminDashController::class, 'suspend_planning'])->name('admin.suspend_planning');
  Route::get('/delete-planning/{id}', [AdminDashController::class, 'delete_planning'])->name('admin.delete_planning');
  // ---------------------------------------Planning Tips Management---------------------------------------


  // ---------------------------------------Invoice Management---------------------------------------
  Route::get('/invoice-listing', [AdminDashController::class, 'invoice_listing'])->name('admin.invoice_listing');
  Route::get('/add-invoice', [AdminDashController::class, 'add_invoice'])->name('admin.add_invoice');
  Route::post('/save-invoice', [AdminDashController::class, 'save_invoice'])->name('admin.save_invoice');
  Route::get('/delete-invoice/{id}', [AdminDashController::class, 'delete_invoice'])->name('admin.delete_invoice');
  // ---------------------------------------Invoice Management---------------------------------------


  // ---------------------------------------Services Management---------------------------------------
  Route::get('/services-listing', [AdminDashController::class, 'services_listing'])->name('admin.services_listing');
  Route::get('/add-service', [AdminDashController::class, 'add_service'])->name('admin.add_service');
  Route::post('/create-service', [AdminDashController::class, 'create_service'])->name('admin.create_service');
  Route::get('/edit-service/{id}', [AdminDashController::class, 'edit_service'])->name('admin.edit_service');
  Route::post('/edit-service', [AdminDashController::class, 'saveservice'])->name('admin.saveservice');
  Route::get('/suspend-service/{id}', [AdminDashController::class, 'suspend_service'])->name('admin.suspend_service');
  Route::get('/delete-service/{id}', [AdminDashController::class, 'delete_service'])->name('admin.delete_service');
  // ---------------------------------------Services Management---------------------------------------

  // ---------------------------------------Reviews Management---------------------------------------
  Route::get('/reviews-listing', [AdminDashController::class, 'reviews_listing'])->name('admin.reviews_listing');
  Route::get('/view-review/{id}', [AdminDashController::class, 'edit_review'])->name('admin.edit_review');
  Route::get('/suspend-review/{id}', [AdminDashController::class, 'suspend_review'])->name('admin.suspend_review');
  Route::get('/delete-review/{id}', [AdminDashController::class, 'delete_review'])->name('admin.delete_review');
  // ---------------------------------------Reviews Management---------------------------------------


  // ---------------------------------------Newsletter Management---------------------------------------
  Route::get('/newsletter-listing', [AdminDashController::class, 'newsletter_listing'])->name('admin.newsletter_listing');
  Route::get('/newsletter-listing/view/{id}', [AdminDashController::class, 'newsletter_listing_view'])->name('admin.newsletter_listing_view');
  Route::get('/newsletter-listing/delete/{id}', [AdminDashController::class, 'newsletter_listing_delete'])->name('admin.newsletter_listing_delete');
  // ---------------------------------------Newsletter Management---------------------------------------

  // ---------------------------------------Blogs Management---------------------------------------
  Route::get('/blog-listing', [AdminDashController::class, 'blog_listing'])->name('admin.blog_listing');
  Route::get('/add-blog', [AdminDashController::class, 'add_blog'])->name('admin.add_blog');
  Route::post('/create-blog', [AdminDashController::class, 'create_blog'])->name('admin.create_blog');
  Route::get('/edit-blog/{id}', [AdminDashController::class, 'edit_blog'])->name('admin.edit_blog');
  Route::post('/edit-blog', [AdminDashController::class, 'saveblog'])->name('admin.saveblog');
  Route::get('/suspend-blog/{id}', [AdminDashController::class, 'suspend_blog'])->name('admin.suspend_blog');
  Route::get('/delete-blog/{id}', [AdminDashController::class, 'delete_blog'])->name('admin.delete_blog');
  // ---------------------------------------Blogs Management---------------------------------------

  // ---------------------------------------Course Management---------------------------------------
  Route::get('/course-listing', [AdminDashController::class, 'course_listing'])->name('admin.course_listing');
  Route::get('/add-course', [AdminDashController::class, 'add_course'])->name('admin.add_course');
  Route::post('/create-course', [AdminDashController::class, 'create_course'])->name('admin.create_course');
  Route::get('/edit-course/{id}', [AdminDashController::class, 'edit_course'])->name('admin.edit_course');
  Route::post('/edit-course', [AdminDashController::class, 'savecourse'])->name('admin.savecourse');
  Route::get('/suspend-course/{id}', [AdminDashController::class, 'suspend_course'])->name('admin.suspend_course');
  Route::get('/delete-course/{id}', [AdminDashController::class, 'delete_course'])->name('admin.delete_course');
  Route::get('/delete-course-video/{id}', [AdminDashController::class, 'delete_course_video'])->name('admin.delete_course_video');
  // ---------------------------------------Course Management---------------------------------------

  // ---------------------------------------News Management---------------------------------------
  Route::get('/news-listing', [AdminDashController::class, 'news_listing'])->name('admin.news_listing');
  Route::get('/add-news', [AdminDashController::class, 'add_news'])->name('admin.add_news');
  Route::post('/create-news', [AdminDashController::class, 'create_news'])->name('admin.create_news');
  Route::get('/edit-news/{id}', [AdminDashController::class, 'edit_news'])->name('admin.edit_news');
  Route::post('/edit-news', [AdminDashController::class, 'savenews'])->name('admin.savenews');
  Route::get('/suspend-news/{id}', [AdminDashController::class, 'suspend_news'])->name('admin.suspend_news');
  Route::get('/delete-news/{id}', [AdminDashController::class, 'delete_news'])->name('admin.delete_news');
  // ---------------------------------------News Management---------------------------------------

  // ---------------------------------------Products Management---------------------------------------
  Route::get('/products-listing', [ShopController::class, 'products_listing'])->name('admin.products_listing');
  Route::get('/add-product', [ShopController::class, 'add_products'])->name('admin.add_products');
  Route::get('/get-products', [ShopController::class, 'get_products'])->name('admin.get_products');
  Route::post('/create-product', [ShopController::class, 'create_products'])->name('admin.create_products');
  Route::get('/edit-product/{slug}', [ShopController::class, 'edit_products'])->name('admin.edit_products');
  Route::post('/edit-product', [ShopController::class, 'saveproducts'])->name('admin.saveproducts');
  Route::get('/suspend-product/{id}', [ShopController::class, 'suspend_products'])->name('admin.suspend_products');
  Route::get('/delete-product/{id}', [ShopController::class, 'delete_products'])->name('admin.delete_products');
  Route::get('/delete-other-img/{id}', [ShopController::class, 'delete_other_img'])->name('admin.delete_other_img');
  // ---------------------------------------Products Management---------------------------------------

  // ---------------------------------------Partner Management---------------------------------------
  Route::get('/partner-listing', [AdminDashController::class, 'partner_listing'])->name('admin.partner_listing');
  Route::get('/add-partner', [AdminDashController::class, 'add_partner'])->name('admin.add_partner');
  Route::post('/create-partner', [AdminDashController::class, 'create_partner'])->name('admin.create_partner');
  Route::get('/edit-partner/{id}', [AdminDashController::class, 'edit_partner'])->name('admin.edit_partner');
  Route::post('/edit-partner', [AdminDashController::class, 'savepartner'])->name('admin.savepartner');
  Route::get('/suspend-partner/{id}', [AdminDashController::class, 'suspend_partner'])->name('admin.suspend_partner');
  Route::get('/delete-partner/{id}', [AdminDashController::class, 'delete_partner'])->name('admin.delete_partner');
  // ---------------------------------------Partner Management---------------------------------------

  // ---------------------------------------category Management---------------------------------------
  Route::get('/category-listing', [AdminDashController::class, 'category_listing'])->name('admin.category_listing');
  Route::get('/add-category', [AdminDashController::class, 'add_category'])->name('admin.add_category');
  Route::post('/create-category', [AdminDashController::class, 'create_category'])->name('admin.create_category');
  Route::get('/edit-category/{id}', [AdminDashController::class, 'edit_category'])->name('admin.edit_category');
  Route::post('/edit-category', [AdminDashController::class, 'savecategory'])->name('admin.savecategory');
  Route::get('/suspend-category/{id}', [AdminDashController::class, 'suspend_category'])->name('admin.suspend_category');
  Route::get('/delete-category/{id}', [AdminDashController::class, 'delete_category'])->name('admin.delete_category');
  // ---------------------------------------category Management---------------------------------------

  // ---------------------------------------Blog_category Management---------------------------------------
  Route::get('/blog_category-listing', [AdminDashController::class, 'blog_category_listing'])->name('admin.blog_category_listing');
  Route::get('/add-blog_category', [AdminDashController::class, 'add_blog_category'])->name('admin.add_blog_category');
  Route::post('/save-blog_category', [AdminDashController::class, 'save_blog_category'])->name('admin.save_blog_category');
  Route::get('/edit-blog_category/{id}', [AdminDashController::class, 'edit_blog_category'])->name('admin.edit_blog_category');
  Route::post('/update-blog_category', [AdminDashController::class, 'update_blog_category'])->name('admin.update_blog_category');
  Route::get('/suspend-blog_category/{id}', [AdminDashController::class, 'suspend_blog_category'])->name('admin.suspend_blog_category');
  Route::get('/delete-blog_category/{id}', [AdminDashController::class, 'delete_blog_category'])->name('admin.delete_blog_category');
  // ---------------------------------------Blog_category Management---------------------------------------



  // ---------------------------------------Product_category Management---------------------------------------
  Route::get('/product_category-listing', [AdminDashController::class, 'product_category_listing'])->name('admin.product_category_listing');
  Route::get('/add-product_category', [AdminDashController::class, 'add_product_category'])->name('admin.add_product_category');
  Route::post('/save-product_category', [AdminDashController::class, 'save_product_category'])->name('admin.save_product_category');
  Route::get('/edit-product_category/{id}', [AdminDashController::class, 'edit_product_category'])->name('admin.edit_product_category');
  Route::post('/update-product_category', [AdminDashController::class, 'update_product_category'])->name('admin.update_product_category');
  Route::get('/suspend-product_category/{id}', [AdminDashController::class, 'suspend_product_category'])->name('admin.suspend_product_category');
  Route::get('/delete-product_category/{id}', [AdminDashController::class, 'delete_product_category'])->name('admin.delete_product_category');
  // ---------------------------------------Product_category Management---------------------------------------


  // ---------------------------------------Subcategory Management---------------------------------------
  Route::get('/subcategory-listing', [AdminDashController::class, 'subcategory_listing'])->name('admin.subcategory_listing');
  Route::get('/add-subcategory', [AdminDashController::class, 'add_subcategory'])->name('admin.add_subcategory');
  Route::post('/create-subcategory', [AdminDashController::class, 'create_subcategory'])->name('admin.create_subcategory');
  Route::get('/edit-subcategory/{id}', [AdminDashController::class, 'edit_subcategory'])->name('admin.edit_subcategory');
  Route::get('/edit-subcategory/{id}', [AdminDashController::class, 'edit_subcategory'])->name('admin.edit_subcategory');
  Route::post('/edit-subcategory', [AdminDashController::class, 'savesubcategory'])->name('admin.savesubcategory');
  Route::get('/suspend-subcategory/{id}', [AdminDashController::class, 'suspend_subcategory'])->name('admin.suspend_subcategory');
  Route::get('/delete-subcategory/{id}', [AdminDashController::class, 'delete_subcategory'])->name('admin.delete_subcategory');
  Route::post('/getsubcategory', [AdminDashController::class, 'getsubcategory'])->name('admin.getsubcategory');

  // ---------------------------------------brand Management---------------------------------------
  Route::get('/brand-listing', [AdminDashController::class, 'brand_listing'])->name('admin.brand_listing');
  Route::get('/add-brand', [AdminDashController::class, 'add_brand'])->name('admin.add_brand');
  Route::post('/create-brand', [AdminDashController::class, 'create_brand'])->name('admin.create_brand');
  Route::get('/edit-brand/{id}', [AdminDashController::class, 'edit_brand'])->name('admin.edit_brand');
  Route::post('/edit-brand', [AdminDashController::class, 'savebrand'])->name('admin.savebrand');
  Route::get('/suspend-brand/{id}', [AdminDashController::class, 'suspend_brand'])->name('admin.suspend_brand');
  Route::get('/delete-brand/{id}', [AdminDashController::class, 'delete_brand'])->name('admin.delete_brand');
  // ---------------------------------------brand Management---------------------------------------

  // ---------------------------------------faq Management---------------------------------------
  Route::get('/faq-listing', [AdminDashController::class, 'faq_listing'])->name('admin.faq_listing');
  Route::get('/add-faq', [AdminDashController::class, 'add_faq'])->name('admin.add_faq');
  Route::post('/create-faq', [AdminDashController::class, 'create_faq'])->name('admin.create_faq');
  Route::get('/edit-faq/{id}', [AdminDashController::class, 'edit_faq'])->name('admin.edit_faq');
  Route::post('/edit-faq', [AdminDashController::class, 'savefaq'])->name('admin.savefaq');
  Route::get('/suspend-faq/{id}', [AdminDashController::class, 'suspend_faq'])->name('admin.suspend_faq');
  Route::get('/delete-faq/{id}', [AdminDashController::class, 'delete_faq'])->name('admin.delete_faq');

  Route::get('/admin/check_slug', 'AdminDashController@Faq')->name('admin.check_slug');
  // ---------------------------------------faq Management---------------------------------------

  // ---------------------------------------banner Management---------------------------------------
  Route::get('/banner', [SiteSettingsController::class, 'homeSlider'])->name('admin.homeSlider');
  Route::get('/add-banner', [SiteSettingsController::class, 'addhomeSlider'])->name('admin.addhomeSlider');
  Route::post('/add-banner', [SiteSettingsController::class, 'createhomeSlider'])->name('admin.createhomeSlider');
  Route::get('/edit-banner/{id}', [SiteSettingsController::class, 'edithomeSlider'])->name('admin.edithomeSlider');
  Route::post('/edit-banner', [SiteSettingsController::class, 'updatehomeSlider'])->name('admin.updatehomeSlider');
  Route::get('/delete-home-slider/{id}', [SiteSettingsController::class, 'deletehomeSlider'])->name('admin.deletehomeSlider');
  Route::get('/suspend-home-slider/{id}', [SiteSettingsController::class, 'suspendhomeSlider'])->name('admin.suspendhomeSlider');
  // ---------------------------------------banner Management---------------------------------------

  // ---------------------------------------Orders Management---------------------------------------
  Route::get('/orders', [AdminDashController::class, 'orders_listing'])->name('admin.orders_listing');
  Route::get('/view-order/{id}', [AdminDashController::class, 'view_order'])->name('admin.view_order');
  Route::get('/delete-order/{id}', [AdminDashController::class, 'delete_order'])->name('admin.delete_order');
  Route::get('/order-status-update/{id}', [AdminDashController::class, 'order_status_update'])->name('admin.order_status_update');
  // ---------------------------------------Orders Management---------------------------------------

  // ---------------------------------------Welcome Baner Management---------------------------------------
  Route::get('/welcome-slider', [SiteSettingsController::class, 'welcomeSlider'])->name('admin.welcomeSlider');
  Route::get('/add-welcome-slider', [SiteSettingsController::class, 'addwelcomeSlider'])->name('admin.addwelcomeSlider');
  Route::post('/add-welcome-slider', [SiteSettingsController::class, 'createwelcomeSlider'])->name('admin.createwelcomeSlider');
  Route::get('/edit-welcome-slider/{id}', [SiteSettingsController::class, 'editwelcomeSlider'])->name('admin.editwelcomeSlider');
  Route::post('/edit-welcome-slider', [SiteSettingsController::class, 'updatewelcomeSlider'])->name('admin.updatewelcomeSlider');
  Route::get('/delete-welcome-slider/{id}', [SiteSettingsController::class, 'deletewelcomeSlider'])->name('admin.deletewelcomeSlider');
  Route::get('/suspend-welcome-slider/{id}', [SiteSettingsController::class, 'suspendwelcomeSlider'])->name('admin.suspendwelcomeSlider');
  // ---------------------------------------Welcome Baner Management---------------------------------------

  // ---------------------------------------Package Management---------------------------------------
  Route::get('/packages-listing', [AdminDashController::class, 'packages_listing'])->name('admin.packages_listing');
  Route::get('/add-packages', [AdminDashController::class, 'add_packages'])->name('admin.add_packages');
  Route::post('/save-packages', [AdminDashController::class, 'save_packages'])->name('admin.save_packages');
  Route::get('/edit-packages/{id}', [AdminDashController::class, 'edit_packages'])->name('admin.edit_packages');
  Route::post('/update-packages', [AdminDashController::class, 'update_packages'])->name('admin.update_packages');
  Route::get('/suspend-packages/{id}', [AdminDashController::class, 'suspend_packages'])->name('admin.suspend_packages');
  Route::get('/delete-packages/{id}', [AdminDashController::class, 'delete_packages'])->name('admin.delete_packages');
  Route::get('/delete-package-perk/{id}', [AdminDashController::class, 'delete_package_perk'])->name('admin.delete_package_perk');
  // ---------------------------------------Package Management---------------------------------------

  // ---------------------------------------Template Management---------------------------------------
  Route::get('/template-listing', [AdminDashController::class, 'template_listing'])->name('admin.template_listing');
  Route::get('/add-template', [AdminDashController::class, 'add_template'])->name('admin.add_template');
  Route::post('/save-template', [AdminDashController::class, 'save_template'])->name('admin.save_template');
  Route::get('/edit-template/{id}', [AdminDashController::class, 'edit_template'])->name('admin.edit_template');
  Route::post('/update-template', [AdminDashController::class, 'update_template'])->name('admin.update_template');
  Route::get('/suspend-template/{id}', [AdminDashController::class, 'suspend_template'])->name('admin.suspend_template');
  Route::get('/delete-template/{id}', [AdminDashController::class, 'delete_template'])->name('admin.delete_template');


  // ---------------------------------------Template Management---------------------------------------


  // ---------------------------------------Gallery Management---------------------------------------
  Route::get('/gallery-listing', [AdminDashController::class, 'gallery_listing'])->name('admin.gallery_listing');
  Route::get('/add-gallery', [AdminDashController::class, 'add_gallery'])->name('admin.add_gallery');
  Route::post('/save-gallery', [AdminDashController::class, 'save_gallery'])->name('admin.save_gallery');
  Route::get('/edit-gallery/{id}', [AdminDashController::class, 'edit_gallery'])->name('admin.edit_gallery');
  Route::post('/update-gallery', [AdminDashController::class, 'update_gallery'])->name('admin.update_gallery');
  Route::get('/suspend-gallery/{id}', [AdminDashController::class, 'suspend_gallery'])->name('admin.suspend_gallery');
  Route::get('/delete-gallery/{id}', [AdminDashController::class, 'delete_gallery'])->name('admin.delete_gallery');


  // ---------------------------------------Gallery Management---------------------------------------

  // ---------------------------------------Party Package Management---------------------------------------
  Route::get('/party-listing', [AdminDashController::class, 'party_listing'])->name('admin.party_listing');
  Route::get('/add-party', [AdminDashController::class, 'add_party'])->name('admin.add_party');
  Route::post('/save-party', [AdminDashController::class, 'save_party'])->name('admin.save_party');
  Route::get('/edit-party/{id}', [AdminDashController::class, 'edit_party'])->name('admin.edit_party');
  Route::post('/update-party', [AdminDashController::class, 'update_party'])->name('admin.update_party');
  Route::get('/suspend-party/{id}', [AdminDashController::class, 'suspend_party'])->name('admin.suspend_party');
  Route::get('/delete-party/{id}', [AdminDashController::class, 'delete_party'])->name('admin.delete_party');


  // ---------------------------------------Party Package Management---------------------------------------


  // ---------------------------------------activity_categories Management---------------------------------------
  Route::get('/cme-categories-listing', [AdminDashController::class, 'cme_categories_listing'])->name('admin.cme_categories_listing');
  Route::get('/add-cme-categories', [AdminDashController::class, 'add_cme_categories'])->name('admin.add_cme_categories');
  Route::post('/save-cme-categories', [AdminDashController::class, 'save_cme_categories'])->name('admin.save_cme_categories');
  Route::get('/edit-cme-categories/{id}', [AdminDashController::class, 'edit_cme_categories'])->name('admin.edit_cme_categories');
  Route::post('/update-cme-categories', [AdminDashController::class, 'update_cme_categories'])->name('admin.update_cme_categories');
  Route::get('/suspend-cme-categories/{id}', [AdminDashController::class, 'suspend_cme_categories'])->name('admin.suspend_cme_categories');
  Route::get('/delete-cme-categories/{id}', [AdminDashController::class, 'delete_cme_categories'])->name('admin.delete_cme_categories');
  // ---------------------------------------activity_categories Management---------------------------------------


  // ---------------------------------------Badges Management---------------------------------------
Route::get('/badges-management-listing', [AdminDashController::class, 'badges_management_listing'])->name('admin.badges_management_listing');
Route::get('/add-badges-management', [AdminDashController::class, 'add_badges_management'])->name('admin.add_badges_management');
Route::post('/save-badges-management', [AdminDashController::class, 'save_badges_management'])->name('admin.save_badges_management');
Route::get('/edit-badges-management/{id}', [AdminDashController::class, 'edit_badges_management'])->name('admin.edit_badges_management');
Route::post('/update-badges-management', [AdminDashController::class, 'update_badges_management'])->name('admin.update_badges_management');
Route::get('/suspend-badges-management/{id}', [AdminDashController::class, 'suspend_badges_management'])->name('admin.suspend_badges_management');
Route::get('/delete-badges-management/{id}', [AdminDashController::class, 'delete_badges_management'])->name('admin.delete_badges_management');
// ---------------------------------------Badges Management---------------------------------------

  // ---------------------------------------cms  Management---------------------------------------
  Route::get('/cms-content', [SiteSettingsController::class, 'cms'])->name('admin.cms');
  Route::get('/cms-content-edit/{id}', [SiteSettingsController::class, 'edit_cms'])->name('admin.editCms');
  Route::post('/cms-content-update', [SiteSettingsController::class, 'update_cms'])->name('admin.updateCms');


  Route::post('/statusAjaxUpdateCustom', [FrontEndEditorController::class, 'statusAjaxUpdateCustom']);
  Route::post('/statusAjaxUpdate', [FrontEndEditorController::class, 'statusAjaxUpdate']);
  Route::post('/updateFlagOnKey', [FrontEndEditorController::class, 'updateFlagOnKey']);
  Route::post('/imageUpload', [FrontEndEditorController::class, 'imageUpload']);

  // ---------------------------------------cms Management---------------------------------------

  Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

  // ---------------------------------------Admin---------------------------------------


 // ---------------------------------------Trainings Management---------------------------------------
  Route::get('/training-listing', [AdminDashController::class, 'training_listing'])->name('admin.training_listing');
  Route::get('/add-training', [AdminDashController::class, 'add_training'])->name('admin.add_training');
  Route::post('/save-training', [AdminDashController::class, 'save_training'])->name('admin.save_training');
  Route::get('/edit-training/{id}', [AdminDashController::class, 'edit_training'])->name('admin.edit_training');
  Route::post('/update-training/{id}', [AdminDashController::class, 'update_training'])->name('admin.update_training');
  Route::get('/change-training-status/{id}', [AdminDashController::class, 'change_training_status'])->name('admin.change_training_status');
  Route::get('/delete-training/{id}', [AdminDashController::class, 'delete_training'])->name('admin.delete_training');
  // ---------------------------------------Trainings Management---------------------------------------
  
});


// ---------------------------------------User Dash---------------------------------------
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

  Route::get('/sign-out', [UserController::class, 'signout'])->name('signout');
  Route::get('/password_change', [DashboardController::class, 'passwordchange'])->name('passwordChange');
  Route::post('/update/password', [DashboardController::class, 'updatepassword'])->name('update.password');

  Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
  Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('myProfile');
  Route::get('/edit-profile', [DashboardController::class, 'editprofile'])->name('editProfile');
  Route::post('/edit_profile', [DashboardController::class, 'saveprofile'])->name('submitProfile');

  // ---------------------------------------Doctor_experience Management---------------------------------------
  Route::get('/activity-listing', [DashboardController::class, 'activity_listing'])->name('activity_listing');
  Route::get('/add-activity', [DashboardController::class, 'add_activity'])->name('add_activity');
  Route::post('/save-activity', [DashboardController::class, 'save_activity'])->name('save_activity');
  Route::get('/edit-activity/{id}', [DashboardController::class, 'edit_activity'])->name('edit_activity');
  Route::post('/update-activity/{id}', [DashboardController::class, 'update_activity'])->name('update_activity');
  
  Route::get('/delete-activity/{id}', [DashboardController::class, 'delete_activity'])->name('delete_activity');
  // ---------------------------------------Doctor_experience Management---------------------------------------
  
  Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
});
// ---------------------------------------User Dash---------------------------------------