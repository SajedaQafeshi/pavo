<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Model\Color;
use App\Model\Photo;
use App\Model\Product;
use App\Model\ProductTranslation;
use App\Model\Size;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;
use Image;

class ProductController extends Controller
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

		$products = $this->getProducts()->paginate(50);

		return view('products.index', compact('products'));
	}

	public function show($id)
	{
		$category = Category::findOrFail($id);
		//$products = Product::
		return view('products.create', compact('category'));
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
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/product/'.$extra_name));
            $path = public_path('storage/product/'.$extra_name);
            $logo = public_path('opa_logo.png'); 
			$logo1 = public_path('opa_logo1.png');
            $v_logo = public_path('v_logo.png');    
            $img = Image::make($path);
			$img->insert($logo, 'bottom-left', 5, 5);
			$img->insert($logo1, 'bottom-right', 5, 5);
            $pad = intval(($img->height()-500)/2);
            $img->insert($v_logo, 'top-right',5,$pad);
            
            $img->resize(800,null, function ($constraint) {
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
				'locale' => 'en',
				'disposal' => $request->disposal,
				'wholesale' => $request->wholesale,
				'point_counter' => $request->point_counter,
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
				'locale' => 'ar',
				'disposal' => $request->disposal,
				'wholesale' => $request->wholesale,
				'point_counter' => $request->point_counter,
			),

		);

		ProductTranslation::insert($data);

		$store_file = [];
		$productPhoto = new \App\Model\Photo();
		foreach ($request->photos as $photo) {

            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/product/'.$extra_name));
            $path = public_path('storage/product/'.$extra_name);
            $logo = public_path('opa_logo.png'); 
			$logo1 = public_path('opa_logo1.png');
            $v_logo = public_path('v_logo.png');    
            $img = Image::make($path);
			$img->insert($logo, 'bottom-left', 5, 5);
			$img->insert($logo1, 'bottom-right', 5, 5);
            $pad = intval(($img->height()-500)/2);
            $img->insert($v_logo, 'top-right',5,$pad);
            
            $img->resize(800,null, function ($constraint) {
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

		return redirect()->back();
	}


	public function edit($id) {

		$product= Product::findOrFail($id);

		$sizes= Size::where('product_id', $id)->get();
		$sizes = $sizes->toArray(); 
        $sizes = array_column($sizes, 'name');
		$sizes =  implode(',', $sizes);
		
		$photos = Photo::where('product_id', '=', $id)
			->get();

		$collection = [];

		if (count($photos)) {
			$collection = collect($photos)->map(function ($photo) {
				$photo['thumb_path']   = url('storage/product/' . @$photo['slug']);

				return ($photo);
			});
		}

		return view('products.edit', compact('product', 'sizes', 'collection'));
	}

	public function update($id, Request $request) {

		//dd($request->all());
		$visible;
		if ($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$product =  Product::findOrFail($id);
		$productTranslations = ProductTranslation::where('product_id', $id)
			->where('locale', 'en')
			->pluck('image');
		$productId = $product->id;
		$extra_name = $productTranslations[0];
		//die($extra_name);

		if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/product/'.$extra_name));
            $path = public_path('storage/product/'.$extra_name);
            $logo = public_path('opa_logo.png'); 
			$logo1 = public_path('opa_logo1.png');
            $v_logo = public_path('v_logo.png');    
            $img = Image::make($path);
			$img->insert($logo, 'bottom-left', 5, 5);
			$img->insert($logo1, 'bottom-right', 5, 5);
            $pad = intval(($img->height()-500)/2);
            $img->insert($v_logo, 'top-right',5,$pad);
            
            $img->resize(800,null, function ($constraint) {
                $constraint->aspectRatio();
            });

			$img->save($path);

			$product_data = [
				'en' => [
					'name' => $request->name_english,
					'product_id' => $productId,
					'description' => $request->description_english,
					'visible' => $visible,
					'image' => $extra_name,
					'price' => $request->price,
					'amount' => $request->amount,
					'category_id' => $product->category_id,
					'disposal' => $request->disposal,
					'wholesale' => $request->wholesale,
					'point_counter' => $request->point_counter,
				],
				'ar' => [
					'name' => $request->name_arabic,
					'product_id' => $productId,
					'description' => $request->description_arabic,
					'visible' => $visible,
					'image' => $extra_name,
					'price' => $request->price,
					'amount' => $request->amount,
					'category_id' => $product->category_id,
					'disposal' => $request->disposal,
					'wholesale' => $request->wholesale,
					'point_counter' => $request->point_counter,
				],
			];

			$product->update($product_data);
			
        } else {
			$product_data = [
				'en' => [
					'name' => $request->name_english,
					'product_id' => $productId,
					'description' => $request->description_english,
					'visible' => $visible,
					'image' => $extra_name,
					'price' => $request->price,
					'amount' => $request->amount,
					'category_id' => $product->category_id,
					'disposal' => $request->disposal,
					'wholesale' => $request->wholesale,
					'point_counter' => $request->point_counter,
				],
				'ar' => [
					'name' => $request->name_arabic,
					'product_id' => $productId,
					'description' => $request->description_arabic,
					'visible' => $visible,
					'image' => $extra_name,
					'price' => $request->price,
					'amount' => $request->amount,
					'category_id' => $product->category_id,
					'disposal' => $request->disposal,
					'wholesale' => $request->wholesale,
					'point_counter' => $request->point_counter,
				],
			];

			$product->update($product_data);
		}


		$store_file = [];
		$productPhoto = new \App\Model\Photo();
		if($request->photos) {
			foreach ($request->photos as $photo) {

				$original_name = $photo->getClientOriginalName();
				$extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
				$encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
				$resized_image = Image::make($photo->getRealPath());
				$resized_image->save(public_path('storage/product/'.$extra_name));
				$path = public_path('storage/product/'.$extra_name);
				$logo = public_path('opa_logo.png'); 
				$logo1 = public_path('opa_logo1.png');
				$v_logo = public_path('v_logo.png');    
				$img = Image::make($path);
				$img->insert($logo, 'bottom-left', 5, 5);
				$img->insert($logo1, 'bottom-right', 5, 5);
				$pad = intval(($img->height()-500)/2);
				$img->insert($v_logo, 'top-right',5,$pad);
				
				$img->resize(800,null, function ($constraint) {
					$constraint->aspectRatio();
				});
	
				$img->save($path);
	
				$store_file[] = [
					'product_id' => $productId,
					'slug' =>  $extra_name
				];
			}

			Photo::insert($store_file);
		}
	
		if($request->name) {
			$sizes = Size::where('product_id', $productId)->delete();

			foreach ($request->name as $name) {
				Size::create([
					'name' => $name,
					'product_id' => $productId,
				]);
			}
		}
		
		if($request->attachments[0]) {
			$colorArray = explode(",", $request->attachments[0]);
			foreach ($colorArray as &$value) {
				Color::create([
					'code' => $value,
					'product_id' => $productId,
				]);
			}
		}
		
		$category = Category::findOrFail($product->category_id);
		$products = Product::where('category_id', $product->category_id)->paginate(50);
	
		return view('categories.show',compact('category', 'products'));
		
		//return redirect()->back();
	}

	public function addReview($id)
	{
		$category = Category::findOrFail($id);

		return redirect('categories/' . $id)->with('message', trans('main.success_adding'));
	}

	public function archive($id)
	{

		$product = Product::findOrFail($id);
		$productsTranslation = ProductTranslation::where('product_id', $product->id)->get();

		foreach($productsTranslation as $productTranslation) {
			$productTranslation->is_archived = 1;
			$productTranslation->save();
		}

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

		$colors = Color::where('product_id', $id)->get();

		return view('products.show', compact('product', 'collection', 'colors'));
	}

	public function destroyImage($id) {

        $photo = Photo::findOrFail($id);
        $photo->delete();

		// return response()->json([
		// 	'success' => 'Record deleted successfully!'
		// ]);

		return redirect()->back();
	}
	
	public function removeSize($id) {

        $size = Size::findOrFail($id);
        $size->delete();

		return redirect()->back();
	}
	
	public function zoomImage($id) {
        
        $photo = Photo::findOrFail($id);

		$photo['thumb_path'] = url('storage/product/'.@$photo['slug']);

        return $photo;
	}

	public function removeColor($id) {

        $color = Color::findOrFail($id);
        $color->delete();

		return redirect()->back();
	}

	public function addDiscount(Request $request)
	{
		$product = Product::findOrFail($request->product_id);
		$productsTranslation = ProductTranslation::where('product_id', $product->id)->get();

		foreach($productsTranslation as $productTranslation) {
			$productTranslation->discount = $request->discount;
			$productTranslation->save();
		}

		return redirect()->back();
	}
}
