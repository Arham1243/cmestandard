<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Wishlist;
use App\Models\Config;
use App\Models\Review;
use App\Models\Products;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Newsletter;

use App\Models\Password_resets;
use Illuminate\Support\Facades\Auth;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Contest_participants;
use App\Models\Quote;

use App\Traits\MyTrait;

class UserController extends Controller
{
    use MyTrait;
    public $logo;
    public function __construct()
    {
        $logo = Imagetable::where('table_name', "logo")->latest()->first();
        $this->logo = $logo;
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
        $route = \Request::route()->getName();
        $banner = Imagetable::where('table_name', $route)->where('type', 2)->where('is_active_img', 1)->first();
        View()->share('banner', $banner);
    }

    public function login_submit(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return redirect()->route('doctor_profile', Auth::user()->slug)->with('notify_success', 'Logged In!');
        } else {
            return back()->with('notify_error', 'Invalid Credentials');
        }
    }


    public function signup_submit(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'academic_title' => 'required',
            'full_name' => 'required',
            'speciality_area_id' => 'required',
            'speciality_interest_id' => 'required',
            'qualification' => 'required',
            'institution_name' => 'required',
            'institution_city' => 'required',
            'birthday' => 'required|date',
            'profile_img' => 'required|image',
            'country_id_num' => 'required',
            'country' => 'required',
            'medical_license_number' => 'required',
        ]);

        // Generate a slug for the user
        $slug = $this->slug_maker($request->input('full_name'), User::class);

        // Get the last custom_id, or set to 999 if there are no users yet
        $lastCustomId = User::max('custom_id') ?? 999;
        $newCustomId = $lastCustomId + 1;

        // Create the user with the incremented custom_id
        $user = User::create([
            'slug' => $slug,
            'password' => bcrypt($request['password']),
            'password_sample' => $request['password'],
            'academic_title' => $request['academic_title'],
            'full_name' => $request['full_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'speciality_area_id' => $request['speciality_area_id'],
            'speciality_interest_id' => $request['speciality_interest_id'],
            'qualification' => $request['qualification'],
            'institution_name' => $request['institution_name'],
            'institution_city' => $request['institution_city'],
            'birthday' => $request['birthday'],
            'country_id_num' => $request['country_id_num'],
            'country' => $request['country'],
            'medical_license_number' => $request['medical_license_number'],
            'custom_id' => $newCustomId,
        ]);

        // Handle profile image upload if provided
        if (request()->hasFile('profile_img')) {
            $avatar = request()->file('profile_img')->store('Uploads/User/Profile/' . $user->id . rand() . rand(10, 100), 'public');
            $image = User::where('id', $user->id)->update(
                [
                    'profile_img' => $avatar,
                ]
            );
        }


        Auth::login($user);

        try {
            Mail::send('email.welcome-user', [
                'user' => $user,
                'logo' => $this->logo
            ], function ($message) use ($request) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($request->email);
                $message->subject('Welcome To ' . env('APP_NAME'));
            });

            $user->is_welcome_email_sent = 1;
            $user->save();
        } catch (\Throwable $th) {
            \Log::error('Error sending welcome email: ' . $th->getMessage());
        }


        return redirect()->route('home')->with('notify_success', 'Signup successfully');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('notify_success', 'Logged Out!');
    }



    public function contact_us_submit(Request $request)
    {
        $validator = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $inquiry = Inquiry::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'message' => $request['message'],
            'phone' => $request['phone'],
            'subject' => $request['subject']
        ]);

        return redirect()->route('welcome')->with('notify_success', 'Inquiry Submitted!');
    }

    public function newsletter_submit(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email|max:255|',
        ]);


        $newsletter = Newsletter::create([
            'email' => $request['email'],
        ]);

        return redirect()->route('welcome')->with('notify_success', 'Request Submitted!');
    }

    public function forget_password()
    {
        return view('forgot-password')->with('title', 'Forgot Password');
    }
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.reset-password', ['token' => $token, 'request' => $request, 'logo' => $this->logo], function ($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('forgot-password-message', ['email' => $request->email])->with('notify_success', 'We have e-mailed your password reset link!');
    }

    public function forgot_password_message(Request $request)
    {
        $email = $request->input('email');
        if (password_resets::where('email', $email)->first()) {
            return view('forgot-password-message', compact('email'))->with('title', 'Forgot Password');
        }
        return redirect()->route('home')->with('notify_error', 'Page Not Found');
    }
    public function forget_password_token($token)
    {
        $reset_email =  password_resets::where('token', $token)->first();
        if ($reset_email != null) {

            return view('forgot-password-form', ['token' => $token, 'email' => $reset_email])->with(compact('reset_email'))->with('title', 'Reset Password');
        } else {
            return redirect()->route('welcome')->with('notify_error', 'Inavlid Token');
        }
    }


    public function forget_password_reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->latest()->first();

        if (!$updatePassword) {
            return back()->withInput()->with('notify_error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect()->route('login')->with('notify_success', 'Your password has been changed!');
    }



    public function addToWishlist(Request $request)
    {
        $product = Products::where('id', $request['productid'])->where('is_active', 1)->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->first();
        if (isset($wishlist) && !empty($wishlist)) {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->delete();
            $param = ['status' => 2, 'msg' => 'Product Removed From Wishlist'];
            return response()->json($param);
        } else {
            $wishlist = Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'img_path' => $product->img_path,
                'slug' => $product->slug,
            ]);
            $param = ['status' => 1];
            return response()->json($param);
        }
    }

    public function removeFromWishlist(Request $request)
    {
        $wishlist = Wishlist::where('product_id', $request->productid)->where('user_id', Auth::id())->delete();
        $param = array();
        $param = ['status' => 1, 'msg' => 'Product Removed From Wishlist'];
        echo json_encode($param);
    }




    public function participant_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);




        $contest_participant = Contest_participants::create([
            'name' => $request['name'],
            'contest_id' => $request['contest_id'],
            'user_id' => $request['user_id'],
        ]);

        if ($request->hasFile('img_path')) {
            $img_path = $request->file('img_path')->store('uploads/contest/participants/design-images', 'public');
            Contest_participants::where('id', $contest_participant->id)->update([
                'img_path' => $img_path
            ]);
        }


        return redirect()->route('welcome')->with('notify_success', 'You have been added as a participant.');
    }




    public function quote_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string',
            'address' => 'required|string',
            'other_address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'h_phone' => 'required|string',
            'phone' => 'required|string',
            'contact_method' => 'required|string',
            // 'e_date' => 'required|string',
            'e_location' => 'required|string',
            'about_us' => 'required|string',
            'e_planning' => 'required|string',
            'persons' => 'required|string',
            'message' => 'required|string',
            // 'd_date' => 'required|string',
            // 'd_time' => 'required|string',
            'pickup' => 'required|string',
            // 'p_time' => 'required|string',
        ]);

        $quote = Quote::create([
            'name' => $request['name'],
            'company_name' => $request['company_name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'other_address' => $request['other_address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'email' => $request['email'],
            'h_phone' => $request['h_phone'],
            'contact_method' => $request['contact_method'],
            'e_date' => $request['e_date'],
            'e_location' => $request['e_location'],
            'about_us' => $request['about_us'],
            'e_planning' => $request['e_planning'],
            'persons' => $request['persons'],
            'message' => $request['message'],
            'd_date' => $request['d_date'],
            'd_time' => $request['d_time'],
            'pickup' => $request['pickup'],
            'p_time' => $request['p_time'],
        ]);

        return redirect()->route('welcome')->with('notify_success', 'Quotation Inquiry Submitted!');
    }
}
