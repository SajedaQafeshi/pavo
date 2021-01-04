<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Model\Color;
use App\Model\Setting;
use App\Model\Photo;
use App\Model\Product;
use App\Model\ProductTranslation;
use App\Model\Size;
use App\Model\OrderItem;
use App\Model\Order;
use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Image;
use Session;

class PageCategoryController extends Controller
{

	public function __construct()
	{
	}

	public function index()
	{

		$products = $this->getProducts()->paginate(50);

		return view('products.index', compact('products'));
	}

	public function show($id)
	{
		$settings = Setting::latest()->get();
		$categories = Category::findOrFail($id);
		$products = Product::where('category_id', '=', $id)->get();
		// dd($categories);
		$photos = Photo::where('product_id', '=', $products[0]->id)->get();
		$colors = Color::where('product_id', '=', $products[0]->id)->get();
		$similiarCategories = Category::latest()->get();

		$collection = [];

		if (count($photos)) {
			$collection = collect($photos)->map(function ($photo) {
				$photo['thumb_path']   = url('storage/product/' . @$photo['slug']);

				return ($photo);
			});
		}

		$sizes = Size::where('product_id', '=', $products[0]->id)->get();

		$categories->point_counter++;
		$categories->save();

		$counterArabic = $categories->translate('ar')->point_counter++;
		$counterEnglish = $categories->translate('en')->point_counter++;

		$category_data = [
			'en' => [
				'point_counter' => $counterEnglish,
			],
			'ar' => [
				'point_counter' => $counterArabic,
			],
		];

		$categories->update($category_data);
		$categories->save();
		if (session('order_id') == NULL && Auth::guard('customer')->user() != null) {
			$user = Auth::guard('customer')->user();
			return view('pages.categories', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'categories',
				'similiarCategories',
				'user'
			));
		} else if (session('order_id') == NULL && Auth::guard('customer')->user() == null) {
			return view('pages.categories', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'categories',
				'similiarCategories'
			));
		} else if (session('order_id') != NULL && Auth::guard('customer')->user() != null) {
			$user = Auth::guard('customer')->user();
			$order = Order::findOrFail(Session::get('order_id'));
			$orderItems = OrderItem::where('order_id', $order->id)->get();

			return view('pages.categories', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'categories',
				'similiarCategories',
				'user',
				'order',
				'orderItems'
			));
		} else {
			$order = Order::findOrFail(Session::get('order_id'));
			$orderItems = OrderItem::where('order_id', $order->id)->get();

			return view('pages.categories', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'categories',
				'similiarCategories',
				'order',
				'orderItems'
			));
		}
	}



	public function create()
	{
	}

	public function store(Request $request)
	{
	}


	public function edit($id)
	{
	}

	public function update($id, Request $request)
	{
	}

	public function addReview($id)
	{
	}

	public function archive($id)
	{
	}
}
