<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Session;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Hash;
use App\Rules\PasswordMatch;
use App\Models\Imagetable;
use Illuminate\Support\MessageBag;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        $logo = Imagetable::where('table_name','logo')->latest()->first();
        View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
        //$this->middleware('auth');
    }
    public function get_login()
    {
       // Session::forget('message','Nikal Laude');
       //Session::flush();
       //Session::put('notify_error','Nikal Laude');
      // Auth::guard('admin')->logout();
       if(Auth::guard('admin')->check()){
           if(Auth::guard('admin')->user()->type == 1)
           {
               return redirect()->route('admin.dashboard')->with('notify_success','You are already logged in as Admin');
           }
           else
           {
                return redirect()->route('admin.listWebCrawl')->with('notify_success','You are already logged in as Admin');
           }
           
        
    }
    return view('admin.login')->with('title','Admin Login');
    }

    public function performLogin(Request $request, MessageBag $message_bag){
       // Session::flush();
      // Auth::guard('admin')->logout();
        if(Auth::guard('admin')->check()){
            
            if(Auth::guard('admin')->user()->type == 1)
           {
               return redirect()->route('admin.dashboard')->with('notify_success','You are already logged in as Admin');
           }
           else
           {
                return redirect()->route('admin.listWebCrawl')->with('notify_success','You are already logged in as Admin');
           }
        }
       // $validator = $request->validated();
        // $user = Admin::where('email',$request->email)->first();
        // if (!Hash::check($request->password, $user->password)) {
        //     $message_bag->add('password', 'Invalid Password');
        //     //dd($message_bag);
        //     return redirect()->back()->withInput($request->input())->with('notify_error','Invalid Credentials');
        // }
        
        if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
             if(Auth::guard('admin')->user()->type == 1)
           {
               return redirect()->route('admin.dashboard')->with('notify_success','You are already logged in as Admin');
           }
           else
           {
                return redirect()->route('admin.listWebCrawl')->with('notify_success','You are already logged in as Admin');
           }
            
        } else {
            return redirect()->back()->withInput($request->input())->with('notify_error','Invalid Credentials');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('notify_success','Logged Out!');
    }
}
