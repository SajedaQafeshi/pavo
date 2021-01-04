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
use DB;

class InvoiceController extends Controller
{

    public function __construct() {


	}

    public function getOrders() {

		return $orders = Order::where('cutomer_check', 1)
			->where('is_delivery', 1)
			->latest();
	}

	public function index() {

		$orders = $this->getOrders()->paginate(10);

		$totalPrice = Order::where('cutomer_check', 1)
			->where('is_delivery', 1)->sum('total_price');

		$wholePrice = DB::table('orders')
			->where('cutomer_check', 1)
			->where('is_delivery', 1)
			->join('order_items', 'orders.id', '=', 'order_items.order_id')
			->join('products', 'order_items.product_id', '=', 'products.id')
			->join('product_translations', 'products.id', '=', 'product_translations.product_id')
			->where('locale', 'en')
			->sum('wholesale');
	
		return view('invoices.index',compact('orders', 'totalPrice', 'wholePrice'));
	}

	public function show($id) {
        
	}

	public function create()
	{
		
	}

	public function store(Request $request) {

	}


	public function edit($id) {

        
	}

	public function update($id,Request $request) {

		
	}
}
