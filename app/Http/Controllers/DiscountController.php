<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Discount;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;

class DiscountController extends Controller
{

    public function __construct() {


	}

    public function getDiscounts() {

        return $discounts = Discount::latest();
   
	}

	public function index() {

		$discounts = $this->getDiscounts()->paginate(10);
		
		return view('discounts.index',compact('discounts'));
	}

	public function show($id) {
        
	}

	public function create() {

		return view('discounts.create');
	}

	public function store(Request $request) {

        $discount = Discount::create($request->all());

        return redirect('/discount');
	}


	public function edit($id) {

        $discount= Discount::findOrFail($id);

		return view('discounts.edit',compact('discount'));
        
	}

	public function update($id,Request $request) {

        $discount= Discount::findOrFail($id);
        $discount->update($request->all());
        $discount->save();

        return redirect('/discount');
	}

	public function destroy($id) {

        $discount = Discount::findOrFail($id);
        $discount->delete();

		return redirect('/discount');
	}
	
	public function check($id) {
    	$Discount = Discount::where('code', '=',$id)->get();
        return response()->json(array('Discount'=> $Discount[0]), 200);
    }
}
