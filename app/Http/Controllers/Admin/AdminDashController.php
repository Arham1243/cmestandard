<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Newsletter;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Users_speciality_areas;
use App\Models\Users_speciality_interests;
use App\Models\Activity_categories;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Doctor_activity;
use App\Models\Badges;
use Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Carbon\Carbon;
use App\Traits\MyTrait;
use Str;

class AdminDashController extends Controller
{
    use MyTrait;
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function dashboard()
    {
        $users = User::get();
        return view('admin.dashboard')->with('title', 'Admin Dashboard')->with('user_menu', true)->with(compact('users'));
    }

    public function delete_faq($id)
    {
        $faq = Faq::where('id', $id)->delete();
        return redirect()->route('admin.faq_listing')->with('notify_success', 'Faq Deleted Successfuly!!');
    }

    public function faq_listing()
    {
        $faq = Faq::latest()->get();
        return view('admin.faq-management.list')->with('title', 'Faq Management')->with('faq_menu', true)->with(compact('faq'));
    }

    public function add_faq()
    {
        return view('admin.faq-management.add')->with('title', 'Add Faq')->with('faq_menu', true);
    }

    public function create_faq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::create([
            'question' => $request['question'],
            'answer' => $request['answer'],
        ]);

        return redirect()->route('admin.faq_listing')->with('notify_success', 'Faq Created Successfuly!!');
    }

    public function edit_faq($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faq-management.edit')->with('title', 'Edit Faq')->with('faq_menu', true)->with(compact('faq'));
    }

    public function savefaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::where('id', $request->id)->update([
            'question' => $request['question'],
            'answer' => $request['answer'],
        ]);

        return redirect()->route('admin.faq_listing')->with('notify_success', 'Faq Updated Successfuly!!');
    }

    public function suspend_faq($id)
    {
        $faq = Faq::where('id', $id)->first();
        if ($faq->is_active == 0) {
            $faq->is_active = 1;
            $faq->save();
            return redirect()->route('admin.faq_listing')->with('notify_success', 'Faq Activated Successfuly!!');
        } else {
            $faq->is_active = 0;
            $faq->save();
            return redirect()->route('admin.faq_listing')->with('notify_success', 'Faq Suspended Successfuly!!');
        }
    }

    public function inquiries_listing()
    {
        $inquiries = Inquiry::get();
        return view('admin.inquiries.list')->with('title', 'Inquiries')->with('inquiry_menu', true)->with(compact('inquiries'));
    }

    public function inquiries_listing_view($id)
    {
        $inquiry = Inquiry::where('id', $id)->first();
        if ($inquiry) {
            $is_read = Inquiry::where('id', $id)->update([
                'is_read' => 1
            ]);
        }

        return view('admin.inquiries.view')->with('title', 'View Inquiry')->with('inquiry_menu', true)->with(compact('inquiry'));
    }

    public function inquiries_listing_delete($id)
    {
        $inquiry = Inquiry::where('id', $id)->delete();
        return back()->with('notify_success', 'Inquiry Deleted!');
    }

    public function quotes_listing()
    {
        $quotes = Quote::get();
        return view('admin.quotes.list')->with('title', 'Quotes')->with(compact('quotes'));
    }

    public function quotes_listing_view($id)
    {
        $quote = Quote::where('id', $id)->first();
        if ($quote) {
            $is_read = Quote::where('id', $id)->update([
                'is_read' => 1
            ]);
        }

        return view('admin.quotes.view')->with('title', 'View Quotes')->with(compact('quote'));
    }

    public function quotes_listing_delete($id)
    {
        $quote = Quote::where('id', $id)->delete();
        return back()->with('notify_success', 'Quote Inquiry Deleted!');
    }

    public function users_listing()
    {
        // $users = User::with("get_roles_users")->get();
        $users = User::get();
        return view('admin.users-management.list')->with('title', 'User Management')->with('user_mgmmenu', true)->with(compact('users'));
    }

    public function add_users()
    {
        $users = User::get();
        return view('admin.users-management.add')->with('title', 'Add New User')->with('user_mgmmenu', true)->with(compact('users'));
    }

    public function create_users(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'password' => 'required|max:255',
            'password_confirmation' => 'required|same:password|max:255',
            'email' => 'required|unique:users|max:255',
            'is_active' => 'required',

        ]);
    }

    public function edit_user($id)
    {
        $user = User::where('id', $id)->first();
        $data = compact('user');
        return view('admin.users-management.edit')->with('title', 'Edit User')->with('user_mgmmenu', true)->with($data);
    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect()->route('admin.users_listing')->with('notify_success', 'User Deleted Successfuly!!');
    }

    public function user_password_change($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $data = compact('user');
            return view('admin.users-management.change-password')->with('title', 'Change Password')->with($data);
        }
    }

    public function user_password_change_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where("id", $request->user_id)->update([
            'password' => bcrypt($request['password']),
            'password_sample' => $request['password'],
        ]);
        return redirect()->route('admin.users_listing')->with('notify_success', 'Password Changed Successfuly!!');
    }

    public function update_user(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'full_name' => $request['full_name'],
            'registration_id' => $request['registration_id'],
            'major_subject' => $request['major_subject'],
            'speciality' => $request['speciality'],
            'batch' => $request['batch'],
            'year' => $request['year'],
            'password' => bcrypt($request['password']),
            'password_sample' => $request['password'],
        ]);

        if (request()->hasFile('profile_img')) {
            $avatar = request()->file('profile_img')->store('Uploads/User/Profile' . $request->id . rand() . rand(10, 100), 'public');
            $image = User::where('id', $request->id)->update(
                [
                    'profile_img' => asset($avatar),
                ]
            );
        }
        return redirect()->route('admin.users_listing')->with('notify_success', 'User Updated Successfuly!!');
    }

    public function suspend_user($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'User Activated Successfuly!!');
        } else {
            $user->is_active = 0;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'User Suspended Successfuly!!');
        }
    }    
    public function show_on_homepage_user($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->show_on_homepage == 0) {
            $user->show_on_homepage = 1;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'The user has been successfully featured on the homepage.');
        } else {
            $user->show_on_homepage = 0;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'The user has been successfully removed from the homepage.');
        }
    }    

    public function testimonial_listing()
    {
        $testimonial = Testimonial::where("table_name", "main-testimonial")->get();
        return view('admin.testimonial-management.list')->with('title', 'Testimonial Management')->with('testimonial_menu', true)->with(compact('testimonial'));
    }

    public function add_testimonial()
    {
        return view('admin.testimonial-management.add')->with('title', 'Add Testimonial')->with('testimonial_menu', true);
    }

    public function create_testimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnails' => 'required',
        ]);

        $testimonial = Testimonial::create([
            'name' => $request['name'],
            'table_name' => "main-testimonial",
            'designation' => "designation",
            // 'is_featured' => isset($request['is_featured']) && $request['is_featured'] == 'on' ? '1' : '0',
            'description' => $request['description'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/testimonial/thumbnails/' . $testimonial->id . rand() . rand(10, 100), 'public');
            $image = Testimonial::where('id', $testimonial->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Created Successfuly!!');
    }

    public function edit_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.testimonial-management.edit')->with('title', 'Edit Testimonial')->with('testimonial_menu', true)->with(compact('testimonial'));
    }

    public function savetestimonial(Request $request)
    {
        $existing_test = Testimonial::where('id', $request->id)->where("is_active", 1)->first();
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnails' => $existing_test->img_path == null ? 'required' : '',
        ]);

        $testimonial = Testimonial::where('id', $request->id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'designation' => $request['designation'],
            // 'is_featured' => isset($request['is_featured']) && $request['is_featured'] == 'on' ? '1' : '0',
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/description/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Testimonial::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Updated Successfuly!!');
    }

    public function suspend_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        if ($testimonial->is_active == 0) {
            $testimonial->is_active = 1;
            $testimonial->save();
            return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Activated Successfuly!!');
        } else {
            $testimonial->is_active = 0;
            $testimonial->save();
            return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Suspended Successfuly!!');
        }
    }

    public function delete_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->delete();
        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Deleted Successfuly!!');
    }

    public function services_listing()
    {
        $services = Services::get();
        return view('admin.services-management.list')->with('title', 'Services Management')->with(compact('services'));
    }

    public function add_service()
    {
        return view('admin.services-management.add')->with('title', 'Add Service');
    }

    public function create_service(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'img_path' => 'required',
        ]);

        $service = Services::create([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
        ]);

        if (request()->hasFile('img_path')) {
            $img_path = request()->file('img_path')->store('Uploads/services/images/' . $service->id . rand() . rand(10, 100), 'public');
            $image = Services::where('id', $service->id)->update(
                [
                    'img_path' => $img_path,
                ]
            );
        }

        return redirect()->route('admin.services_listing')->with('notify_success', 'Service Added Successfuly!!');
    }

    public function edit_service($id)
    {
        $service = Services::where('id', $id)->first();
        return view('admin.services-management.edit')->with('title', 'Edit Service')->with(compact('service'));
    }

    public function saveservice(Request $request)
    {
        $existing_test = Services::where('id', $request->id)->first();
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'img_path' => $existing_test->img_path == null ? 'required' : '',
        ]);

        $services = Services::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
        ]);

        if (request()->hasFile('img_path')) {
            $img_path = request()->file('img_path')->store('Uploads/services/images/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Services::where('id', $request->id)->update(
                [
                    'img_path' => $img_path,
                ]
            );
        }

        return redirect()->route('admin.services_listing')->with('notify_success', 'Service Updated Successfuly!!');
    }


    public function suspend_service($id)
    {
        $service = Services::where('id', $id)->first();
        if ($service->is_active == 0) {
            $service->is_active = 1;
            $service->save();
            return redirect()->route('admin.services_listing')->with('notify_success', 'Service Activated Successfuly!!');
        } else {
            $service->is_active = 0;
            $service->save();
            return redirect()->route('admin.services_listing')->with('notify_success', 'Service Suspended Successfuly!!');
        }
    }

    public function delete_service($id)
    {
        $services = Services::where('id', $id)->delete();
        return redirect()->route('admin.services_listing')->with('notify_success', 'Service Deleted Successfuly!!');
    }

    public function reviews_listing()
    {
        $reviews = Review::with('get_products')->get();
        return view('admin.reviews-management.list')->with('title', 'Reviews Management')->with(compact('reviews'));
    }

    public function edit_review($id)
    {
        $review = Review::where('id', $id)->with('get_user')->first();
        return view('admin.reviews-management.edit')->with('title', 'View Reviews')->with(compact('review'));
    }

    public function suspend_review($id)
    {
        $review = Review::where('id', $id)->first();
        if ($review->is_active == 0) {
            $review->is_active = 1;
            $review->save();
            return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Activated Successfuly!!');
        } else {
            $review->is_active = 0;
            $review->save();
            return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Suspended Successfuly!!');
        }
    }

    public function delete_review($id)
    {
        $review = Review::where('id', $id)->delete();
        return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Deleted Successfuly!!');
    }

    public function newsletter_listing()
    {
        $newsletter = Newsletter::get();
        return view('admin.newsletter.list')->with('title', 'Newsletter Listing')->with('newslettermenu', true)->with(compact('newsletter'));
    }

    public function newsletter_listing_delete($id)
    {
        $inquiry = Newsletter::where('id', $id)->delete();
        return back()->with('notify_success', 'Newsletter Deleted!');
    }

    public function blog_listing()
    {
        $blog = Blog::get();
        return view('admin.blog-management.list')->with('title', 'Blog Management')->with(compact('blog'));
    }

    public function add_blog()
    {
        $categories = Blog_categories::get();
        $data = compact('categories');
        return view('admin.blog-management.add')->with('title', 'Add Blog')->with($data);
    }

    public function create_blog(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'category_id' => 'required',
            'thumbnails' => 'required',
        ]);

        $slug = $this->slug_maker($request->input('title'), Blog::class);

        $blog = Blog::create([
            'title' => $request['title'],
            'slug' => $slug,
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
            'category_id' => $request['category_id'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Blogs/thumbnails/' . $blog->id . rand() . rand(10, 100), 'public');
            $image = Blog::where('id', $blog->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.blog_listing')->with('notify_success', 'Blog Added Successfuly!!');
    }

    public function edit_blog($id)
    {
        $blog = Blog::where('id', $id)->first();
        $categories = Blog_categories::where("is_active", 1)->get();
        $data = compact('categories', 'blog');
        return view('admin.blog-management.edit')->with('title', 'Edit Blog')->with($data);
    }

    public function saveblog(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category_id' => 'required',
        ]);

        $slug = $this->slug_maker($request->input('title'), Blog::class);
        $blog = Blog::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $slug,
            'category_id' => $request['category_id'],
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/news/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Blog::where('id', $request->id)->update(
                [

                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.blog_listing')->with('notify_success', 'Blog Updated Successfuly!!');
    }

    public function suspend_blog($id)
    {
        $blog = Blog::where('id', $id)->first();
        if ($blog->is_active == 0) {
            $blog->is_active = 1;
            $blog->save();
            return redirect()->route('admin.blog_listing')->with('notify_success', 'Blog Activated Successfuly!!');
        } else {
            $blog->is_active = 0;
            $blog->save();
            return redirect()->route('admin.blog_listing')->with('notify_success', 'Blog Suspended Successfuly!!');
        }
    }

    public function delete_blog($id)
    {
        $blog = Blog::where('id', $id)->delete();
        return redirect()->route('admin.blog_listing')->with('notify_success', 'Blog Deleted Successfuly!!');
    }

    public function course_listing()
    {
        $courses = Course::with("get_course_type")->get();
        $data = compact('courses');
        return view('admin.course-management.list')->with('title', 'Content Management')->with('course_menu', true)->with($data);
    }

    public function add_course()
    {
        return view('admin.course-management.add')->with('title', 'Add Content')->with('course_menu', true);
    }

    public function create_course(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required',
            'thumbnails' => 'required',
        ]);

        $course = Course::create([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'course_type' => $request['course_type'],
            'short_desc' => $request['short_desc'],
            'course_link' => $request['course_link'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/course/thumbnails/' . $course->id . rand() . rand(10, 100), 'public');
            $image = Course::where('id', $course->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        if (request()->hasFile('scorm_fIle')) {
            $scorm_fIle = request()->file('scorm_fIle')->store('Uploads/course/scorm_fIle/' . $course->id . rand() . rand(10, 100), 'public');
            $image = Course::where('id', $course->id)->update(
                [
                    'scorm_fIle' => $scorm_fIle,
                ]
            );
        }
        if (request()->hasFile('pdf_file')) {
            $pdf_file = request()->file('pdf_file')->store('Uploads/course/pdf_file/' . $course->id . rand() . rand(10, 100), 'public');
            $image = Course::where('id', $course->id)->update(
                [
                    'pdf_file' => $pdf_file,
                ]
            );
        }

        if (request()->hasFile('videos_path')) {
            $paths = $request->file('videos_path');
            foreach ($paths as $index => $path) {
                $file_name = $request->file('videos_path')[$index]->getClientOriginalName();
                $video = $request->file('videos_path')[$index]->store('Uploads/Course/Videos/' . rand() . rand(10, 1000), 'public');
                $video_path = Course_videos::create(
                    [
                        'course_id' => $course->id,
                        'course_type' => $request['course_type'],
                        'video_path' => $video,

                    ]
                );
            }
        }

        return redirect()->route('admin.course_listing')->with('notify_success', 'Content Added Successfuly!!');
    }

    public function edit_course($id)
    {
        $course_videos = Course_videos::where('course_id', $id)->get();
        $course = Course::where('id', $id)->first();
        $data = compact('course', 'course_videos');
        return view('admin.course-management.edit')->with('title', 'Edit Content')->with('course_menu', true)->with($data);
    }

    public function savecourse(Request $request)
    {
        $course_single = Course::where('id', $request->id)->first();

        $course = Course::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'short_desc' => $request['short_desc'],
            'course_link' => $request['course_link'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/course/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Course::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        if (request()->hasFile('scorm_fIle')) {
            $scorm_fIle = request()->file('scorm_fIle')->store('Uploads/course/scorm_fIle/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Course::where('id', $request->id)->update(
                [
                    'scorm_fIle' => $scorm_fIle,
                ]
            );
        }

        if (request()->hasFile('pdf_file')) {
            $pdf_file = request()->file('pdf_file')->store('Uploads/course/pdf_file/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Course::where('id', $request->id)->update(
                [
                    'pdf_file' => $pdf_file,
                ]
            );
        }

        if (request()->hasFile('videos_path')) {
            $paths = $request->file('videos_path');
            foreach ($paths as $index => $path) {
                $file_name = $request->file('videos_path')[$index]->getClientOriginalName();
                $video = $request->file('videos_path')[$index]->store('Uploads/Course/Videos/' . rand() . rand(10, 1000), 'public');
                $video_path = Course_videos::create(
                    [
                        'course_id' => $request->id,
                        'course_type' => $course_single->course_type,
                        'video_path' => $video,
                    ]
                );
            }
        }

        return redirect()->route('admin.course_listing')->with('notify_success', 'Content Updated Successfuly!!');
    }

    public function suspend_course($id)
    {
        $course = Course::where('id', $id)->first();
        if ($course->is_active == 0) {
            $course->is_active = 1;
            $course->save();
            return redirect()->route('admin.course_listing')->with('notify_success', 'Content Activated Successfuly!!');
        } else {
            $course->is_active = 0;
            $course->save();
            return redirect()->route('admin.course_listing')->with('notify_success', 'Content Suspended Successfuly!!');
        }
    }

    public function delete_course($id)
    {
        $course = Course::where('id', $id)->delete();
        return redirect()->route('admin.course_listing')->with('notify_success', 'Content Deleted Successfuly!!');
    }

    public function delete_course_video($id)
    {
        $result_images = Course_videos::where('id', $id)->delete();
        return redirect()->back()->with('notify_success', 'Successfully Deleted!');
    }

    public function news_listing()
    {
        $news = News::get();
        return view('admin.news-management.list')->with('title', 'news Management')->with('news_menu', true)->with(compact('news'));
    }

    public function add_news()
    {
        return view('admin.news-management.add')->with('title', 'Add news')->with('news_menu', true);
    }

    public function create_news(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'short_desc' => 'required',
            'thumbnails' => 'required',
        ]);

        $news = News::create([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'short_desc' => $request['short_desc'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/news/thumbnails/' . $news->id . rand() . rand(10, 100), 'public');
            $image = News::where('id', $news->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.news_listing')->with('notify_success', 'News Created Successfuly!!');
    }

    public function edit_news($id)
    {
        $news = News::where('id', $id)->first();
        return view('admin.news-management.edit')->with('title', 'News News')->with('news_menu', true)->with(compact('news'));
    }

    public function savenews(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'short_desc' => 'required',
        ]);

        $news = News::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'short_desc' => $request['short_desc'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/news/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = News::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.news_listing')->with('notify_success', 'News Updated Successfuly!!');
    }

    public function suspend_news($id)
    {
        $news = News::where('id', $id)->first();
        if ($news->is_active == 0) {
            $news->is_active = 1;
            $news->save();
            return redirect()->route('admin.news_listing')->with('notify_success', 'News Activated Successfuly!!');
        } else {
            $news->is_active = 0;
            $news->save();
            return redirect()->route('admin.news_listing')->with('notify_success', 'News Suspended Successfuly!!');
        }
    }

    public function delete_news($id)
    {
        $news = News::where('id', $id)->delete();
        return redirect()->route('admin.news_listing')->with('notify_success', 'News Deleted Successfuly!!');
    }

    public function partner_listing()
    {
        $partner = Partner::get();
        return view('admin.partner-management.list')->with('title', 'Partner Management')->with('partner_menu', true)->with(compact('partner'));
    }

    public function add_partner()
    {
        return view('admin.partner-management.add')->with('title', 'Add partner')->with('partner_menu', true);
    }

    public function create_partner(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'thumbnails' => 'required',
        ]);

        $partner = Partner::create([
            'title' => $request['title'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/partner/thumbnails/' . $partner->id . rand() . rand(10, 100), 'public');
            $image = Partner::where('id', $partner->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.partner_listing')->with('notify_success', 'Partner Created Successfuly!!');
    }

    public function edit_partner($id)
    {
        $partner = Partner::where('id', $id)->first();
        return view('admin.partner-management.edit')->with('title', 'Edit partner')->with('partner_menu', true)->with(compact('partner'));
    }

    public function savepartner(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $partner = Partner::where('id', $request->id)->update([
            'title' => $request['title'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/partner/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Partner::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.partner_listing')->with('notify_success', 'Partner Updated Successfuly!!');
    }

    public function suspend_partner($id)
    {
        $partner = Partner::where('id', $id)->first();
        if ($partner->is_active == 0) {
            $partner->is_active = 1;
            $partner->save();
            return redirect()->route('admin.partner_listing')->with('notify_success', 'Partner Activated Successfuly!!');
        } else {
            $partner->is_active = 0;
            $partner->save();
            return redirect()->route('admin.partner_listing')->with('notify_success', 'Partner Suspended Successfuly!!');
        }
    }

    public function delete_partner($id)
    {
        $partner = Partner::where('id', $id)->delete();
        return redirect()->route('admin.partner_listing')->with('notify_success', 'Partner Deleted Successfuly!!');
    }

    public function category_listing()
    {
        $category = Category::get();
        return view('admin.category-management.list')->with('title', 'Category Management')->with(compact('category'));
    }

    public function add_category()
    {
        return view('admin.category-management.add')->with('title', 'Category News');
    }

    public function savecategory(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:category',
        ]);

        $category = Category::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
        ]);

        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Updated Successfuly!!');
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:category',
        ]);

        $category = Category::create([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
        ]);
        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Created Successfuly!!');
    }

    public function edit_category($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category-management.edit')->with('title', 'Edit category')->with(compact('category'));
    }

    public function suspend_category($id)
    {
        $category = category::where('id', $id)->first();
        if ($category->is_active == 0) {
            $category->is_active = 1;
            $category->save();
            return redirect()->route('admin.category_listing')->with('notify_success', 'Category Activated Successfuly!!');
        } else {
            $category->is_active = 0;
            $category->save();
            return redirect()->route('admin.category_listing')->with('notify_success', 'Category Suspended Successfuly!!');
        }
    }

    public function delete_category($id)
    {
        $category = Category::where('id', $id)->delete();
        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Deleted Successfuly!!');
    }

    public function subcategory_listing()
    {
        $subcategory = Sub_category::with('category')->get();
        return view('admin.subcategory-management.list')->with('title', 'Sub Category Management')->with('subcategory_menu', true)->with(compact('subcategory'));
    }

    public function add_subcategory()
    {
        $maincategory = Category::where('is_active', 1)->get();
        return view('admin.subcategory-management.add')->with('title', 'Sub Category')->with('subcategory_menu', true)->with(compact('maincategory'));
    }

    public function create_subcategory(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:sub_category'
            ],
            [
                'category_id.required' => 'The category field is required.'
            ]
        );

        $subcategory = Sub_category::create([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'SubCategory Created Successfuly!!');
    }

    public function edit_subcategory($id)
    {
        $subcategory = Sub_Category::where('id', $id)->with('category')->first();
        $maincategory = Category::where('is_active', 1)->with('categoryHasSubCategory')->get();
        return view('admin.subcategory-management.edit')->with('title', 'Edit sub category')->with('subcategory_menu', true)->with(compact('subcategory', 'maincategory'));
    }

    public function savesubcategory(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:sub_category'
            ],
            [
                'category_id.required' => 'The category field is required.'
            ]
        );

        $subcategory = Sub_category::where('id', $request->id)->update([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Updated Successfuly!!');
    }

    public function suspend_subcategory($id)
    {
        $subcategory = Sub_category::where('id', $id)->first();
        if ($subcategory->is_active == 0) {
            $subcategory->is_active = 1;
            $subcategory->save();
            return redirect()->route('admin.subcategory_listing')->with('notify_success', ' Sub Category Activated Successfuly!!');
        } else {
            $subcategory->is_active = 0;
            $subcategory->save();
            return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Suspended Successfuly!!');
        }
    }

    public function delete_subcategory($id)
    {
        $subcategory = Sub_category::where('id', $id)->delete();
        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Deleted Successfuly!!');
    }

    public function getsubcategory(Request $request)
    {
        $subcategory = Sub_category::where('is_active', 1)->where('category_id', $request->category_id)->select('id', 'title')->get()->toArray();
        if (!empty($subcategory)) {
            return response()->json(['status' => 1, 'data' => $subcategory]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function brand_listing()
    {
        $brand = Brand::get();
        return view('admin.brand-management.list')->with('title', 'Brand Management')->with('brand_menu', true)->with(compact('brand'));
    }

    public function add_brand()
    {
        return view('admin.brand-management.add')->with('title', 'Add Brand')->with('brand_menu', true);
    }

    public function savebrand(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
        ]);

        $brand = Brand::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Brand/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Brand::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.brand_listing')->with('notify_success', 'Category Updated Successfuly!!');
    }

    public function create_brand(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:category',
        ]);

        $brand = Brand::create([
            'title' => $request['title'],
            'slug' => $request['slug'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Brand/thumbnails/' . $brand->id . rand() . rand(10, 100), 'public');
            $image = Brand::where('id', $brand->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.brand_listing')->with('notify_success', 'Brand Created Successfuly!!');
    }

    public function edit_brand($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand-management.edit')->with('title', 'Edit Brand')->with('brand_menu', true)->with(compact('brand'));
    }

    public function suspend_brand($id)
    {
        $brand = Brand::where('id', $id)->first();
        if ($brand->is_active == 0) {
            $brand->is_active = 1;
            $brand->save();
            return redirect()->route('admin.brand_listing')->with('notify_success', 'Brand Activated Successfuly!!');
        } else {
            $brand->is_active = 0;
            $brand->save();
            return redirect()->route('admin.brand_listing')->with('notify_success', 'Brand Suspended Successfuly!!');
        }
    }

    public function delete_brand($id)
    {
        $category = Brand::where('id', $id)->delete();
        return redirect()->route('admin.brand_listing')->with('notify_success', 'Brand Deleted Successfuly!!');
    }

    public function orders_listing()
    {
        $orders = Orders::get();
        return view('admin.orders-management.list')->with('title', 'Orders Management')->with(compact('orders'));
    }

    public function view_order($id)
    {
        $order = Orders::where('id', $id)->with('orderHasDetail')->first();

        if ($order->orderHasDetail) {
            $order_detail = unserialize($order->orderHasDetail->details);
        } else {
            $order_detail = [];
        }
        $cart_data = Session::get('cart');
        $products = Products::where('is_active', 1)->get();
        $data = compact('order', 'order_detail', 'products', 'cart_data');
        return view('admin.orders-management.detail')->with('title', 'View Order')->with($data);
    }

    public function delete_order($id)
    {
        $order = Orders::where('id', $id)->delete();
        return redirect()->route('admin.orders_listing')->with('notify_success', 'Order Deleted Successfuly!!');
    }

    public function order_status_update($id)
    {
        $status = $_GET['status'];
        $order = Orders::where('id', $id)->first();
        $order->is_active = $status;
        $order->save();
        return redirect()->route('admin.orders_listing')->with('notify_success', 'Order Status Updated Successfuly!!');
    }

    public function invoice_listing()
    {
        $invoices = Invoice::where("is_active", 1)->get();
        $data = compact('invoices');
        return view('admin.invoice-generator.list')->with('title', 'Invoices')->with($data);
    }

    public function add_invoice()
    {
        $products = Products::where("is_active", 1)->get();
        $data = compact('products');
        return view('admin.invoice-generator.add')->with('title', 'Generate Invoice')->with($data);
    }

    public function save_invoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|unique:invoices',
            'date' => 'required|date',
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'vin' => 'required|string|max:255',
            'year' => 'required|numeric',
            'model' => 'required|string|max:255',
            'mileage' => 'required|numeric',
            'color' => 'required|string|max:255',
            'unit' => 'required|numeric',
            'product_name.*' => 'required|string|max:255',
            'quantity.*' => 'required|numeric',
            'price.*' => 'required|numeric',
            'total_amount.*' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'amount_due' => 'required|numeric',
            '1_month' => 'required|numeric',
            '2_month' => 'required|numeric',
            '3_month' => 'required|numeric',
            '4_month' => 'required|numeric',
        ]);

        $config = $this->getConfig();
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();

        $productDetails = [];
        $productCount = count($request->input('product_name'));

        for ($i = 0; $i < $productCount; $i++) {
            $productDetails[] = [
                'product_name' => $request->input('product_name')[$i],
                'quantity' => $request->input('quantity')[$i],
                'price' => $request->input('price')[$i],
                'tax' => $request->input('tax')[$i],
                'total_amount' => $request->input('total_amount')[$i],
            ];
        }

        $invoiceData = $request->except('_token', 'product_name', 'quantity', 'price', 'tax', 'total_amount');
        $invoiceData['product_details'] = serialize($productDetails);
        $invoice = Invoice::create($invoiceData);

        Mail::send('email/order-invoice', ['invoiceData' => $invoiceData, "config" => $config, "logo" => $logo], function ($message) use ($invoiceData) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($invoiceData['email']);
            $message->subject('Order Incoive');
        });

        return redirect()->route('admin.invoice_listing')->with('notify_success', 'Invoice Created Successfully!!');
    }

    public function delete_invoice($id)
    {
        $invoice = Invoice::where('id', $id)->delete();
        return redirect()->route('admin.invoice_listing')->with('notify_success', 'Invoice Deleted Successfuly!!');
    }

    public function blog_category_listing()
    {
        $categories = Blog_categories::get();
        return view('admin.blog-category-management.list')->with('title', 'Blog Category Management')->with(compact('categories'));
    }

    public function add_blog_category()
    {
        return view('admin.blog-category-management.add')->with('title', 'Add Blog Category');
    }

    public function save_blog_category(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $slug = $this->slug_maker($request->input('title'), Blog_categories::class);
        $category = Blog_categories::create([
            'title' => $request['title'],
            'slug' => $slug,
        ]);
        return redirect()->route('admin.blog_category_listing')->with('notify_success', 'Blog Category Added Successfuly!!');
    }

    public function update_blog_category(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slug = $this->slug_maker($request->input('title'), Blog_categories::class);
        $category = Blog_categories::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.blog_category_listing')->with('notify_success', 'Blog Category Updated Successfuly!!');
    }

    public function edit_blog_category($id)
    {
        $category = Blog_categories::where('id', $id)->first();
        return view('admin.blog-category-management.edit')->with('title', 'Edit Blog Category')->with(compact('category'));
    }

    public function suspend_blog_category($id)
    {
        $category = Blog_categories::where('id', $id)->first();
        if ($category->is_active == 0) {
            $category->is_active = 1;
            $category->save();
            return redirect()->route('admin.blog_category_listing')->with('notify_success', 'Blog Category Activated Successfuly!!');
        } else {
            $category->is_active = 0;
            $category->save();
            return redirect()->route('admin.blog_category_listing')->with('notify_success', 'Blog Category Suspended Successfuly!!');
        }
    }

    public function delete_blog_category($id)
    {
        $category = Blog_categories::where('id', $id)->delete();
        return redirect()->route('admin.blog_category_listing')->with('notify_success', 'Blog Category Deleted Successfuly!!');
    }

    public function packages_listing()
    {
        $packages = Package::get();
        return view('admin.packages-management.list')->with('title', 'Packages Management')->with(compact('packages'));
    }

    public function add_packages()
    {
        return view('admin.packages-management.add')->with('title', 'Add Packages');
    }

    public function save_packages(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'sub_title' => 'required',
            'price' => 'required',
            'short_desc' => 'required',
            'type' => 'required',
            'perks' => 'required',
        ]);

        $package = Package::create([
            'title' => $request['title'],
            'sub_title' => $request['sub_title'],
            'sub_title' => $request['sub_title'],
            'price' => $request['price'],
            'short_desc' => $request['short_desc'],
            'short_desc' => $request['short_desc'],
            'is_limited' => $request['is_limited'],
            'type' => $request['type'],
        ]);
        foreach ($request['perks'] as $perk) {
            $perk = Packages_perk::create([
                'package_id' => $package->id,
                'perk' => $perk,
            ]);
        }
        return redirect()->route('admin.packages_listing')->with('notify_success', 'Package Added Successfuly!!');
    }

    public function update_packages(Request $request)
    {
        $package = Package::create([
            'title' => $request['title'],
            'sub_title' => $request['sub_title'],
            'sub_title' => $request['sub_title'],
            'price' => $request['price'],
            'short_desc' => $request['short_desc'],
            'short_desc' => $request['short_desc'],
            'is_limited' => $request['is_limited'],
            'type' => $request['type'],
        ]);
        foreach ($request['perks'] as $perk) {
            $perk = Packages_perk::create([
                'package_id' => $package->id,
                'perk' => $perk,
            ]);
        }

        return redirect()->route('admin.packages_listing')->with('notify_success', 'Package Updated Successfuly!!');
    }

    public function edit_packages($id)
    {
        $package = Package::where('id', $id)->first();
        $package_perks = Packages_perk::where('package_id', $id)->get();
        return view('admin.packages-management.edit')->with('title', 'Edit Packages')->with(compact('package', 'package_perks'));
    }

    public function suspend_packages($id)
    {
        $package = Package::where('id', $id)->first();
        if ($package->is_active == 0) {
            $package->is_active = 1;
            $package->save();
            return redirect()->route('admin.packages_listing')->with('notify_success', 'Package Activated Successfuly!!');
        } else {
            $package->is_active = 0;
            $package->save();
            return redirect()->route('admin.packages_listing')->with('notify_success', 'Package Suspended Successfuly!!');
        }
    }

    public function delete_packages($id)
    {
        $package = Package::where('id', $id)->delete();
        return redirect()->route('admin.packages_listing')->with('notify_success', 'Packages Deleted Successfuly!!');
    }

    public function delete_package_perk($id)
    {
        $perk = Packages_perk::where('id', $id)->first();
        $perk->delete();
        return redirect()->route('admin.edit_packages', $perk->package_id)->with('notify_success', 'Perk Deleted Successfuly!!');
    }

    public function template_listing()
    {
        $templates = Template::get();
        return view('admin.template-management.list')->with('title', 'Templates Management')->with(compact('templates'));
    }

    public function add_template()
    {
        return view('admin.template-management.add')->with('title', 'Add Template');
    }

    public function save_template(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnails' => 'required',
        ]);

        $template = Template::create([
            'title' => $request['title'],
        ]);
        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/templates/thumbnails/' . $template->id . rand() . rand(10, 100), 'public');
            $image = Template::where('id', $template->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }
        return redirect()->route('admin.template_listing')->with('notify_success', 'Template Added Successfuly!!');
    }

    public function update_template(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $template = Template::where('id', $request->id)->update([
            'title' => $request['title'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/templates/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Template::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }
        return redirect()->route('admin.template_listing')->with('notify_success', 'Template Updated Successfuly!!');
    }

    public function edit_template($id)
    {
        $template = Template::where('id', $id)->first();
        return view('admin.template-management.edit')->with('title', 'Edit Template')->with(compact('template'));
    }

    public function suspend_template($id)
    {
        $template = Template::where('id', $id)->first();
        if ($template->is_active == 0) {
            $template->is_active = 1;
            $template->save();
            return redirect()->route('admin.template_listing')->with('notify_success', 'Template Activated Successfuly!!');
        } else {
            $template->is_active = 0;
            $template->save();
            return redirect()->route('admin.template_listing')->with('notify_success', 'Template Suspended Successfuly!!');
        }
    }

    public function delete_template($id)
    {
        $template = Template::where('id', $id)->delete();
        return redirect()->route('admin.template_listing')->with('notify_success', 'Template Deleted Successfuly!!');
    }

    public function gallery_listing()
    {
        $galleries = Gallery::get();
        return view('admin.gallery-management.list', ['title' => 'Galleries Management', 'galleries' => $galleries]);
    }

    public function add_gallery()
    {
        return view('admin.gallery-management.add', ['title' => 'Add Gallery']);
    }

    public function save_gallery(Request $request)
    {
        $request->validate([
            'thumbnails' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::create([]);

        if ($request->hasFile('thumbnails')) {
            $thumbnail = $request->file('thumbnails')->store('uploads/galleries/thumbnails', 'public');
            $gallery->update(['img_path' => $thumbnail]);
        }

        return redirect()->route('admin.gallery_listing')->with('notify_success', 'Gallery Added Successfully!');
    }

    public function edit_gallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery-management.edit', ['Edit Gallery', 'gallery' => $gallery]);
    }

    public function update_gallery(Request $request)
    {
        $request->validate([
            'thumbnails' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($request->id);
        $gallery->update([$request->input('title')]);

        if ($request->hasFile('thumbnails')) {
            $thumbnail = $request->file('thumbnails')->store('uploads/galleries/thumbnails', 'public');
            $gallery->update(['img_path' => $thumbnail]);
        }

        return redirect()->route('admin.gallery_listing')->with('notify_success', 'Gallery Updated Successfully!');
    }

    public function suspend_gallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update(['is_active' => !$gallery->is_active]);
        $statusMessage = $gallery->is_active ? 'Activated' : 'Suspended';
        return redirect()->route('admin.gallery_listing')->with('notify_success', "Gallery $statusMessage Successfully!");
    }

    public function delete_gallery($id)
    {
        Gallery::findOrFail($id)->delete();
        return redirect()->route('admin.gallery_listing')->with('notify_success', 'Gallery Deleted Successfully!');
    }

    public function contest_listing()
    {
        $contests = Contest::all();
        return view('admin.contest-management.list', compact('contests'));
    }

    public function add_contest()
    {
        return view('admin.contest-management.add')->with("title", "Add Contest");
    }

    public function save_contest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fees' => 'required',
            'expiry_date' => 'required|date',
            'winning_amount' => 'required',
        ]);

        $slug = $this->slug_maker($request->input('title'), Contest::class);

        $contest = Contest::create([
            'title' => $request->input('title'),
            'fees' => $request->input('fees'),
            'expiry_date' => $request->input('expiry_date'),
            'winning_amount' => $request->input('winning_amount'),
            'slug' => $slug,
        ]);

        return redirect()->route('admin.contest_listing')->with('notify_success', 'Contest added successfully.');
    }

    public function edit_contest($id)
    {
        $contest = Contest::findOrFail($id);
        return view('admin.contest-management.edit', compact('contest'));
    }

    public function update_contest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fees' => 'required',
            'expiry_date' => 'required|date',
            'winning_amount' => 'required',
        ]);

        Contest::findOrFail($request->id)->update($request->all());
        return redirect()->route('admin.contest_listing')->with('notify_success', 'Contest updated successfully.');
    }

    public function suspend_contest($id)
    {
        $contest = Contest::findOrFail($id);
        $contest->update(['is_active' => !$contest->is_active]);
        return redirect()->route('admin.contest_listing')->with('notify_success', 'Contest status updated successfully.');
    }

    public function delete_contest($id)
    {
        Contest::findOrFail($id)->delete();
        return redirect()->route('admin.contest_listing')->with('notify_success', 'Contest deleted successfully.');
    }

    public function listParticipants()
    {
        $contest_participants = Contest_participants::all();
        return view('admin.participant-management.list', compact('contest_participants'));
    }

    public function addParticipant()
    {
        return view('admin.participant-management.add');
    }

    public function saveParticipant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vote' => 'required|numeric',
        ]);

        $contest_participant = new Participant();
        $contest_participant->name = $request->input('name');
        $contest_participant->vote = $request->input('vote');

        if ($request->hasFile('img_path')) {
            $img_path = $request->file('img_path')->store('uploads/participants', 'public');
            $contest_participant->img_path = $img_path;
        }

        $contest_participant->save();

        return redirect()->route('admin.participant_listing')->with('notify_success', 'Participant added successfully.');
    }

    public function editParticipant($id)
    {
        $contest_participant = Contest_participants::findOrFail($id);
        return view('admin.participant-management.edit', compact('participant'));
    }

    public function updateParticipant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'vote' => 'required|numeric',
            'img_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $contest_participant = Contest_participants::findOrFail($request->id);
        $contest_participant->update(['name' => $request->input('name'), 'vote' => $request->input('vote')]);

        if ($request->hasFile('img_path')) {
            $img_path = $request->file('img_path')->store('uploads/participants', 'public');
            $contest_participant->update(['img_path' => $img_path]);
        }

        return redirect()->route('admin.participant_listing')->with('notify_success', 'Participant updated successfully.');
    }

    public function suspendParticipant($id)
    {
        $contest_participant = Contest_participants::where('id', $id)->first();
        if ($contest_participant->is_active == 0) {
            $contest_participant->is_active = 1;
            $contest_participant->save();
            return redirect()->route('admin.participant_listing')->with('notify_success', 'Participant Activated Successfuly!!');
        } else {
            $contest_participant->is_active = 0;
            $contest_participant->save();
            return redirect()->route('admin.participant_listing')->with('notify_success', 'Participant Suspended Successfuly!!');
        }
    }

    public function deleteParticipant($id)
    {
        Contest_participants::findOrFail($id)->delete();
        return redirect()->route('admin.participant_listing')->with('notify_success', 'Participant deleted successfully.');
    }

    public function planning_listing()
    {
        $planning = Planning::all();
        return view('admin.planning-tip-management.list')->with('title', 'Planning Tips Management')->with(compact('planning'));
    }

    public function add_planning()
    {
        return view('admin.planning-tip-management.add')->with('title', 'Add Planning');
    }

    public function create_planning(Request $request)
    {
        $request->validate([
            'headings' => 'required|max:255',
            'description' => 'required',
        ]);

        $planning = Planning::create([
            'headings' => $request['headings'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/testimonial/thumbnails/' . $planning->id . rand() . rand(10, 100), 'public');
            $image = Planning::where('id', $planning->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }
        return redirect()->route('admin.planning_listing')->with('notify_success', 'Planning Created Successfuly!!');
    }

    public function edit_planning($id)
    {
        $planning = Planning::where('id', $id)->first();
        return view('admin.planning-tip-management.edit')->with('title', 'Edit Planning')->with(compact('planning'));
    }

    public function save_planning(Request $request)
    {
        $existing_test = Planning::where('id', $request->id)->where("is_active", 1)->first();
        $request->validate([
            'headings' => 'required|max:255',
            'description' => 'required',
        ]);

        $planning = Planning::where('id', $request->id)->update([
            'headings' => $request['headings'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/description/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Planning::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.planning_listing')->with('notify_success', 'Planning Updated Successfuly!!');
    }

    public function suspend_planning($id)
    {
        $planning = Planning::where('id', $id)->first();
        if ($planning->is_active == 0) {
            $planning->is_active = 1;
            $planning->save();
            return redirect()->route('admin.planning_listing')->with('notify_success', 'Planning Activated Successfuly!!');
        } else {
            $planning->is_active = 0;
            $planning->save();
            return redirect()->route('admin.planning_listing')->with('notify_success', 'Planning Suspended Successfuly!!');
        }
    }

    public function delete_planning($id)
    {
        $planning = Planning::where('id', $id)->delete();
        return redirect()->route('admin.planning_listing')->with('notify_success', 'Planning Deleted Successfuly!!');
    }

    public function party_listing()
    {
        $parties = Party::get();
        return view('admin.party-package-management.list', ['title' => 'Party Packages Management', 'parties' => $parties]);
    }

    public function add_party()
    {
        return view('admin.party-package-management.add', ['title' => 'Add Party']);
    }

    public function save_party(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnails' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $party = Party::create([
            'title' => $request->input('title'),
        ]);

        if ($request->hasFile('thumbnails')) {
            $thumbnail = $request->file('thumbnails')->store('uploads/galleries/thumbnails', 'public');
            $party->update(['img_path' => $thumbnail]);
        }

        return redirect()->route('admin.party_listing')->with('notify_success', 'Party Added Successfully!');
    }

    public function edit_party($id)
    {
        $party = Party::findOrFail($id);
        return view('admin.party-package-management.edit', ['Edit Party', 'party' => $party]);
    }

    public function update_party(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnails' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $party = Party::findOrFail($request->id);
        $party->update([$request->input('title')]);

        if ($request->hasFile('thumbnails')) {
            $thumbnail = $request->file('thumbnails')->store('uploads/galleries/thumbnails', 'public');
            $party->update(['img_path' => $thumbnail]);
        }

        return redirect()->route('admin.party_listing')->with('notify_success', 'Party Updated Successfully!');
    }

    public function suspend_party($id)
    {
        $party = Party::findOrFail($id);
        $party->update(['is_active' => !$party->is_active]);

        $statusMessage = $party->is_active ? 'Activated' : 'Suspended';

        return redirect()->route('admin.party_listing')->with('notify_success', "Party $statusMessage Successfully!");
    }

    public function delete_party($id)
    {
        Party::findOrFail($id)->delete();
        return redirect()->route('admin.party_listing')->with('notify_success', 'Party Deleted Successfully!');
    }

    public function product_category_listing()
    {
        $categories = Product_categories::get();
        return view('admin.product-category-management.list')->with('title', 'Product Category Management')->with(compact('categories'));
    }

    public function add_product_category()
    {
        return view('admin.product-category-management.add')->with('title', 'Add Product Category');
    }

    public function save_product_category(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $slug = $this->slug_maker($request->input('title'), Product_categories::class);


        $category = Product_categories::create([
            'title' => strtolower($request['title']),
            'slug' => $slug,
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/category/thumbnails/' . $category->id . rand() . rand(10, 100), 'public');
            $image = Product_categories::where('id', $category->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.product_category_listing')->with('notify_success', 'Product Category Added Successfuly!!');
    }

    public function update_product_category(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slug = $this->slug_maker($request->input('title'), Product_categories::class);
        $category = Product_categories::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => $slug,
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/category/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Product_categories::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.product_category_listing')->with('notify_success', 'Product Category Updated Successfuly!!');
    }

    public function edit_product_category($id)
    {
        $category = Product_categories::where('id', $id)->first();
        return view('admin.product-category-management.edit')->with('title', 'Edit Product Category')->with(compact('category'));
    }

    public function suspend_product_category($id)
    {
        $category = Product_categories::where('id', $id)->first();
        if ($category->is_active == 0) {
            $category->is_active = 1;
            $category->save();
            return redirect()->route('admin.product_category_listing')->with('notify_success', 'Product Category Activated Successfuly!!');
        } else {
            $category->is_active = 0;
            $category->save();
            return redirect()->route('admin.product_category_listing')->with('notify_success', 'Product Category Suspended Successfuly!!');
        }
    }

    public function delete_product_category($id)
    {
        $category = Product_categories::find($id);

        if ($category) {
            $category->forceDelete();
            Products::where('category_id', $id)->update(['is_active' => 3]);
            return redirect()->route('admin.product_category_listing')->with('notify_success', 'Category Deleted Permanently! Products Deactivated!');
        }

        return redirect()->route('admin.product_category_listing')->with('notify_error', 'Category not found!');
    }




    public function speciality_areas_listing()
    {
        $sepcialiy_areas = Users_speciality_areas::get();
        return view('admin.speciality-areas.list')->with('title', 'Users Sepcialiy Areas Management')->with(compact('sepcialiy_areas'));
    }

    public function add_speciality_areas()
    {
        return view('admin.speciality-areas.add')->with('title', 'Add Users Sepcialiy Areas');
    }


    public function save_speciality_areas(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sepcialiy_area = Users_speciality_areas::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.speciality_areas_listing')->with('notify_success', 'Users Sepcialiy Areas Added Successfuly!!');
    }



    public function edit_speciality_areas($id)
    {
        $sepcialiy_area = Users_speciality_areas::where('id', $id)->first();
        return view('admin.speciality-areas.edit')->with('title', 'Edit Users Sepcialiy Areas')->with(compact('sepcialiy_area'));
    }
    public function update_speciality_areas(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sepcialiy_area = Users_speciality_areas::where('id', $request->id)->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.speciality_areas_listing')->with('notify_success', 'Users Sepcialiy Areas Updated Successfuly!!');
    }
    public function suspend_speciality_areas($id)
    {
        $sepcialiy_area = Users_speciality_areas::where('id', $id)->first();
        if ($sepcialiy_area->is_active == 0) {
            $sepcialiy_area->is_active = 1;
            $sepcialiy_area->save();
            return redirect()->route('admin.speciality_areas_listing')->with('notify_success', 'Users Sepcialiy Areas Activated Successfuly!!');
        } else {
            $sepcialiy_area->is_active = 0;
            $sepcialiy_area->save();
            return redirect()->route('admin.speciality_areas_listing')->with('notify_success', 'Users Sepcialiy Areas Suspended Successfuly!!');
        }
    }

    public function delete_speciality_areas($id)
    {
        $sepcialiy_area = Users_speciality_areas::where('id', $id)->delete();
        return redirect()->route('admin.speciality_areas_listing')->with('notify_success', 'Users Sepcialiy Areas Deleted Successfuly!!');
    }


    public function speciality_interests_listing()
    {
        $speciality_interests = Users_speciality_interests::get();
        return view('admin.speciality-interests.list')->with('title', 'Users speciality Interests Management')->with(compact('speciality_interests'));
    }

    public function add_speciality_interests()
    {
        return view('admin.speciality-interests.add')->with('title', 'Add Users speciality Interests');
    }


    public function save_speciality_interests(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $speciality_interest = Users_speciality_interests::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.speciality_interests_listing')->with('notify_success', 'Users speciality Interests Added Successfuly!!');
    }



    public function edit_speciality_interests($id)
    {
        $speciality_interest = Users_speciality_interests::where('id', $id)->first();
        return view('admin.speciality-interests.edit')->with('title', 'Edit Users speciality Interests')->with(compact('speciality_interest'));
    }
    public function update_speciality_interests(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $speciality_interest = Users_speciality_interests::where('id', $request->id)->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.speciality_interests_listing')->with('notify_success', 'Users speciality Interests Updated Successfuly!!');
    }
    public function suspend_speciality_interests($id)
    {
        $speciality_interest = Users_speciality_interests::where('id', $id)->first();
        if ($speciality_interest->is_active == 0) {
            $speciality_interest->is_active = 1;
            $speciality_interest->save();
            return redirect()->route('admin.speciality_interests_listing')->with('notify_success', 'Users speciality Interests Activated Successfuly!!');
        } else {
            $speciality_interest->is_active = 0;
            $speciality_interest->save();
            return redirect()->route('admin.speciality_interests_listing')->with('notify_success', 'Users speciality Interests Suspended Successfuly!!');
        }
    }

    public function delete_speciality_interests($id)
    {
        $speciality_interest = Users_speciality_interests::where('id', $id)->delete();
        return redirect()->route('admin.speciality_interests_listing')->with('notify_success', 'Users speciality Interests Deleted Successfuly!!');
    }

    public function cme_categories_listing()
    {
        $cme_categories = Activity_categories::get();
        return view('admin.cme-categories.list')->with('title', 'Activity Categories')->with(compact('cme_categories'));
    }

    public function add_cme_categories()
    {
        return view('admin.cme-categories.add')->with('title', 'Add Category');
    }


    public function save_cme_categories(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cme_category = Activity_categories::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.cme_categories_listing')->with('notify_success', 'Category Added Successfuly!!');
    }



    public function edit_cme_categories($id)
    {
        $cme_category = Activity_categories::where('id', $id)->first();
        return view('admin.cme-categories.edit')->with('title', 'Edit Activity Categories')->with(compact('cme_category'));
    }
    public function update_cme_categories(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cme_category = Activity_categories::where('id', $request->id)->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.cme_categories_listing')->with('notify_success', 'Category Updated Successfuly!!');
    }
    public function suspend_cme_categories($id)
    {
        $cme_category = Activity_categories::where('id', $id)->first();
        if ($cme_category->is_active == 0) {
            $cme_category->is_active = 1;
            $cme_category->save();
            return redirect()->route('admin.cme_categories_listing')->with('notify_success', 'Category Activated Successfuly!!');
        } else {
            $cme_category->is_active = 0;
            $cme_category->save();
            return redirect()->route('admin.cme_categories_listing')->with('notify_success', 'Category Suspended Successfuly!!');
        }
    }

    public function delete_cme_categories($id)
    {
        $cme_category = Activity_categories::where('id', $id)->delete();
        return redirect()->route('admin.cme_categories_listing')->with('notify_success', 'Category Deleted Successfuly!!');
    }

    public function badges_management_listing()
    {
        $badges = Badges::get();
        return view('admin.badges-management.list')->with('title', 'Badges Management')->with(compact('badges'));
    }

    public function add_badges_management()
    {
        return view('admin.badges-management.add')->with('title', 'Add Badges');
    }


    public function save_badges_management(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_credit_hours' => 'required',
            'max_credit_hours' => 'required',
        ]);

        $badge = Badges::create([
            'name' => $request['name'],
            'min_credit_hours' => $request['min_credit_hours'],
            'max_credit_hours' => $request['max_credit_hours'],
        ]);
        return redirect()->route('admin.badges_management_listing')->with('notify_success', 'Badges Added Successfuly!!');
    }



    public function edit_badges_management($id)
    {
        $badge = Badges::where('id', $id)->first();
        return view('admin.badges-management.edit')->with('title', 'Edit Badges')->with(compact('badge'));
    }
    public function update_badges_management(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_credit_hours' => 'required',
        ]);

        $badge = Badges::where('id', $request->id)->update([
            'name' => $request['name'],
            'min_credit_hours' => $request['min_credit_hours'],
            'max_credit_hours' => $request['max_credit_hours'] ?? null,
        ]);

        return redirect()->route('admin.badges_management_listing')->with('notify_success', 'Badges Updated Successfuly!!');
    }
    public function suspend_badges_management($id)
    {
        $badge = Badges::where('id', $id)->first();
        if ($badge->is_active == 0) {
            $badge->is_active = 1;
            $badge->save();
            return redirect()->route('admin.badges_management_listing')->with('notify_success', 'Badges Activated Successfuly!!');
        } else {
            $badge->is_active = 0;
            $badge->save();
            return redirect()->route('admin.badges_management_listing')->with('notify_success', 'Badges Suspended Successfuly!!');
        }
    }

    public function delete_badges_management($id)
    {
        $badge = Badges::where('id', $id)->delete();
        return redirect()->route('admin.badges_management_listing')->with('notify_success', 'Badges Deleted Successfuly!!');
    }



    public function training_listing()
    {
        $trainings = Doctor_activity::all();
        return view('admin.trainings-management.list')->with('title', ' All Trainings')->with(compact('trainings'));
    }


    public function edit_training($id)
    {
        $categories = Activity_categories::where("is_active", 1)->get();
        $activity = Doctor_activity::where('id', $id)->first();
        return view('admin.trainings-management.edit')->with('title', 'Edit Training')->with(compact('activity', 'categories'));
    }


    public function change_training_status($id, Request $request)
    {
        // Find the activity record by its ID
        $activity = Doctor_activity::find($id);

        // Check if the activity exists
        if (!$activity) {
            return redirect()->route('admin.activity_listing')->with('notify_error', 'Training not found.');
        }

        // Validate the incoming status
        $newStatus = $request->input('status');

        // Ensure the new status is one of the allowed ENUM values
        if (!in_array($newStatus, ['pending', 'endorser_approved', 'admin_approved', 'on_hold', 'revised', 'declined'])) {
            return redirect()->route('admin.activity_listing')->with('notify_error', 'Invalid status.');
        }

        // Update the status and save the change
        $activity->training_status = $newStatus;
        $activity->save();

        // Redirect back to the activity listing with success message
        return redirect()->route('admin.training_listing')->with('notify_success', 'Training Status Updated Successfully!');
    }
    public function updateCreditHours($user_id)
    {

        $total_credit_hours = Doctor_activity::where("user_id", $user_id)
            ->pluck('credit_hours')
            ->map(function ($credit) {
                return (float)$credit; // Convert to float for accurate summation
            })
            ->sum();

        // Step 2: Determine the Appropriate Badge
        $badge = Badges::where('min_credit_hours', '<=', $total_credit_hours)
            ->where(function ($query) use ($total_credit_hours) {
                $query->where('max_credit_hours', '>=', $total_credit_hours)
                    ->orWhereNull('max_credit_hours');
            })
            ->orderBy('min_credit_hours', 'desc') // Ensure highest badge is selected
            ->first();

        if ($badge) {
            $user = User::where("id", $user_id)->first();
            $user->total_credit_hours = $total_credit_hours;
            $user->save();
        }
    }


    public function delete_training($id)
    {
        $doctors_experience = Doctor_activity::where('id', $id)->first();
        $doctors_experience->delete();
        // $this->updateCreditHours($doctors_experience->user_id);
        return redirect()->route('admin.training_listing')->with('notify_success', 'Training Deleted Successfuly!!');
    }
}
