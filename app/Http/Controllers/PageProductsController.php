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
use Session;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Image;

class PageProductsController extends Controller
{
	public function __construct()
	{
	}

	public function getProductById(Request $request)
	{

		$product = Product::where($request::input('id'))->get();

		return $product;
	}

	public function getProducts()
	{

		return $products = Product::latest();
	}


	public function index()
	{
		if (session('order_id') == NULL) {
			$products = $this->getProducts()->paginate(50);

			return view('products.index', compact('products'));
		} else {

			$order = Order::findOrFail(Session::get('order_id'));
			$orderItems = OrderItem::where('order_id', $order->id)->get();
			$products = $this->getProducts()->paginate(50);

			return view('products.index', compact('products', 'order', 'orderItems'));
		}
	}

	public function show($id) {

		$settings = Setting::latest()->get();
		$colors = Color::where('product_id', '=', $id)->get();
		$products = Product::findOrFail($id);

		$products->point_counter++;
		$products->save();

		$productsTranslation = ProductTranslation::where('product_id', $products->id)->get();

		foreach($productsTranslation as $productTranslation) {
			$productTranslation->point_counter++;
			$productTranslation->save();
		}

		$photos = Photo::where('product_id', '=', $id)->get();

		$similierProducts = Product::where('category_id', $products->category_id)->get();

		$collection = [];

		if (count($photos)) {
			$collection = collect($photos)->map(function ($photo) {
				$photo['thumb_path']   = url('storage/product/' . @$photo['slug']);

				return ($photo);
			});
		}

		$sizes = Size::where('product_id', '=', $id)->get();
		if (session('order_id') == NULL && Auth::guard('customer')->user() != null) {
			$user = Auth::guard('customer')->user();
			return view('pages.product', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'similierProducts',
				'user'
			));
		} else if (session('order_id') == NULL && Auth::guard('customer')->user() == null) {
			return view('pages.product', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'similierProducts',
				'user'
			));
		} else if (session('order_id') != NULL && Auth::guard('customer')->user() != null) {
			$user = Auth::guard('customer')->user();
			$order = Order::findOrFail(Session::get('order_id'));
			$orderItems = OrderItem::where('order_id', $order->id)->get();

			return view('pages.product', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'similierProducts',
				'user',
				'order',
				'orderItems'
			));
		} else {
			$order = Order::findOrFail(Session::get('order_id'));
			$orderItems = OrderItem::where('order_id', $order->id)->get();

			return view('pages.product', compact(
				'colors',
				'collection',
				'settings',
				'products',
				'sizes',
				'similierProducts',
				'order',
				'orderItems'
			));
		}
	}

	public function showSimilar($id)
	{

		$settings = Setting::latest()->get();
		$colors = Color::where('product_id', '=', $id)->get();
		$products = Product::findOrFail($id);
		$photos = Photo::where('product_id', '=', $id)->get();

		$similierProducts = Product::where('category_id', $products->category_id)->get();

		$collection = [];

		if (count($photos)) {
			$collection = collect($photos)->map(function ($photo) {
				$photo['thumb_path']   = url('storage/product/' . @$photo['slug']);

				return ($photo);
			});
		}

		$sizes = Size::where('product_id', '=', $id)->get();

		return view('pages.product', compact(
			'colors',
			'collection',
			'settings',
			'products',
			'sizes',
			'similierProducts'
		));
	}

	public function create()
	{
		//return view('products.create');
	}

	public function store(Request $request)
	{

		$visible;
		if ($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$product = new Product();
		$product->category_id = $request->category_id;
		$product->save();
		$productId = $product->id;
		$extra_name = "";

		if ($request->file('image')) {
			$photo = $request->file('image');
			$original_name = $photo->getClientOriginalName();
			$extra_name  = uniqid() . '_' . time() . '_' . uniqid() . '.' . $photo->extension();
			$encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
			$resized_image = Image::make($photo->getRealPath());
			$resized_image->save(public_path('storage/product/' . $extra_name));
			$path = public_path('storage/product/' . $extra_name);
			$logo = public_path('opa_logo.png');
			$v_logo = public_path('v_logo.png');
			$img = Image::make($path);
			$img->insert($logo, 'bottom-left', 10, 10);
			$pad = intval(($img->height() - 500) / 2);
			$img->insert($v_logo, 'top-right', 10, $pad);

			$img->resize(800, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$img->save($path);
		}

		$data = array(
			array(
				'name' => $request->name_english,
				'product_id' => $productId,
				'description' => $request->description_english,
				'visible' => $visible,
				'image' => $extra_name,
				'price' => $request->price,
				'amount' => $request->amount,
				'category_id' => $request->category_id,
				'locale' => 'en'
			),

			array(
				'name' => $request->name_arabic,
				'product_id' => $productId,
				'description' => $request->description_arabic,
				'visible' => $visible,
				'image' => $extra_name,
				'price' => $request->price,
				'amount' => $request->amount,
				'category_id' => $request->category_id,
				'locale' => 'ar'
			),

		);

		ProductTranslation::insert($data);

		$store_file = [];
		$productPhoto = new \App\Model\Photo();
		foreach ($request->photos as $photo) {

			$original_name = $photo->getClientOriginalName();
			$extra_name  = uniqid() . '_' . time() . '_' . uniqid() . '.' . $photo->extension();
			$encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
			$resized_image = Image::make($photo->getRealPath());
			$resized_image->save(public_path('storage/product/' . $extra_name));
			$path = public_path('storage/product/' . $extra_name);
			$logo = public_path('opa_logo.png');
			$v_logo = public_path('v_logo.png');
			$img = Image::make($path);
			$img->insert($logo, 'bottom-left', 10, 10);
			$pad = intval(($img->height() - 500) / 2);
			$img->insert($v_logo, 'top-right', 10, $pad);

			$img->resize(800, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$img->save($path);

			$store_file[] = [
				'product_id' => $productId,
				'slug' =>  $extra_name
			];
		}

		Photo::insert($store_file);

		foreach ($request->name as $name) {
			Size::create([
				'name' => $name,
				'product_id' => $productId,
			]);
		}

		$colorArray = explode(",", $request->attachments[0]);
		foreach ($colorArray as &$value) {
			Color::create([
				'code' => $value,
				'product_id' => $productId,
			]);
		}

		foreach ($request->name as $name) {
			Size::create([
				'name' => $name,
				'product_id' => $productId,
			]);
		}

		return redirect()->back();
	}


	public function edit($id)
	{
		$product = Product::findOrFail($id);

		return view('products.edit', compact('product'));
	}

	public function update($id, Request $request)
	{

		$category = Category::findOrFail($id);
		$visible;
		if ($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$category->visible = $visible;
		$category->name_arabic = $request->name_arabic;
		$category->name_english = $request->name_english;
		$category->order = $request->order;
		$category->save();

		return redirect('/category');
	}

	public function addReview($id)
	{
		$category = Category::findOrFail($id);

		return redirect('categories/' . $id)->with('message', trans('main.success_adding'));
	}

	public function archive($id)
	{

		$product = Product::findOrFail($id);
		$product->is_archived = 1;
		$product->save();

		return redirect()->back();
	}

	public function showImages($id)
	{

		$product = Product::findOrFail($id);

		$photos = Photo::where('product_id', '=', $id)
			->get();

		$collection = [];

		if (count($photos)) {
			$collection = collect($photos)->map(function ($photo) {
				$photo['thumb_path']   = url('storage/product/' . @$photo['slug']);

				return ($photo);
			});
		}

		return view('products.show', compact('product', 'collection'));
	}
}
