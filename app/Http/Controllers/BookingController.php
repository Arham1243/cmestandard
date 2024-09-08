<?php

namespace App\Http\Controllers;
use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\News;
use App\Models\Content;
use App\Models\Keywords;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Album;
use App\Models\Photos;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Matches;
use App\Models\Team;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Country;
use App\Models\OrderDetail;
use App\Models\Merchandise;
use App\Models\Color;
use App\Models\Booking;
use Auth;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
class BookingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
    }

    public function product_booking($slug)
    {
        $product = Products::where('is_active',1)->where('slug',$slug)->with('productHasVariations','productHasVariations.variationBelongsToColor','productsHasMultiImages')->first();
        $color = Color::where('is_active',1)->get();
        $banner = Imagetable::where('table_name','products-banner')->where('type',2)->where('is_active_img',1)->first();
        $suggested = Products::where('is_active',1)->latest()->get();
        return view('booking-detail')->with('title','Booking Detail')->with(compact('banner','product','color','suggested'))->with('productsmenu',true);
    }

    public function dateCheck(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'color_name' => 'required',
            'size' => 'required',
            // 'price' => 'required',
            'quantity_selected' => 'required|min:1',
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'date'=> 'required',
           
            // 'short_desc' => 'required',
            // 'description' => 'required',
            // 'fit_sizing'=> 'required',
            // 'info_desc' => 'required',
            // 'width' => 'required|numeric|min:1',
            // 'height' => 'required|numeric|min:1',
            // 'depth' => 'required|numeric|min:1',
            // 'weight_pound' => 'required|numeric',
            // 'weight_kg' => 'required|numeric',
            // 'category' => 'required',
          
        ]);      
        if ($validator->passes()) 
        {
            // dd($request->all());
            $check_apt = Booking::where('appointment_date',$request->date)->where('product_id',$request->product_id)
            ->where('color_id',$request->color_id)->where('size_name',$request->size_name)->first();
            // dd($check_apt);
            if($check_apt)
            {
                return response()->json(['msg'=>'Booking Already Filled For This Date , Product & Size!','status'=>0]);
                // return back()->withInput()->with('notify_error', 'Appointment Already Booked For This Date!');
                
            }
            else
            {
                // dd('no booking done');
                $booking = Booking::create([
                    'user_id'=>Auth::id(),
                    'appointment_date'=>$request['date'],
                    'product_id'=>$request['product_id'],
                    'color_id'=>$request['color_id'],
                    'color_name'=>$request['color_name'],
                    'size_name'=>$request['size_name'],
                    'price'=>$request['price']*$request['quantity_selected'],
                    'quantity_selected'=>$request['quantity_selected'],
                    'appointment_date'=>$request['date'],
                    'name'=>$request['name'],
                    'email'=>$request['email'],
                    'phone'=>$request['phone'],
                    'msg'=>$request['msg'],
                ]);

                return response()->json(['msg'=>'Booking Created Successfuly!','status'=>1]);
            }
        }
        else{
            
            return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                
           
         }
    }

 
    


   
}
