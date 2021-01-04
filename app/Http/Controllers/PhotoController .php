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

class PhotoController extends Controller
{
    public function __construct() {
	}

	public function index() {
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

	public function addReview($id)
	{
	

	}

	public function destroy($id) {

        $photo = Photo::findOrFail($id);
        $photo->delete();

		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
