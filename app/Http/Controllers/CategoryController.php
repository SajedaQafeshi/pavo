<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Model\Media;
use App\Model\Product;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;
use Image;

class CategoryController extends Controller
{
    public function __construct() {
	}

    public function getCategoryById(Request $request) {

    	$category = Category::where($request::input('id'))->get();

    	return $category;
    }

    public function getCategories() {

		return $categories = Category::latest();
	}

	public function index() {

		$categories = $this->getCategories()->paginate(50);

		return view('categories.index',compact('categories'));
	}

	public function show($id) {
		$category = Category::findOrFail($id);
		$products = Product::where('category_id', $id)->paginate(50);
	
		return view('categories.show',compact('category', 'products'));
	}

	public function create()
	{
		return view('categories.create');
	}

	public function store(Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;
        
        if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/category/'.$extra_name));
            $path = public_path('storage/category/'.$extra_name);
			$logo = public_path('opa_logo.png'); 
			$logo1 = public_path('opa_logo1.png');
            $v_logo = public_path('v_logo.png');    
            $img = Image::make($path);
			$img->insert($logo, 'bottom-left', 5, 5);
			$img->insert($logo1, 'bottom-right', 5, 5);
            $pad = intval(($img->height()-500)/2);
            $img->insert($v_logo, 'top-right',5,$pad);
            
            $img->resize(700,null, function ($constraint) {
                $constraint->aspectRatio();
            });

			$img->save($path);
			
			$category_data = [
				'en' => [
					'name' => $request->name_english,
					'visible' => $visible,
					'image' => $extra_name
				],
				'ar' => [
					'name' => $request->name_arabic,
					'visible' => $visible,
					'image' => $extra_name
				],
			];
		 
			Category::create($category_data);
        }

		return redirect('/category');
	}


	public function edit($id) {

		$category= Category::findOrFail($id);

		return view('categories.edit',compact('category'));
	}

	public function update($id,Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

		if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/category/'.$extra_name));
            $path = public_path('storage/category/'.$extra_name);
            $logo = public_path('opa_logo.png'); 
			$logo1 = public_path('opa_logo1.png');
            $v_logo = public_path('v_logo.png');    
            $img = Image::make($path);
			$img->insert($logo, 'bottom-left', 5, 5);
			$img->insert($logo1, 'bottom-right', 5, 5);
            $pad = intval(($img->height()-500)/2);
            $img->insert($v_logo, 'top-right',5,$pad);
            
            $img->resize(700,null, function ($constraint) {
                $constraint->aspectRatio();
            });

			$img->save($path);
			
			$category_data = [
				'en' => [
					'name' => $request->name_english,
					'visible' => $visible,
					'image' => $extra_name
				],
				'ar' => [
					'name' => $request->name_arabic,
					'visible' => $visible,
					'image' => $extra_name
				],
			];
		 
			$category = Category::findOrFail($id);
			$category->update($category_data);

		} else {
			$category_data = [
				'en' => [
					'name' => $request->name_english,
					'visible' => $visible,
				],
				'ar' => [
					'name' => $request->name_arabic,
					'visible' => $visible,
				],
			];
		 
			$category = Category::findOrFail($id);
			$category->update($category_data);
		}
		
		return redirect('/category');
	}

	public function addReview($id)
	{
		$category = Category::findOrFail($id);

		return redirect('categories/'.$id)->with('message', trans('main.success_adding'));

	}

	public function archive($id) {

		$category = Category::findOrFail($id);
		$categoriesTranslation = CategoryTranslation::where('category_id', $category->id)->get();

		foreach($categoriesTranslation as $categoryTranslation) {
			$categoryTranslation->is_archived = 1;
			$categoryTranslation->save();
		}

		return redirect()->back();
	}
}
