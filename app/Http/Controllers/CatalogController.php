<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Model\Setting;
use App\Model\Product;
use App\Model\Media;
use App\Model\Category;
use Session;
use App\Model\Order;
use App\Model\OrderItem;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::latest()->get();
        $products = Product::latest()->get();
        if (session('order_id') == NULL && Auth::guard('customer')->user() != null) {
            $user = Auth::guard('customer')->user();
            return view('pages.catalog', compact(
                'settings',
                'products',
                'user'
            ));
        } else if (session('order_id') == NULL && Auth::guard('customer')->user() == null) {
            return view('pages.catalog', compact(
                'settings',
                'products'
            ));
        } else if (session('order_id') != NULL && Auth::guard('customer')->user() != null) {
            $user = Auth::guard('customer')->user();
            $order = Order::findOrFail(Session::get('order_id'));
            $orderItems = OrderItem::where('order_id', $order->id)->get();

            return view('pages.catalog', compact(
                'settings',
                'products',
                'user',
                'order',
                'orderItems'
            ));
        } else {
            $order = Order::findOrFail(Session::get('order_id'));
            $orderItems = OrderItem::where('order_id', $order->id)->get();

            return view('pages.catalog', compact(
                'settings',
                'products',
                'order',
                'orderItems'
            ));
        }
    }
}
