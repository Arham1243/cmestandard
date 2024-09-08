<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Imagetable;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Users_speciality_interests;
use App\Models\Users_speciality_areas;
use App\Models\Doctor_activity;
use App\Models\User;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;
use Imagick;


class IndexController extends Controller
{

    public $logo;
    public function __construct()
    {

        $logo = Imagetable::where('table_name', "logo")->latest()->first();
        $this->logo = $logo;
        $route = \Request::route()->getName();
        $banner = Imagetable::where('table_name', $route)->where('type', 2)->where('is_active_img', 1)->first();

        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
        View()->share('banner', $banner);
    }

    public function about_us()
    {
        return view('about-us')->with('title', 'About Us');
    }


    public function faqs()
    {
        $faqs = Faq::where("is_active", 1)->limit(6)->get();
        return view('faqs')->with('title', 'Faqs')->with(compact('faqs'));
    }



    public function objectives_of_cme()
    {
        return view('objectives-of-cme')->with('title', 'Objectives of CME');
    }
    public function patient_care()
    {
        return view('patient-care')->with('title', 'CME for Improved Patient Care');
    }
    public function career_advancement()
    {
        return view('career-advancement')->with('title', 'CME for Career Advancement');
    }

    public function login()
    {
        return view('login')->with('title', 'Login');
    }

    public function sign_up()
    {
        $speciality_interests = Users_speciality_interests::where("is_active", 1)->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)->get();

        $data = compact('speciality_interests', 'speciality_areas');
        return view('sign-up')->with('title', 'Sign Up')->with($data);
    }

    public function why_accredited()
    {
        return view('why-accredited')->with('title', 'Why accredited CMEs');
    }

    public function why_cme()
    {
        return view('why-cme')->with('title', 'Why Cme');
    }


    public function home()
    {
        $testimonials = Testimonial::where("is_active", 1)->latest()->get();
        $welcome_slider = Imagetable::where("table_name", 'welcome-slider')->where("is_active_img", 1)->latest()->first();


        $faqs = Faq::where("is_active", 1)->limit(6)->latest()->get();

        $data = compact('testimonials', 'faqs', 'welcome_slider');
        return view('index')->with('title', 'Home')->with($data);
    }


    public function privacy_policy()
    {
        return view('privacy-policy')->with('title', 'Privacy Policy');
    }
    public function terms_and_conditions()
    {
        return view('terms-and-conditions')->with('title', 'Terms And Conditions');
    }
    public function refund_policy()
    {
        return view('refund-policy')->with('title', 'Refund Policy');
    }
    public function doctor_profile($slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($slug && $user) {
            $trainings = Doctor_activity::where("user_id", $user->id)->whereIn("training_status", ['endorser_approved', 'admin_approved'])->get();
            $data = compact('user', 'trainings');
            return view('doctor-profile')->with('title', $user->full_name)->with($data);
        }
        return redirect()->route('home')->with('notify_error', 'Page Not Found');
    }
    public function doctor_profile_new($slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($slug && $user) {
            $trainings = Doctor_activity::where("user_id", $user->id)->paginate(5);
            $data = compact('user', 'trainings');
            return view('doctor-profile-new')->with('title', $user->full_name)->with($data);
        }
        return redirect()->route('home')->with('notify_error', 'Page Not Found');
    }

    public function change_training_status($id, Request $request)
    {
        $activity = Doctor_activity::find($id);

        if (!$activity) {
            return redirect()->route('admin.activity_listing')->with('notify_error', 'Training not found.');
        }

        $newStatus = $request->input('status');

        if (!in_array($newStatus, ['pending', 'endorser_approved', 'admin_approved', 'on_hold', 'revised', 'declined'])) {
            return redirect()->route('admin.activity_listing')->with('notify_error', 'Invalid status.');
        }

        $activity->training_status = $newStatus;
        $activity->save();

        $user = User::where("id", $activity->user_id)->first();
        $admin = Admin::first();

        $data = [
            'user' => $user,
            'training' => $activity,
            'logo' => $this->logo,
        ];

        try {
            // Send email to user
            Mail::send('email.training-approval-update-user', $data, function ($message) use ($user) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($user->email);
                $message->subject('Training Approval Notification');
            });

            // Send email to admin
            Mail::send('email.training-approval-update-admin', $data, function ($message) use ($admin) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($admin->email);
                $message->subject('Training Approval Notification');
            });
        } catch (\Exception $e) {
            // If email fails, dump the error
            dd('Error sending email: ', $e->getMessage());
        }

        return redirect()->route('home')->with('notify_success', 'Training approved successfully!');
    }


   public function doctor_profile_download_pdf(Request $request)
{
    if ($request->hasFile('screenshot')) {
        $screenshot = $request->file('screenshot');
        

        $imageData = file_get_contents($screenshot->getRealPath());
        $imageMimeType = $screenshot->getClientMimeType(); // e.g., image/png

        // Encode the image data to Base64
        $base64Image = base64_encode($imageData);

        // Create the Data URL
        $dataUrl = 'data:' . $imageMimeType . ';base64,' . $base64Image;

        // Get the doctor's name from the request
        $doctorName = $request->input('doctor_name', 'doctor-profile');

        // Generate the PDF
        $dompdf = new Dompdf();
        $html = '<html><body style="margin:0; padding:0; height:100vh; width:100vw;">';
        $html .= '<img src="' . $dataUrl . '" style="width:100%; object-fit: contain; display:block;" />';
        $html .= '</body></html>';

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream the PDF to the browser with a dynamic filename
        return $dompdf->stream($doctorName . '.pdf', ['Attachment' => false]);
    } else {
        return response()->json(['error' => 'No screenshot uploaded'], 400);
    }
}

    // -----------All View Pages-------------

}
