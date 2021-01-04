<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Model\OrderItem;
use App\Model\Order;
use App\Model\Customer;
use App\Model\Point;
use App\Model\Setting;
use App\Model\Region;
use App\Model\Discount;
use App\Model\ProductTranslation;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Hash;

use Session;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::guard('customer')->user() != null && Session::get('order_id') != null) {
            $user = Auth::guard('customer')->user();
            $settings = Setting::latest()->get();
            $regions = Region::latest()->get();
            $order = Order::findOrFail(Session::get('order_id'));
            $point = Point::get();
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            if ($order->total_point == 0) {
                foreach ($orderItems as $item) {
                    $productsTranslation = ProductTranslation::findOrFail($item->product_id);
                    $order->total_point += ($item->amount * $productsTranslation->point_counter);
                }
            }
            $totalPiont = $user->total_point+ $order->total_point;
            if ($user->total_point >= $point[0]->max_point ) {
                $pointDiscount = $point[0]->value;
                return view('pages.order', compact('settings', 'products', 'order', 'orderItems', 'regions', 'user','pointDiscount'));
            } else {
                return view('pages.order', compact('settings', 'products', 'order', 'orderItems', 'regions', 'user'));
            }
            
        } else if (Session::get('order_id') != null) {
            $settings = Setting::latest()->get();
            $regions = Region::latest()->get();
            $order = Order::findOrFail(Session::get('order_id'));
            $orderItems = OrderItem::where('order_id', $order->id)->get();
           
            return view('pages.order', compact('settings', 'products', 'order', 'orderItems', 'regions'));
        
        } else {

            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('customer')->user() != null) {
            $order = Order::findOrFail(Session::get('order_id'));

            $order->region_id = $request['location'];
            $order->cutomer_id = Auth::guard('customer')->user()->id;
            
            if ($request['coded'] != null) {
                $discount = Discount::where('code', '=', $request['coded'])->get();
                $order->code_discount = $discount[0]->value;
            }

            $orderItems =  OrderItem::where('order_id', '=', Session::get('order_id'))->get();
            foreach ($orderItems as $orderItem) {

                $product =  ProductTranslation::find($orderItem->product_id);
                $products = ProductTranslation::where('product_id', '=', $product->product_id)->get();
                foreach ($products as $p) {
                    $p->amount = $p->amount - $orderItem->amount;
                    $p->save();
                }
            }

            $customer = Customer::findOrFail(Auth::guard('customer')->user()->id);
            $point = Point::get();
            
            if ($customer->total_point >= $point[0]->max_point ) {
                $pointDiscount = $point[0]->value;
                $order->points_discount = $point[0]->value;
                $customer->total_point += $order->total_point;
                $customer->total_point -= $point[0]->max_point;
            } else {
                $customer->total_point += $order->total_point;
            }
            $customer->save();


            $order->cutomer_check = true;
            $order->save();

            $user = Auth::guard('customer')->user();

            $subscribtionEmails = new OrderEmail($products, $order, $orderItems, $user);
            $to_email = $customer->email;
            Mail::to($to_email)->send($subscribtionEmails);

            Session::forget('order_id');


            Session::flash('message', 'This is a message!'); 
            return redirect('/');

        } else if (Auth::guard('customer')->user() == null && Session::get('order_id') != null) {

            $order = Order::findOrFail(Session::get('order_id'));

            $customer = Customer::create([
                'name' => $request['userName'],
                'email' => $request['email'],
                'phone' => $request['phoneNum'],
                'address' => $request['address'],
                'birth_date' => $request['BirthDate'],
                'password' => Hash::make('123456789'),
            ]);

            $order->region_id = $request['location'];
            $order->cutomer_id = $customer->id;
            $order->total_point = 0;
            if ($request['coded'] != null) {
                $discount = Discount::where('code', '=', $request['coded'])->get();
                $order->code_discount = $discount[0]->value;
            }
            
            $orderItems =  OrderItem::where('order_id', '=', Session::get('order_id'))->get();
            foreach ($orderItems as $orderItem) {

                $product =  ProductTranslation::find($orderItem->product_id);
                $products = ProductTranslation::where('product_id', '=', $product->product_id)->get();
                foreach ($products as $p) {
                    $p->amount = $p->amount - $orderItem->amount;
                    $p->save();
                }
            }
            $order->cutomer_check = true;
            $order->save();

            $user = Auth::guard('customer')->user();

            $subscribtionEmails = new OrderEmail($products, $order, $orderItems, $user);
            $to_email = $customer->email;
            Mail::to($to_email)->send($subscribtionEmails);

            Session::forget('order_id');
            Session::flash('message', 'This is a message!'); 
            return redirect('/');

        } else {

            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function show(Ordre $ordre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordre $ordre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordre $ordre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordre $ordre)
    {
        //
    }
}
