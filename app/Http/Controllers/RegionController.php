<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Region;
use App\Model\RegionTranslation;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;

class RegionController extends Controller
{

    public function __construct()
	{


	}

    public function getCityById(Request $request){

    	$region = Region::where($request::input('id'))->get();

    	return $region;
    }

    public function getRegions()
	{

		return $regions = Region::latest();
			}


	public function index() {

		$regions = $this->getRegions()->paginate(50);

		return view('regions.index',compact('regions'));
	}

	public function show($id) {
		
		$region = Region::findOrFail($id);

		return view('regions.show',compact('region'));
	}

	public function create()
	{
		return view('regions.create');
	}

	public function store(Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$region_data = [
			'en' => [
				'name' => $request->name_english,
				'visible' => $visible,
				'price' => $request->price
			],
			'ar' => [
				'name' => $request->name_arabic,
				'visible' => $visible,
				'price' => $request->price
			],
		 ];
	 
		Region::create($region_data);


		return redirect('/region');
	}


	public function edit($id) {
		$region= Region::findOrFail($id);

		return view('regions.edit',compact('region'));
	}

	public function update($id,Request $request) {

		$region = Region::findOrFail($id);
		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

		$region_data = [
			'en' => [
				'name' => $request->name_english,
				'visible' => $visible,
				'price' => $request->price
			],
			'ar' => [
				'name' => $request->name_arabic,
				'visible' => $visible,
				'price' => $request->price
			],
		];
	 
		$region = Region::findOrFail($id);
		$region->update($region_data);
	
		return redirect('/region');
	}

	public function addReview($id)
	{
		$region = Region::findOrFail($id);

		return redirect('regions/'.$id)->with('message', trans('main.success_adding'));

	}

	public function archive($id) {

		$region = Region::findOrFail($id);
		$regionsTranslation = RegionTranslation::where('region_id', $region->id)->get();

		foreach($regionsTranslation as $regionTranslation) {
			$regionTranslation->is_archived = 1;
			$regionTranslation->save();
		}

		return redirect()->back();
    }
}
