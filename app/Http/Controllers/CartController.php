<?php

namespace App\Http\Controllers;

use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\News;
use App\Models\Content;
use App\Models\Variation;
use App\Models\Keywords;
use App\Models\Testimonial;
use App\Models\Coupon;
use App\Models\Partner;
use App\Models\Album;
use App\Models\User;
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
use App\Models\Meta;
use App\Models\Product_categories;
use App\Models\Referral;
use App\Models\Volet;
use App\Models\Package;
use App\Models\Plane;
use Stripe;

use Auth;

use App\Models\Vendor;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Plan;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $categories = Product_categories::where("is_active", 1)->get();
        $logo = imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        $vendor = Vendor::where('is_active', 1)->get();
        View()->share('vendor', $vendor);
        View()->share('config', $this->getConfig());
        View()->share('categories', $categories);
    }

    public function order_submit()
    {
        $order_upd = Orders::where('id', $_GET['order_id'])->update([
            'is_active' => 0,
            'pay_status' => '1',
            'order_response' => $_GET['order_number'],
            'token_id' => $_GET['token_id'],
        ]);
        $cart_data = Session::get('cart');
        $order = Orders::where('id', $_GET['order_id'])->with('orderHasDetail')->first();
        $amount = $order->total_amount;
                
        $order_id = $cart_data['order_id'];
        unset($cart_data['order_id']);
        $detail = OrderDetail::create([
            'order_id' => $order_id,
            'details' => serialize($cart_data),
        ]);
        
        
        Session::forget('cart');
        
        
        $data = [
            'order' => $order,
            'order_detail' => $cart_data,
        ];
        
        
         Mail::send('email/order-invoice', ['data' => $data], function ($message) use ($order) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order->email);
            $message->subject('Order Invoice - Alain Fernandez');
        });
        // return response()->json(['status' => 1]);
        return redirect()->route('welcome')->with('notify_success', 'Payment Charged Successfully!');
    }

    public function paystatus(Request $request)
    {
        $status_codes = array("Default" => 0, "Completed" => 1, "Pending" => 2, "Denied" => 3, "Failed" => 4, "Reversed" => 5);
        $payment_status = $request['payment_status'];

        $updateParam = $status_codes[$payment_status];

        $order_upd = Orders::where('id', $request['custom'])->update([
            'pay_status' => $updateParam,
            'order_response' => serialize($request->all()),
            'card_payment' => 'PAYPAL'
        ]);
    }

    public function placeorder(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $order = Orders::create([
            "user_id" => Auth::id(),
            "email" => $request->email,
            "fname" => $request->fname,
            "lname" => $request->lname,
            "address" => $request->address,
            "apartment" => $request->apartment,
            "country" => $request->country,
            "city" => $request->city,
            "state" => $request->state,
            "zip" => $request->zip,
            "phone" => $request->phone,
            "total_amount" => $request->total_amount,
        ]);
        $cart_data = Session::get('cart');
        $cart_data['order_id'] = $order->id;
        Session::put('cart', $cart_data);
        $data = compact('cart_data');
        return redirect()->route('stripe.post')->with("notify_success", "Success!")->with($data);
    }

    public function stripePost()
    {
        $cart_data = Session::get('cart');

        $tot = 0;
        foreach ($cart_data as $key => $value) {
            if ($key != 'order_id') {
                $rowid = $value['cart_id'];
                $tot += $cart_data[$rowid]['sub_total'];
            }
        }

        $order = $cart_data['order_id'];
        $amount = $tot;
        $amountInCents = (int) ($amount * 100);
        try {
            $url = 'https://api.sandbox.fortis.tech/v1/elements/transaction/intention'; //sandbox
            // $url = 'https://api.fortis.tech/v1/elements/transaction/intention'; //production

            // Data payload as an associative array
            $data = array(
                "action" => "sale",
                "digitalWalletsOnly" => false,
                "methods" => array(
                    array(
                        "type" => "cc",
                        "product_transaction_id" => "11eeeaada43dffd6b01d4363"
                    )
                ),
                "amount" => $amountInCents,
                "tax_amount" => 1,
                "location_id" => "11eeeaada40a0dca919861af",
                "contact_id" => "11eeec6970614930aed5dd6e",
                "save_account" => true,
                "save_account_title" => "54",
                "ach_sec_code" => "WEB",
                "bank_funded_only_override" => false,
                "allow_partial_authorization_override" => false,
                "auto_decline_cvv_override" => false,
                "auto_decline_street_override" => true,
                "auto_decline_zip_override" => true,
                "message" => "message50"
            );
            
            // Encode the data array to JSON
            $jsonData = json_encode($data);
            
            // Initialize cURL session
            $curl = curl_init();
            
            // Set cURL options
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "user-id: 11eeeaada5c8d4cab9c5ca5c",
                    "user-api-key: 11eeec6766d6496c96d88017",
                    "developer-id: 840Qy6RW",
                    "Accept: application/json"
                )
            ));
            
            // Execute cURL request and get the response
            $response = curl_exec($curl);
            
            // Check for cURL errors
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                // Handle cURL error
                echo "cURL Error: " . $error_msg;
            } else {
                // Close cURL session
                curl_close($curl);
            
                // Handle API response
                $responseData = json_decode($response, true);
                if ($responseData) {
                    // Output the response data
                    // echo "<pre>";
                    // print_r($responseData);
                } else {
                    // Handle JSON decoding error
                    echo "Invalid JSON response from the API";
                }
            }

            $secret = $responseData['data']['client_token'];
            return view('paysecure')->with('notify_success', 'Payment Charged!')->with(compact('secret', 'amount', 'order'));
        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('notify_error', "a " . $e->getError()->message);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return back()->with('notify_error', "b " . $e->getError()->message);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return back()->with('notify_error', "c " . $e->getError()->message);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return back()->with('notify_error', "d " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return back()->with('notify_error', "e " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return back()->with('notify_error', "f " . $e->getError()->message);
        } catch (Exception $e) {
            return back()->with('notify_error', "g " . $e->getError()->message);
        }
    }

    public function checkout($ref = null)
    {
        $sub_total = 0; // Initialize $sub_total
        $total = 0; // Initialize $total

        if (Auth::check()) {
            if (isset($_GET) && !empty($_GET)) {
                Session::forget('shipping');
            }

            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart_data = Session::get('cart');

                // Calculate $sub_total and $total based on cart_data
                foreach ($cart_data as $key => $value) {
                    if ($key != 'order_id') {
                        $sub_total += $value['sub_total'];
                        $total += $value['sub_total']; // Assuming $total is based on the same logic as $sub_total
                    }
                }

                return view('checkout')->with('title', 'Checkout')->with(compact('cart_data', 'ref', 'sliders', 'sub_total', 'total'));
            } else {
                return redirect()->route('cart')->with('notify_error', 'Your Cart Is Empty!');
            }
        } else {
            return redirect()->route('login')->with('notify_error', 'You need to login first!');
        }
    }


    public function checkout_landing()
    {
        return redirect()->route('home')->with('notify_success', 'Payment success!');
    }



    public function subscription_create(Request $request)
    {
        $order_upd = Orders::where('id', $request['order'])->update([
            'is_active' => 1,
            'pay_status' => 1,
        ]);

        $order_data = Orders::where('id', $request['order'])->first();
        $package = Package::where('id', $order_data->pkg_id)->first();

        Mail::send('email/subscription', ['order_data' => $order_data, 'package' => $package], function ($message) use ($order_data) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order_data->email);
            $message->subject('Thank You!');
        });

        return redirect()->route('home')->with('notify_success', 'Payment Charged Successfully!');
    }


    public function save_cart(Request $request)
    {
        if (Session::has('cart') && !empty(Session::get('cart'))) {
            $rowid = null;
            $flag = 0;
            $cart_data = Session::get('cart');
            foreach ($cart_data as $key => $value) {
                if ($key == 'order_id') {
                    continue;
                }
                $product_id = $request->product_id;
                $cartId = $product_id;
                if ((intval($value['product_id']) == intval($request['product_id'])) && $value['cart_id'] == $cartId) {
                    $flag = 1;
                    $rowid = $value['cart_id'];
                    $cart_data[$rowid]['quantity'] += $request['qty'];
                    $cart_data[$rowid]['sub_total'] = $cart_data[$rowid]['price'] * $cart_data[$rowid]['quantity'];

                    Session::forget($rowid);
                    Session::put('cart', $cart_data);

                    return redirect()->route('cart')->with('notify_success', 'Product Added To Cart Successfully!');
                }
            }
        }

        $product_id = $request->product_id;
        $qty = $request->qty;

        $cart = array();
        $cartId = $product_id;
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if ($qty == 0) {
            $qty = 1;
        }

        if (intval($qty) > 0) {
            if (!empty($cartId) && !empty($cart)) {
                unset($cart[$cartId]);
            }
            $product = Products::where('id', $product_id)->first();
            $cart[$cartId]['price'] = $request->price;
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['quantity'] = $qty;
            $cart[$cartId]['sub_total'] = floatval($request->price * $qty);
            $cart[$cartId]['product_id'] = $product_id;

            Session::put('cart', $cart);
            return redirect()->route('cart')->with('notify_success', 'Item Added to cart Successfully');
        } else {
            return back()->with('notify_error', 'Something Went Wrong, Please Try Again!');
        }
    }



    public function updatecart(Request $request)
    {
        $rowid = $request->rowid;
        $qty = $request->qty;
        $cart_data = Session::get('cart');
        $cart_data[$rowid]['quantity'] = $qty;

        $cart_data[$rowid]['sub_total'] = $request['price'] * $qty;
        Session::forget($rowid);
        Session::put('cart', $cart_data);
        return response()->json(['status', 1]);
    }

    public function removecart($cart_id, Request $request)
    {
        $rowid = $cart_id;
        $cart_data = Session::get('cart');
        unset($cart_data[$rowid]);
        Session::forget('cart');
        Session::put('cart', $cart_data);
        return redirect()->back()->with('notify_success', 'Item removed!');
    }
}
