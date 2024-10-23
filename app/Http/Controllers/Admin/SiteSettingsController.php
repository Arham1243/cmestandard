<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Keywords;
use App\Models\Imagetable;
use App\Models\Config;
use App\Models\Content;
use Auth;

class SiteSettingsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        // View()->share('favicon',$favicon);
        View()->share('config', $this->getConfig());
        // $this->middleware('admin');
    }



    public function showLogo()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        return view('admin.logo-management')->with('title', 'Logo Management');
    }

    public function saveLogo(Request $request)
    {
        //dd(auth('admin')->user());
        // dd($request->all());
        $request->validate([
            'logo' => 'required',

        ]);

        $logo = request()->file('logo')->store('Uploads/Logo/' . auth('admin')->user()->id . rand() . rand(10, 100), 'public');

        $save_logo = Imagetable::create([
            'table_name' => 'logo',
            'img_path' => $logo,
        ]);
        return back()->with('notify_success', 'Logo Updated!');
    }

    public function socialInfo()
    {
        return view('admin.contact-social')->with('title', 'Contact / Social Info Management
        ');
    }

    public function saveSocialInfo(Request $request)
    {
        // $validator =  $request->validate([
        //     'FACEBOOK' => 'required',
        //     'INSTAGRAM' => 'required',
        //     'TWITTER' => 'required',
        //     'YOUTUBE' => 'required',
        //     'PINTEREST' => 'required',
        //     'COMPANYPHONE' => 'required',
        //     'COMPANYEMAIL' => 'required',
        //     'COMPANYADDRESS' => 'required',
        //     'SHIPPINGPRICE' => 'required',
        // ]);
        $config =  $request->except(['_token']);
        foreach ($config as $k => $v) {
            //dd($k);
            $conf = Config::updateOrCreate(
                [
                    'flag_type' => $k
                ],
                [
                    'flag_type' => $k,
                    'flag_value' => $v,
                    'flag_additionalText' => $v,
                ]
            );
        }
        //unset($config[0]->_token);
        //dd($config);
        return redirect()->route('admin.dashboard')->with('notify_success', 'Settings Updated!');
    }

    public function homeSlider()
    {
        $home_slider = Imagetable::where('type', 2)->get();
        return view('admin.home-slider.list')->with('title', 'Banner Management')->with(compact('home_slider'));
    }

    public function deletehomeSlider($id)
    {
        $img = Imagetable::where('id', $id)->delete();
        return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Deleted Successfuly!!');
    }

    public function addhomeSlider()
    {
        return view('admin.home-slider.add')->with('title', 'Add Banner');
    }

    public function createhomeSlider(Request $request)
    {
        $request->validate([
            'homeslider' => 'required',
            'table_name' => 'required',
            'headings' => 'required|max:255',
        ]);
        $banner_check  = Imagetable::where('table_name', $request->table_name)->first();
        if (!$banner_check) {
            $image = Imagetable::create(
                [
                    'table_name' => $request->table_name,
                    'type' => 2,
                    'is_active_img' => 1,
                    'headings' => $request->headings,
                    // 'type' => $request->type,
                    // 'description' => $request->description,
                ]
            );

            if (request()->hasFile('homeslider')) {
                $homeslider = request()->file('homeslider')->store('Uploads/homeslider/' . rand() . rand(10, 100), 'public');
                $image = imagetable::where('id', $image->id)->update(
                    [
                        'img_path' => $homeslider,
                    ]
                );
            }

            return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Uploaded!');
        } else {
            $image = imagetable::where('table_name', $request->table_name)->update(
                [
                    'table_name' => $request->table_name,
                    'type' => 2,
                    'is_active_img' => 1,
                    'headings' => $request->headings,
                    // 'type' => $request->type,
                    // 'description' => $request->description,
                ]
            );

            if (request()->hasFile('homeslider')) {
                $homeslider = request()->file('homeslider')->store('Uploads/homeslider/' . rand() . rand(10, 100), 'public');
                $image = imagetable::where('table_name', $request->table_name)->update(
                    [
                        'img_path' => $homeslider,
                    ]
                );
            }
            return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Updated!');
        }
    }

    public function edithomeSlider($id)
    {
        $home_slider = Imagetable::where('type', 2)->where('is_active_img', 1)->where('id', $id)->first();
        return view('admin.home-slider.edit')->with('title', 'Edit Banner')->with(compact('home_slider'));
    }

    public function updatehomeSlider(Request $request)
    {
        $image = imagetable::where('id', $request->id)->where('table_name', $request->table_name)->update(
            [
                'table_name' => $request->table_name,
                'type' => 2,
                'is_active_img' => 1,
                'headings' => $request->headings,
            ]
        );
        if (request()->hasFile('homeslider')) {
            $homeslider = request()->file('homeslider')->store('Uploads/banners/' . $request->id . rand() . rand(10, 100), 'public');

            $image = imagetable::where('id', $request->id)->update(
                [
                    'img_path' => $homeslider,
                ]
            );
        }
        return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Updated Successfuly!!');
    }

    public function suspendhomeSlider($id)
    {
        $img = Imagetable::where('type', 2)->where('id', $id)->first();
        if ($img->is_active_img == 0) {
            $img->is_active_img = 1;
            $img->save();
            return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Activated Successfuly!!');
        } else {
            $img->is_active_img = 0;
            $img->save();
            return redirect()->route('admin.homeSlider')->with('notify_success', 'Banner Suspended Successfuly!!');
        }
    }

    public function welcomeSlider()
    {
        $welcome_slider = Imagetable::where('table_name', 'welcome-slider')->where('type', 3)->get();
        return view('admin.welcome-slider.list')->with('title', 'Welcome Baner Management')->with(compact('welcome_slider'));
    }

    public function deletewelcomeSlider($id)
    {
        $img = Imagetable::where('id', $id)->where('table_name', 'welcome-slider')->delete();
        return redirect()->route('admin.welcomeSlider')->with('notify_success', 'Slider Deleted Successfuly!!');
    }

    public function addwelcomeSlider()
    {
        return view('admin.welcome-slider.add')->with('title', 'Welcome Baner Add');
    }

    public function createwelcomeSlider(Request $request)
    {

        $request->validate([
            'headings' => 'required|max:255',
            'subHeading' => 'required|max:255',
            'long_desc' => 'required',
            // 'video_link' => 'required',
        ]);

        $slider = Imagetable::create(
            [
                'table_name' => 'welcome-slider',
                'headings' => $request->headings,
                'subHeading' => $request->subHeading,
                'long_desc' => $request->long_desc,
                // 'video_link' => $request->video_link,
                'type' => 3,
                'is_active_img' => 1,
            ]
        );
        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/welcome-slider/thumbnails/' . $slider->id . rand() . rand(10, 100), 'public');
            $image = Imagetable::where('id', $slider->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.welcomeSlider')->with('notify_success', 'Slider Uploaded!');
    }

    public function editwelcomeSlider($id)
    {
        $welcome_slider = Imagetable::where('table_name', 'welcome-slider')->where('type', 3)->where('is_active_img', 1)->where('id', $id)->first();
        return view('admin.welcome-slider.edit')->with('title', 'Edit Slider')->with(compact('welcome_slider'));
    }

    public function updatewelcomeSlider(Request $request)
    {
        $request->validate([
            'headings' => 'required|max:255',
            'long_desc' => 'required',
            // 'video_link' => 'required',
            'subHeading' => 'required',
            'subtitle' => 'required',
        ]);
        $image = imagetable::where('id', $request->id)->where('table_name', 'welcome-slider')->update(
            [
                'headings' => $request->headings,
                'subHeading' => $request->subHeading,
                'long_desc' => $request->long_desc,
                'subtitle' => $request->subtitle,
                // 'video_link' => $request->video_link,
            ]
        );
        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/welcome-slider/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Imagetable::where('id', $request->id)->where('table_name', 'welcome-slider')->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }
        return redirect()->route('admin.welcomeSlider')->with('notify_success', 'Slider Updated Successfuly!!');
    }

    public function suspendwelcomeSlider($id)
    {
        $img = Imagetable::where('table_name', 'welcome-slider')->where('type', 3)->where('id', $id)->first();
        if ($img->is_active_img == 0) {
            $img->is_active_img = 1;
            $img->save();
            return redirect()->route('admin.welcomeSlider')->with('notify_success', 'Slider Activated Successfuly!!');
        } else {
            $img->is_active_img = 0;
            $img->save();
            return redirect()->route('admin.welcomeSlider')->with('notify_success', 'Slider Suspended Successfuly!!');
        }
    }

    public function cms()
    {
        $contents = Content::get();
        return view('admin.cms.list')->with(compact('contents'));
    }

    public function edit_cms($id)
    {
        $contents = Content::where('id', $id)->first();
        if ($contents) {
            return view('admin.cms.edit')->with(compact('contents'));
        } else {
            return redirect()->route('admin.cms')->with('notify_error', 'No Record Found!');
        }
    }

    public function update_cms(Request $request)
    {

        // dd($request->all());
        $contents = Content::where('id', $request->id)->update([
            'page_heading' => $request->page_heading,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'content4' => $request->content4,
            'content5' => $request->content5,
            'content6' => $request->content6,
            'content7' => $request->content7,
        ]);

        if (request()->hasFile('img1')) {
            $img1 = request()->file('img1')->store('Uploads/cms_images/' . $request->id . rand() . rand(10, 100), 'public');
            $image1 = Content::where('id', $request->id)->update(
                [
                    'img1' => $img1,

                ]
            );
        }

        if (request()->hasFile('img2')) {
            $img2 = request()->file('img2')->store('Uploads/cms_images/' . $request->id . rand() . rand(10, 100), 'public');
            $image2 = Content::where('id', $request->id)->update(
                [
                    'img2' => $img2,

                ]
            );
        }

        return redirect()->route('admin.cms')->with('notify_success', 'Content Updated!');
    }
}
