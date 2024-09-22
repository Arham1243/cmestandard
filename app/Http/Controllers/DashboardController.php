<?php

namespace App\Http\Controllers;

use App\Models\Imagetable;
use App\Models\Doctor_activity;
use App\Models\Activity_categories;
use Illuminate\Http\Request;
use App\Models\User_badge;
use App\Models\Users_speciality_interests;
use App\Models\Users_speciality_areas;
use App\Models\Badges;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public $logo;
    public $durations;
    public function __construct()
    {
        $this->middleware('auth');
        $logo = imagetable::where('table_name', 'logo')->latest()->first();
        $durations = [
            'Half Day',
            '1 Day',
            '2 Days',
            '3 Days',
            '4 Days',
            '5 Days',
            '6 Days',
            'upto',
            '21 Days',
            '1 Month',
            '2 Months',
            '3 Months',
            '4 Months',
            '5 Months',
            '6 Months',
            '9 Months',
            '1 Year',
            'Other',
        ];
        $this->logo = $logo;
        $this->durations = $durations;

        $user = User::where('id', Auth::id())->first();
        View()->share('logo', $logo);
        View()->share('durations', $durations);
        View()->share('user', $user);
        View()->share('config', $this->getConfig());
    }

    public function dashboard()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.index')->with('title', 'My Dashboard')->with(compact('user'))
            ->with('dashMenu', true);
    }

    public function myProfile()
    {
        $user = User::where('id', Auth::id())->first();
        $speciality_interests = Users_speciality_interests::where("is_active", 1)->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)->get();
        return view('userdash.dashboard.myprofile')->with('title', 'My Profile')->with(compact('user', 'speciality_interests', 'speciality_areas'))
            ->with('myProfileMenu', true);
    }

    public function editprofile()
    {
        $user = User::where('id', Auth::id())->first();
        $speciality_interests = Users_speciality_interests::where("is_active", 1)
            ->orderBy('name', 'asc')
            ->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)
            ->orderBy('name', 'asc')
            ->get();

        return view('userdash.dashboard.edit-profile')->with('title', 'Edit Profile')->with(compact('user', 'speciality_interests', 'speciality_areas'))
            ->with('myProfileMenu', true);
    }

    public function saveprofile(Request $request)
    {
        $jsonLanguages = json_encode($request->languages);

        $user = User::where('id', Auth::id())->update([
            'qualification' => $request['qualification'],
            'academic_title' => $request['academic_title'],
            'institution_name' => $request['institution_name'],
            'phone_show_on_profile' => isset($request['phone_show_on_profile']) ? $request['phone_show_on_profile'] : 0,
            'email_show_on_profile' => isset($request['email_show_on_profile']) ? $request['email_show_on_profile'] : 0,
            'institution_city' => $request['institution_city'],
            'birthday' => $request['birthday'],
            'full_name' => $request->full_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'bio' => $request->bio,
            'long_desc' => $request->long_desc,
            'years_of_exp' => $request->years_of_exp,
            'patients_treated' => $request->patients_treated,
            'procedures_performed' => $request->procedures_performed,
            'languages' => $jsonLanguages,
            'country_id_num' => $request['country_id_num'],
            'country' => $request['country'],
            'medical_license_number' => $request['medical_license_number'],
            'speciality_area_id' => $request['speciality_area_id'],
            'speciality_interest_id' => $request['speciality_interest_id'],
        ]);

        if (request()->hasFile('avatar')) {
            $avatar = request()->file('avatar')->store('Uploads/User/avatar' . $request->id . rand() . rand(10, 100), 'public');
            $image = User::where('id', $request->id)->update(

                [

                    'profile_img' => $avatar,

                ]
            );
        }
        return redirect()->route('dashboard.editProfile')->with('notify_success', 'Profile Updated!');
    }


    public function passwordchange()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.password-change')->with('title', 'Change Password')->with(compact('user'))->with('passChangeMenu', true);
    }

    public function updatepassword(Request $request)
    {
        $validator = $request->validate([
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = User::where('id', Auth::id())->first();
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->route('dashboard.editProfile')->with('notify_success', 'Password Updated Successfully!');
    }

    public function activity_listing(Request $request)
    {
        $query = Doctor_activity::where("user_id", Auth::user()->id);

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('speciality_area_id') && $request->speciality_area_id) {
            $query->where('speciality_area_id', $request->speciality_area_id);
        }

        $doctors_experience = $query->get();

        $categories = Activity_categories::where("is_active", 1)->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)->get();

        return view('userdash.dashboard.doctor-experience.list')
            ->with('title', ' My CME Trainings')
            ->with(compact('doctors_experience', 'categories', 'speciality_areas'));
    }


    public function add_activity()
    {
        $categories = Activity_categories::where("is_active", 1)->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)->get();
        return view('userdash.dashboard.doctor-experience.add')->with('title', 'Add My CME Training')->with(compact('categories', 'speciality_areas'));
    }


    public function save_activity(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer',
            'speciality_area_id' => 'nullable',
            'provider' => 'nullable|string|max:255',
            'format' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'duration' => 'nullable',
            'in_person_location' => 'nullable|string|max:255',
            'grand_provide' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'credit_hours' => 'nullable|numeric',
            'endorser_name' => 'nullable|string|max:255',
            'endorser_title' => 'nullable|string|max:255',
            'endorser_hospital' => 'nullable|string|max:255',
            'endorser_city' => 'nullable|string|max:255',
            'endorser_country' => 'nullable|string|max:255',
            'endorser_email' => 'nullable|email|max:255',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust file validation as needed
        ]);

        // Retrieve user activities for the logged-in user
        $user_activities = Doctor_activity::where("user_id", Auth::user()->id)->get();

        // Get the user's custom_id
        $user_custom_id = Auth::user()->custom_id;

        // Count the number of user activities
        $activities_count = $user_activities->count();

        // Increment the count by 1 for the new activity
        $incremented_count = $activities_count + 1;

        // Format the count with leading zeros, adjusting for the number of digits
        $padding_length = 2; // Use 2 digits for formatting, change if needed
        $formatted_count = str_pad($incremented_count, $padding_length, '0', STR_PAD_LEFT);

        // Combine custom_id with formatted count
        $activity_custom_id = $user_custom_id . $formatted_count;



        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['custom_id'] = $activity_custom_id;
        $activity = Doctor_activity::create($validatedData);

        // Handle file upload if present
        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $certificatePath = $file->store('Uploads/User/activity/certificate/' . $activity->id . rand() . rand(10, 100), 'public');

            // Update the activity with the certificate path
            $activity->update(['certificate' => $certificatePath]);
        }

        // $this->updateCreditHours();
        $user = Auth::user();

        $data = [
            'user' => $user,
            'training' => $activity,
            'logo' => $this->logo,
        ];


        try {
            Mail::send('email.endorser-approval', $data, function ($message) use ($activity) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($activity->endorser_email);
                $message->subject('CME Attendance Confirmation');
            });
        } catch (\Exception $e) {
            // If email fails, dump the error
            dd('Error sending email: ' . $e->getMessage());
        }


        return redirect()->route('dashboard.activity_listing')->with('notify_success', 'CME Training Added Successfully!!');
    }


    public function updateCreditHours()
    {

        $total_credit_hours = Doctor_activity::where("user_id", Auth::user()->id)
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
            $user = Auth::user();
            $user->total_credit_hours = $total_credit_hours;
            $user->save();
        }
    }




    public function edit_activity($id)
    {
        $categories = Activity_categories::where("is_active", 1)->get();
        $speciality_areas = Users_speciality_areas::where("is_active", 1)->get();
        $activity = Doctor_activity::where('id', $id)->first();
        return view('userdash.dashboard.doctor-experience.edit')->with('title', 'Edit My CME Training')->with(compact('activity', 'categories', 'speciality_areas'));
    }
    public function update_activity(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer',
            'speciality_area_id' => 'nullable',
            'provider' => 'nullable|string|max:255',
            'format' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'duration' => 'nullable',
            'in_person_location' => 'nullable|string|max:255',
            'grand_provide' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'credit_hours' => 'nullable|numeric',
            'endorser_name' => 'nullable|string|max:255',
            'endorser_title' => 'nullable|string|max:255',
            'endorser_hospital' => 'nullable|string|max:255',
            'endorser_city' => 'nullable|string|max:255',
            'endorser_country' => 'nullable|string|max:255',
            'endorser_email' => 'nullable|email|max:255',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust file validation as needed
        ]);

        // Find the activity by ID
        $activity = Doctor_activity::findOrFail($id);

        // Update the activity with validated data
        $activity->update($validatedData);

        // Handle file upload if present
        if ($request->hasFile('certificate')) {
            // Delete the old certificate if it exists
            if ($activity->certificate) {
                Storage::disk('public')->delete($activity->certificate);
            }

            $file = $request->file('certificate');
            $certificatePath = $file->store('Uploads/User/activity/certificate/' . $activity->id . rand() . rand(10, 100), 'public');

            // Update the activity with the new certificate path
            $activity->update(['certificate' => $certificatePath]);
        }


        // $this->updateCreditHours();

        // Redirect with success message
        return redirect()->route('dashboard.activity_listing')->with('notify_success', 'Trainings Updated Successfully!');
    }



    public function delete_activity($id)
    {
        $doctors_experience = Doctor_activity::where('id', $id)->delete();
        // $this->updateCreditHours();
        return redirect()->route('dashboard.activity_listing')->with('notify_success', 'Training Deleted Successfuly!!');
    }


    public function analytics()
    {
        // Specialty data
        $specialtyTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('speciality_area_id')
            ->with(['speciality' => function ($query) {
                $query->whereNotNull('name');
            }])
            ->get()
            ->groupBy('speciality_area_id')
            ->map(function ($group) {
                if ($group->first()->speciality) {
                    return [
                        'speciality_name' => $group->first()->speciality->name,
                        'total_trainings' => $group->count(),
                    ];
                }
            })->filter();

        // Category data
        $categoryTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('category_id')
            ->with(['category' => function ($query) {
                $query->whereNotNull('name');
            }])
            ->get()
            ->groupBy('category_id')
            ->map(function ($group) {
                if ($group->first()->category) {
                    return [
                        'category_name' => $group->first()->category->name,
                        'total_trainings' => $group->count(),
                    ];
                }
            })->filter();

        // Format data
        $formatTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('format')
            ->get()
            ->groupBy('format')
            ->map(function ($group) {
                return [
                    'format_name' => $group->first()->format,
                    'total_trainings' => $group->count(),
                ];
            })->filter();

        // Type data
        $typeTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('type')
            ->get()
            ->groupBy('type')
            ->map(function ($group) {
                return [
                    'type_name' => $group->first()->type,
                    'total_trainings' => $group->count(),
                ];
            })->filter();

        // Content data
        $contentTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('content')
            ->get()
            ->groupBy('content')
            ->map(function ($group) {
                return [
                    'content_name' => $group->first()->content,
                    'total_trainings' => $group->count(),
                ];
            })->filter();

        // Status data
        $statusTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('status')
            ->get()
            ->groupBy('status')
            ->map(function ($group) {
                return [
                    'status_name' => $group->first()->status,
                    'total_trainings' => $group->count(),
                ];
            })->filter();

        $creditHoursTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('credit_hours')
            ->get()
            ->map(function ($activity) {
                return [
                    'activity_title' => $activity->title,
                    'credit_hours' => $activity->credit_hours,
                ];
            });
        $allDurations = $this->durations;

        // Fetch user's trainings grouped by duration
        $durationTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereNotNull('duration')
            ->get()
            ->groupBy('duration')
            ->mapWithKeys(function ($group) {
                return [
                    $group->first()->duration => $group->count(),
                ];
            });

        // Combine all durations with the user's durationTrainings
        $durationData = collect($allDurations)->map(function ($duration) use ($durationTrainings) {
            return [
                'duration' => $duration,
                'total_trainings' => $durationTrainings->get($duration, 0), // Show 0 if no trainings
            ];
        });

        $currentYear = isset($_GET['year']) ? $_GET['year'] : Carbon::now()->year;
        $currentYearForYearly =  Carbon::now()->year;

        // Fetch activities for the current user, grouped by month for the current year
        $monthlyTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereYear('created_at', $currentYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total_trainings')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->keyBy('month') // Key by month for easy access
            ->toArray();

        // Create an array for all months, initializing counts to zero
        $allMonths = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthName = Carbon::create(null, $month, 1)->format('F');
            $totalTrainings = $monthlyTrainings[$month]['total_trainings'] ?? 0; // Get count or default to 0
            $allMonths[] = [
                'month' => $monthName,
                'total_trainings' => $totalTrainings
            ];
        }


        // Fetch user registration year
        $userRegistrationYear = User::where("id", Auth::user()->id)
            ->first()
            ->created_at->year;


        $userRegisteredYears  = range($userRegistrationYear, $currentYearForYearly);

        // Fetch activities for the current user, grouped by year
        $yearlyTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->selectRaw('YEAR(created_at) as year, COUNT(*) as total_trainings')
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get()
            ->keyBy('year') // Key by year for easy access
            ->toArray();

        // Create an array for all years from registration year to current year
        $allYears = [];
        for ($year = $userRegistrationYear; $year <= $currentYearForYearly; $year++) {
            $totalTrainings = $yearlyTrainings[$year]['total_trainings'] ?? 0; // Get count or default to 0
            $allYears[] = [
                'year' => $year,
                'total_trainings' => $totalTrainings
            ];
        }

        // Fetch training counts by month
        $monthlyTrainings = Doctor_activity::where("user_id", Auth::user()->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->whereYear('created_at', $currentYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total_trainings')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->keyBy('month')
            ->toArray();

        // Prepare quarterly data with month details
        $allQuarters = [];
        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
        $quarters = [
            'Q1' => [1, 2, 3],
            'Q2' => [4, 5, 6],
            'Q3' => [7, 8, 9],
            'Q4' => [10, 11, 12],
        ];

        foreach ($quarters as $quarter => $months) {
            $totalTrainings = 0;
            $monthDetails = [];

            foreach ($months as $month) {
                $monthCount = $monthlyTrainings[$month]['total_trainings'] ?? 0;
                $totalTrainings += $monthCount;
                $monthDetails[$monthNames[$month]] = $monthCount; // Use month name as key
            }

            $allQuarters[] = [
                'quarter' => $quarter,
                'total_trainings' => $totalTrainings,
                'month_details' => $monthDetails, // Store as an associative array
            ];
        }

        return view('userdash.dashboard.analytics.charts', [
            'title' => 'Analytics',
            'specialtyTrainings' => $specialtyTrainings,
            'categoryTrainings' => $categoryTrainings,
            'formatTrainings' => $formatTrainings,
            'typeTrainings' => $typeTrainings,
            'contentTrainings' => $contentTrainings,
            'statusTrainings' => $statusTrainings,
            'creditHoursTrainings' => $creditHoursTrainings,
            'durationTrainings' => $durationData,
            'monthlyTrainings' => $allMonths,
            'yearlyTrainings' => $allYears,
            'currentYear' => $currentYear,
            'currentYearForYearly' => $currentYearForYearly,
            'userRegistrationYear' => $userRegistrationYear,
            'allQuarters' => $allQuarters,
            'userRegisteredYears' => $userRegisteredYears,
        ]);
    }
}
