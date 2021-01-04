<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Advertisnment;
use App\Model\AdvertisnmentTranslation;

use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;
use Image;

class AdvertisnmentController extends Controller
{

    	public function __construct()
	{


	}

    public function getAdvertisnmentById(Request $request){

    	$advertisnment = Advertisnment::where($request::input('id'))->get();

    	return $advertisnment;
    }

    public function getAdvertisnments()
	{

		return $advertisnments = Advertisnment::latest();
			}


	public function index() {

		$advertisnments = $this->getAdvertisnments()->paginate(10);

        //die($advertisnments);
		return view('advertisnments.index',compact('advertisnments'));
	}

	public function show($id) {
		$advertisnment = Advertisnment::findOrFail($id);

		return view('advertisnments.show',compact('advertisnment'));
	}

	public function create()
	{
		return view('advertisnments.create');
	}

	public function store(Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

        $type;
		if($request->type == "main") $type = "main";
        else $type = "major";
        
        $extra_name= "";

        if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/advertisnment/'.$extra_name));
            $path = public_path('storage/advertisnment/'.$extra_name);
        }

        $advertisement = new Advertisnment();
        $advertisement->image = $extra_name;
		$advertisement->save();
		$advertisementId = $advertisement->id;
        
        $data = array(
			array(
				'title' => $request->title_arabic,
                'description' =>  $request->description_arabic,
                'type' => $type,
                'visible' => $visible,
                'image' => $extra_name,
				'advertisnment_id' => $advertisementId,
				'locale' => 'ar'
			),

			array(
				'title' => $request->title_english,
                'description' =>  $request->description_english,
                'type' => $type,
                'visible' => $visible,
                'image' => $extra_name,
				'advertisnment_id' => $advertisementId,
				'locale' => 'en'
			),
			
		);

        AdvertisnmentTranslation::insert($data);
        
		return redirect('/advertisnment');
	}


	public function edit($id) {
		$advertisnment= Advertisnment::findOrFail($id);

		return view('advertisnments.edit',compact('advertisnment'));
	}

	public function update($id,Request $request) {

		$visible;
		if($request->visible == "yes") $visible = 1;
		else $visible = 0;

        $type;
		if($request->type == "main") $type = "main";
        else $type = "major";
        
        if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/advertisnment/'.$extra_name));
            $path = public_path('storage/advertisnment/'.$extra_name);
			
            $advertisnment_data = [
                'en' => [
                    'title' => $request->title_english,
                    'description' =>  $request->description_english,
                    'type' => $type,
                    'visible' => $visible,
                    'image' => $extra_name
                ],
                'ar' => [
                    'title' => $request->title_arabic,
                    'description' =>  $request->description_arabic,
                    'type' => $type,
                    'visible' => $visible,
                    'image' => $extra_name
                ],
            ];
		 
        } else {
            $advertisnment_data = [
                'en' => [
                    'title' => $request->title_english,
                    'description' =>  $request->description_english,
                    'type' => $type,
                    'visible' => $visible,
                ],
                'ar' => [
                    'title' => $request->title_arabic,
                    'description' =>  $request->description_arabic,
                    'type' => $type,
                    'visible' => $visible,
                ],
            ];

            $advertisnment = Advertisnment::findOrFail($id);
		    $advertisnment->update($advertisnment_data);
        }

		return redirect('/advertisnment');
	}

	public function addReview($id)
	{
		$advertisnment = Advertisnment::findOrFail($id);

		return redirect('advertisnments/'.$id)->with('message', trans('main.success_adding'));

	}

	public function archive($id) {

		$advertisnment = Advertisnment::findOrFail($id);
		$advertisnmentsTranslation = AdvertisnmentTranslation::where('advertisnment_id', $advertisnment->id)->get();

		foreach($advertisnmentsTranslation as $advertisnmentTranslation) {
			$advertisnmentTranslation->is_archived = 1;
			$advertisnmentTranslation->save();
		}

		return redirect()->back();
    }
}
