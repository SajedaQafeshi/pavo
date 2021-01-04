<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Advertisnment;
use App\Model\AdvertisnmentTranslation;
use App\Model\Category;
use App\Model\Media;
use App\Model\Product;
use App\Model\Setting;
use App\Model\Region;
use App\Model\OrderItem;
use App\Model\Order;
use Session;
use Mail;
use Nexmo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Nexmo::message()->send([
        //     'to'   => '970595114481',
        //     'from' => 'Pavo',
        //     'text' => 'Hi Sajeda.'
        // ]);
        $majorAdvertisnments = AdvertisnmentTranslation::where('type', 'major')
            ->where('locale', 'en')
            ->get();

        $mainAdvertisnments = AdvertisnmentTranslation::where('type', 'main')
            ->where('locale', 'en')
            ->get();

        $categories = Category::latest()->get();
        $settings = Setting::latest()->get();
        $products = Product::latest()->get();
        if (Auth::guard('customer')->user() != null && session('order_id') != NULL) {

            $user = Auth::guard('customer')->user();
            $order = Order::findOrFail(Session::get('order_id'));
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            return view('index', compact('majorAdvertisnments', 'mainAdvertisnments', 'categories', 'settings', 'products', 'user', 'order', 'orderItems'));
        
        } else if (Auth::guard('customer')->user() != null && session('order_id') == NULL) {

            $user = Auth::guard('customer')->user();
            return view('index', compact('majorAdvertisnments', 'mainAdvertisnments', 'categories', 'settings', 'products', 'user'));
       
        } else if (session('order_id') == NULL) {
            return view('index', compact('majorAdvertisnments', 'mainAdvertisnments', 'categories', 'settings', 'products', 'order', 'orderItems'));
        } else {
            $order = Order::findOrFail(Session::get('order_id'));
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            return view('index', compact('majorAdvertisnments', 'mainAdvertisnments', 'categories', 'settings', 'products', 'order', 'orderItems'));
        }
    }
}
