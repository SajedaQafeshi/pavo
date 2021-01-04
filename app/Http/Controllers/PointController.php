<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Point;
use App\Model\Order;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\PavoCristatusEmail;
use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;
use Image;

class PointController extends Controller
{

    public function __construct() {


	}

	public function getPoints() {
		return $orders = Point::get();
        
	}
	// public function getOrders() {

	// 	return $orders = Order::where('cutomer_check', 1)
	// 		->where('is_delivery', 1)
	// 		->latest();
	// }

	public function index() {
		$point = $this->getPoints();
	
		return view('point.index',compact('point'));
	}

	public function show($id) {
		
		
	}

	public function create() {

	}

	public function store(Request $request) {
        $point = Point::create($request->all());

        return redirect()->back();
    }
    
 

    public function edit($id) {
		$point= Point::findOrFail($id);

		return view('point.edit',compact('point'));
    }
    
    public function update($id, Request $request) {
		
		$point = Point::find($id);
		$point->max_point = $request->max_point;
		$point->value = $request->value;
		$point->save();

		return redirect('/point');
    }
    
    public function archive($id) {

		
    }
}
