<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Setting;
use App\Model\SettingTranslation;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;

class SettingController extends Controller
{

    	public function __construct()
	{


	}

  

    public function getSettings()
	{

		return $settings = Setting::latest();
			}


	public function index() {

		$settings = $this->getSettings()->paginate(50);

		return view('settings.index',compact('settings'));
	}

	public function show($id) {
		$setting = Setting::findOrFail($id);

		return view('settings.show',compact('setting'));
	}

	public function create()
	{
		return view('settings.create');
	}

	public function store(Request $request) {

		$setting_data = [
			'en' => [
				'about_us' => $request->about_us_english,
				'delivery' => $request->delivery_english,
				'about_products' => $request->about_products_english,
				'support' => $request->support_english,
			],
			'ar' => [
				'about_us' => $request->about_us,
				'delivery' => $request->delivery,
				'about_products' => $request->about_products,
				'support' => $request->support,
			],
		];
	 
		Setting::create($setting_data);

		return redirect('/setting');
	}


	public function edit($id) {
		$setting = Setting::findOrFail($id);

		return view('settings.edit',compact('setting'));
	}

	public function update($id,Request $request) {

		$setting_data = [
			'en' => [
				'about_us' => $request->about_us_english,
				'delivery' => $request->delivery_english,
				'about_products' => $request->about_products_english,
				'support' => $request->support_english,
			],
			'ar' => [
				'about_us' => $request->about_us,
				'delivery' => $request->delivery,
				'about_products' => $request->about_products,
				'support' => $request->support,
			],
		];

		$setting = Setting::findOrFail($id);
		$setting->update($setting_data);
 

		return redirect('/setting');
	}

	public function addReview($id)
	{
		$setting = Setting::findOrFail($id);

		return redirect('settings/'.$id)->with('message', trans('main.success_adding'));

	}

	public function archive($id) {

		$setting = Setting::findOrFail($id);
		$settingsTranslation = SettingTranslation::where('setting_id', $setting->id)->get();

		foreach($settingsTranslation as $settingTranslation) {
			$settingTranslation->is_archived = 1;
			$settingTranslation->save();
		}

		return redirect()->back();
    }
}
