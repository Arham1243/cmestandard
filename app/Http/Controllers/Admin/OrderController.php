<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Crawls;
use App\Models\Keywords;
use App\Models\Notifications;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\event_inquiry;
use App\Models\product_inquiry;
use App\Models\Events;
use App\Models\Partner;
use App\Models\Products;
use App\Models\categories;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Booking;
use Auth;
use Mail;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
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


    public function orders()
    {
// dd();
        $orders = Orders::with('orderHasDetail')->latest()->get();
        // dd($orders);
        return view('admin.orders-management.list')->with('title','Orders')->with('order_menu',true)->with(compact('orders'));
    }

    public function order_detail($id)
    {
        $orders=Orders::where('id',$id)->with('orderHasDetail')->first();
        // dd($orders);
        $order_detail = unserialize($orders->orderHasDetail->details);
        return view('admin.orders-management.detail')->with('title','Order Detail')->with('order_menu',true)->with(compact('order_detail','orders'));
    }

    public function order_delete($id)
    {
        $orders=Orders::where('id',$id)->with('orderHasDetail')->delete();
        return back()->with('notify_success','Order Deleted');
    }

    public function order_status(Request $request)
    {
    //    dd($request['id']);
            $orders = Orders::where('id',$request['id'])->update([
            'is_active' =>  $request['status'],
        ]);
        // dd($orders);
        $orderstatus = Orders::where('id',$request['id'])->first();
        if($orderstatus->is_active == 1){
            // dd($orderstatus->is_active);
            Mail::send('orderdelivered', ['orderstatus'=>$orderstatus]
            ,function($message) use ($orderstatus) {
                $message->to($orderstatus['email']);
                $message->subject('Order Delivered');
                });
// dd();
                $notification = Notifications::create ([
                    "order_id" => $orderstatus->id,
                    "subject" => "Order Delivered",
                    "title" => "Your order number # " . $orderstatus->id ." has been delivered.",
                    "user_id" => $orderstatus->user_id,
            ]);

        }
        if($orderstatus->is_active == 2){
          
            Mail::send('ordercancel', ['orderstatus'=>$orderstatus]
            ,function($message) use ($orderstatus) {
                $message->to($orderstatus['email']);
                $message->subject('Order cancellation notificaton');
                });
// dd();
                $notification = Notifications::create ([
                    "order_id" => $orderstatus->id,
                    "subject" => "Order cancellation notificaton",
                    "title" => "Your order number # " . $orderstatus->id ." has been canceled.",
                    "user_id" => $orderstatus->user_id,
            ]);

        }


        
        if($orderstatus->is_active == 3){
            // dd($orderstatus);
            // dd($orderstatus);
            Mail::send('orderready', ['orderstatus'=>$orderstatus]
            ,function($message) use ($orderstatus) {
                $message->to($orderstatus['email']);
                $message->subject('Order Ready for Pickup');
                });

                $notification = Notifications::create ([
                    "order_id" => $orderstatus->id,
                    "subject" => "Order Ready for Pickup",
                    "title" => "Your order number # " . $orderstatus->id ." Ready for Pickup.",
                    "user_id" => $orderstatus->user_id,
            ]);


        }
        return response()->json(['msg'=>'Status Update Successfuly','status' => 1]);
      
    }

    public function bookings()
    {
// dd();
        $bookings = Booking::latest()->get();
        // dd($orders);
        return view('admin.bookings-management.list')->with('title','Bookings')->with('bookings_menu',true)->with(compact('bookings'));
    }

    public function bookings_detail($id)
    {
        $bookings=Booking::where('id',$id)->first();
        // dd($orders);
        // $bookings_detail = unserialize($orders->orderHasDetail->details);
        return view('admin.bookings-management.detail')->with('title','Bookings Detail')->with('bookings_menu',true)->with(compact('bookings'));
    }

    public function bookings_delete($id)
    {
        $bookings=Booking::where('id',$id)->delete();
        return back()->with('notify_success','Booking Deleted');
    }

    public function bookings_suspend($id)
    {
        $bookings = Booking::where('id',$id)->first();
        if($bookings->is_active == 0)
        {
            $bookings->is_active= 1;
            $bookings->save();
            return redirect()->route('admin.bookings')->with('notify_success','Bookings Activated Successfuly!!');
        }
        else{
            $bookings->is_active= 0;
            $bookings->save();
            return redirect()->route('admin.bookings')->with('notify_success','Bookings Suspended Successfuly!!');
        }
    }


}
