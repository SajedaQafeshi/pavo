<?php

namespace App\Http\Controllers;

use App\Model\OrderItem;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductTranslation;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Session;
class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::flush();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (session('order_id') == NULL && Auth::guard('customer')->user() == null) {

            $order = new Order();
            $productsTranslation = ProductTranslation::findOrFail($request['product_id']);
            if ($productsTranslation->discount != 0) {
                $price = $productsTranslation->price - ($productsTranslation->price * ($productsTranslation->discount / 100));
                $order->total_price += ($request['amount'] * $price);
            } else {
                $order->total_price += ($request['amount'] * $productsTranslation->price);
            }
            $order->total_point += ($request['amount'] * $productsTranslation->point_counter);
            $order->save();

            Session::put('order_id', $order->id);
            $orderItem = OrderItem::create([
                'amount' => $request['amount'],
                'order_id' => Session::get('order_id'),
                'product_id' => $request['product_id'],
                'color_id' => $request['color_id'],
                'size_id' => $request['size_id'],
            ]);

            return redirect('/');
        } else if (session('order_id') == NULL && Auth::guard('customer')->user() != null) {

            $order = new Order();
            $productsTranslation = ProductTranslation::findOrFail($request['product_id']);
            if ($productsTranslation->discount != 0) {
                $price = $productsTranslation->price - ($productsTranslation->price * ($productsTranslation->discount / 100));
                $order->total_price += ($request['amount'] * $price);
            } else {
                $order->total_price += ($request['amount'] * $productsTranslation->price);
            }
            $order->total_point += ($request['amount'] * $productsTranslation->point_counter);
            $order->save();

            Session::put('order_id', $order->id);
            $orderItem = OrderItem::create([
                'amount' => $request['amount'],
                'order_id' => Session::get('order_id'),
                'product_id' => $request['product_id'],
                'color_id' => $request['color_id'],
                'size_id' => $request['size_id'],
            ]);

            return redirect('/');
        } else if (session('order_id') != NULL && Auth::guard('customer')->user() != null) {
            $order = Order::findOrFail(Session::get('order_id'));
            OrderItem::create([
                'amount' => $request['amount'],
                'order_id' => Session::get('order_id'),
                'product_id' => $request['product_id'],
                'color_id' => $request['color_id'],
                'size_id' => $request['size_id'],
            ]);
            $productsTranslation = ProductTranslation::findOrFail($request['product_id']);
            if ($productsTranslation->discount != 0) {
                $price = $productsTranslation->price - ($productsTranslation->price * ($productsTranslation->discount / 100));
                $order->total_price += ($request['amount'] * $price);
            } else {
                $order->total_price += ($request['amount'] * $productsTranslation->price);
            }
            $order->total_point += ($request['amount'] * $productsTranslation->point_counter);

            $order->save();
            return redirect('/');
        } else {
            $order = Order::findOrFail(Session::get('order_id'));
            OrderItem::create([
                'amount' => $request['amount'],
                'order_id' => Session::get('order_id'),
                'product_id' => $request['product_id'],
                'color_id' => $request['color_id'],
                'size_id' => $request['size_id'],
            ]);
            $productsTranslation = ProductTranslation::findOrFail($request['product_id']);
            if ($productsTranslation->discount != 0) {
                $price = $productsTranslation->price - ($productsTranslation->price * ($productsTranslation->discount / 100));
                $order->total_price += ($request['amount'] * $price);
            } else {
                $order->total_price += ($request['amount'] * $productsTranslation->price);
            }
            $order->save();
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(orderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(orderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_)
    {
        $orderItem = OrderItem::find($id_);
        $productsTranslation = ProductTranslation::findOrFail($orderItem->product_id);

        $order = Order::findOrFail(Session::get('order_id'));
        if ($productsTranslation->discount != 0) {
            $price = $productsTranslation->price - ($productsTranslation->price * ($productsTranslation->discount / 100));
            $order->total_price -= ($orderItem->amount * $price);
        } else {
            $order->total_price -= ($orderItem->amount * $productsTranslation->price);
        }
        $order->total_point -= ($orderItem->amount * $productsTranslation->point_counter);
        $order->save();

        OrderItem::find($id_)->delete();

        $orderItemList =  OrderItem::where('order_id', '=', Session::get('order_id'))->get();
        if ($orderItemList->count() == 0) {
            Order::find(Session::get('order_id'))->delete();
            Session::forget('order_id');
            return redirect('/');
        } else {
            return redirect('/orders');
        }
    }
}
