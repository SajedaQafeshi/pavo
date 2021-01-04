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

class FavoriteController extends Controller
{
    public function __construct() {
	}

    public function getCategoryById(Request $request) {

    	$category = Category::where($request::input('id'))->get();

    	return $category;
    }

    public function getCategories() {

        return $categories = Category::where('point_counter', '>', 0)->latest();
        
	}

	public function index() {

		$categories = $this->getCategories()->paginate(50);
    
		return view('categories.index',compact('categories'));
	}
}