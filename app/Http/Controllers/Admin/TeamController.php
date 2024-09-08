<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Crawls;
use App\Models\Keywords;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Lesson;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Album;
use App\Models\Photos;
use App\Models\Team;
use App\Models\Matches;
use App\Models\Sub_category;
use Auth;
use App\Models\Faq;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class TeamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = Imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
        // $this->middleware('admin');
    }

    public function team_listing()
    {
        $team = Team::get();
        return view('admin.team-management.list')->with('title','Team Management')->with('team_menu',true)->with(compact('team'));
    }

    public function add_team()
    {
        return view('admin.team-management.add')->with('title','Add Team')->with('team_menu',true);
    }

    public function create_team(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required',
            // 'short_desc' => 'required',
            // 'description' => 'required',
            // 'thumbnails' => 'required',
        ]);  

    //  $check_slug = Blog::where('slug',$request->slug)->where('id','!=',$request->id)->first();
    //     if($check_slug)
    //     {
    //         return back()->with('notify_error','Unique Slug Is Required!')->withInput(); 
    //     }
       //dd($check_slug);
        $team = Team::create([
            'name' => $request['title'],
            // 'slug' => $request['slug'],
            // 'short_desc' => $request['description'],
            // 'long_desc' => $request['description'],
            
           
        ]);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/team/thumbnails/'.$team->id.rand().rand(10,100), 'public');
        //     $image = Team::where('id', $team->id)->update (
        //      [
        //      'img_path' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.team_listing')->with('notify_success','Team Created Successfuly!!');
    }

    public function edit_team($id)
    {
        $team = Team::where('id',$id)->first();
        return view('admin.team-management.edit')->with('title','Edit Team')->with('team_menu',true)->with(compact('team'));
    }

    public function saveteam(Request $request)
    {
    //    dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required',
            // 'short_desc' => 'required',
            // 'description' => 'required',
            
            
        ]);  
        
        //  $check_slug = Blog::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        // if($check_slug)
        // {
        //     return back()->with('notify_error','Unique Slug Is Required!'); 
        // }
        //dd($check_slug);
        
        $team = Team::where('id',$request->id)->update([
            'name' => $request['title'],
            // 'slug' => $request['slug'],
            // 'short_desc' => $request['short_desc'],
            // 'long_desc' => $request['description'],
        ]);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/team/thumbnails/'.$request->id.rand().rand(10,100), 'public');
        //     $image = Team::where('id',$request->id)->update(
        //      [

        //      'img_path' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.team_listing')->with('notify_success','Team Updated Successfuly!!');
    }

    
    public function suspend_team($id)
    {
        $team = Team::where('id',$id)->first();
        if($team->is_active == 0)
        {
            $team->is_active= 1;
            $team->save();
            return redirect()->route('admin.team_listing')->with('notify_success','Team Activated Successfuly!!');
        }
        else{
            $team->is_active= 0;
            $team->save();
            return redirect()->route('admin.team_listing')->with('notify_success','Team Suspended Successfuly!!');
        }
    }

    public function delete_team($id)
    {
        $team = Team::where('id',$id)->delete();
        return redirect()->route('admin.team_listing')->with('notify_success','Team  Deleted Successfuly!!');
       
    }


    public function matches_listing()
    {
        $matches = Matches::latest()->get();
        return view('admin.matches-management.list')->with('title','Matches Management')->with('matches_menu',true)->with(compact('matches'));
    }

    public function add_matches()
    {
        $teams = Team::where('is_active',1)->get();
        return view('admin.matches-management.add')->with('title','Add Matches')->with(compact('teams'))->with('matches_menu',true);
    }

    public function create_matches(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'team1' => 'required',
            'team2' => 'required',
            'dated' => 'required',
            'broadcast' => 'required',
            'match_type' => 'required',
            'thumbnails' => 'required',
            // 'slug' => 'required',
            // 'short_desc' => 'required',
            // 'description' => 'required',
            // 'thumbnails' => 'required',
        ]);  

    //  $check_slug = Blog::where('slug',$request->slug)->where('id','!=',$request->id)->first();
    //     if($check_slug)
    //     {
    //         return back()->with('notify_error','Unique Slug Is Required!')->withInput(); 
    //     }
       //dd($check_slug);
        $matches = Matches::create([
           
            'match_type' => $request['match_type'],            
            'team1_id' => $request['team1'],
            'team2_id' => $request['team2'],
            'dated' => $request['dated'],
            'broadcast' => $request['broadcast'],
            'live_stream' => $request['live_stream']
         
        ]);

        if(request()->hasFile('thumbnails')){
            $thumbnail = request()->file('thumbnails')->store('Uploads/matches/thumbnails/'.$matches->id.rand().rand(10,100), 'public');
            $image = Matches::where('id', $matches->id)->update (
             [
             'img_path' => $thumbnail,
         ]);
          }

          return redirect()->route('admin.matches_listing')->with('notify_success','Match Created Successfuly!!');
    }

    public function edit_matches($id)
    {
        $matches = Matches::where('id',$id)->first();
        $teams = Team::where('is_active',1)->get();
        return view('admin.matches-management.edit')->with('title','Edit Matches')->with('matches_menu',true)->with(compact('matches','teams'));
    }

    public function savematches(Request $request)
    {
    //   dd($request->all());

    $request->validate([
        'match_type' => 'required',
        'team1' => 'required',
        'team2' => 'required',
        'dated' => 'required',
        'broadcast' => 'required',
       
       
        // 'slug' => 'required',
        // 'short_desc' => 'required',
        // 'description' => 'required',
        // 'thumbnails' => 'required',
    ]);  
        
        //  $check_slug = Blog::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        // if($check_slug)
        // {
        //     return back()->with('notify_error','Unique Slug Is Required!'); 
        // }
        //dd($check_slug);
        
        $matches = Matches::where('id',$request->id)->update([
            'match_type' => $request['match_type'],     
            'team1_id' => $request['team1'],
            'team2_id' => $request['team2'],
            'dated' => $request['dated'],
            'broadcast' => $request['broadcast'],
            'live_stream' => $request['live_stream']
            // 'slug' => $request['slug'],
            // 'short_desc' => $request['short_desc'],
            // 'long_desc' => $request['description'],
        ]);

        if(request()->hasFile('thumbnails')){
            $thumbnail = request()->file('thumbnails')->store('Uploads/matches/thumbnails/'.$request->id.rand().rand(10,100), 'public');
            $image = Matches::where('id',$request->id)->update(
             [

             'img_path' => $thumbnail,
         ]);
          }

          return redirect()->route('admin.matches_listing')->with('notify_success','Match Updated Successfuly!!');
    }

    
    public function suspend_matches($id)
    {
        $matches = Matches::where('id',$id)->first();
        if($matches->is_active == 0)
        {
            $matches->is_active= 1;
            $matches->save();
            return redirect()->route('admin.matches_listing')->with('notify_success','Match Activated Successfuly!!');
        }
        else{
            $matches->is_active= 0;
            $matches->save();
            return redirect()->route('admin.matches_listing')->with('notify_success','Match Suspended Successfuly!!');
        }
    }

    public function delete_matches($id)
    {
        $matches = Matches::where('id',$id)->delete();
        return redirect()->route('admin.matches_listing')->with('notify_success','Match  Deleted Successfuly!!');
       
    }


    



}
