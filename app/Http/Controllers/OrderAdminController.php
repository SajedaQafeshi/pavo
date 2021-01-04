<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Order;
use App\Model\OrderItem;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;

class OrderAdminController extends Controller
{

    	public function __construct()
	{


	}

  
    public function getOrders() {

        return $orders = Order::where('cutomer_check', 1)->latest();
   
	}


	public function index() {

		$orders = $this->getOrders()->paginate(10);
		
		return view('orders.index',compact('orders'));
	}

	public function show($id) {
        $order = Order::findOrFail($id);
		$orderItems = OrderItem::where('order_id', $id)->paginate(50);
	
		return view('orders.show', compact('order', 'orderItems'));
	}

	public function create()
	{
		
	}

	public function store(Request $request) {

	}


	public function edit($id) {

        $order = Order::findOrFail($id);
        $order->is_delivery = 1;
        $order->save();

        return redirect('/order');
	}

	public function update($id,Request $request) {

		
	}
}
