<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\City;
use App\Model\CityTranslation;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;

class CityController extends Controller
{

    	public function __construct()
	{


	}

    public function getCityById(Request $request){

    	$city = City::where($request::input('id'))->get();

    	return $city;
    }

    public function getCities()
	{

		return $cities = City::latest();
			}


	public function index() {

		$cities = $this->getCities()->paginate(10);
		
		return view('cities.index',compact('cities'));
	}

	public function show($id) {
		$city = City::findOrFail($id);

		return view('cities.show',compact('city'));
	}

	public function create()
	{
		return view('cities.create');
	}

	public function store(Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$city_data = [
			'en' => [
				'name' => $request->name_english,
				'visible' => $visible,
			],
			'ar' => [
				'name' => $request->name_arabic,
				'visible' => $visible,
			],
		];
	 
		City::create($city_data);

		return redirect('/city');
	}


	public function edit($id) {
		$city= City::findOrFail($id);

		return view('cities.edit',compact('city'));
	}

	public function update($id,Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$city_data = [
			'en' => [
				'name' => $request->name_english,
				'visible' => $visible,
			],
			'ar' => [
				'name' => $request->name_arabic,
				'visible' => $visible,
			],
		];

		$city = City::findOrFail($id);
		$city->update($city_data);
	
		return redirect('/city');
	}

	public function addReview($id)
	{
		$city = City::findOrFail($id);

		return redirect('cities/'.$id)->with('message', trans('main.success_adding'));

	}

	public function archive($id) {

		$cities = City::findOrFail($id);
		$cityTran = CityTranslation::where('city_id', $cities->id)->get();

		foreach($cityTran as $city) {
			$city->is_archived = 1;
			$city->save();
		}

		return redirect()->back();
    }
}
