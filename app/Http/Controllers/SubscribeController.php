<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\SubscriptionEmail;
use App\Model\Subscription;

use Illuminate\Support\Facades\Mail;
use App\Mail\PavoCristatusEmail;
use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Auth;
use Image;

class SubscribeController extends Controller
{

    public function __construct() {


	}

	public function getSubscribtions() {

        return $subscribtions = Subscription::latest();
        
	}


	public function index() {

		$subscribtions = $this->getSubscribtions()->paginate(20);
        $success = "";

		return view('subscribtions.index',compact('subscribtions', 'success'));
	}

	public function show($id) {

		$emails = SubscriptionEmail::get();
        $subscribe = Subscription::findOrFail($id);

        foreach($emails as $email) {
            $subscribtionEmails = new PavoCristatusEmail($subscribe->title, $subscribe->body,
            $subscribe->image, $subscribe->discount);
            $to_email = $email->email;
            Mail::to($to_email)->send($subscribtionEmails);
        }
            
        $success = "تم ارسال الايميلات";
        $subscribtions = $this->getSubscribtions()->paginate(20);

		return view('subscribtions.index',compact('subscribtions', 'success'));	
	}

	public function create() {

		return view('subscribtions.create');
	}

	public function store(Request $request) {
        $subscribe = SubscriptionEmail::create($request->all());

        return response()->json([ 'success'=> 'شكرا لثقتك والاشتراك معنا!']);
    }
    
    public function storeSubscribtion(Request $request) {

        $subscribe = new Subscription();
       
        if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/subscribtions/'.$extra_name));
            $path = public_path('storage/subscribtions/'.$extra_name);
            $subscribe->image =  $extra_name;
        }
       
        $subscribe->title =  $request->title;
        $subscribe->discount =  $request->discount;
        $subscribe->body =  $request->body;
        $subscribe->save();

        return redirect('/subscribe');
    }

    public function edit($id) {
		$subscribe= Subscription::findOrFail($id);

		return view('subscribtions.edit',compact('subscribe'));
    }
    
    public function update($id,Request $request) {

        $subscribe = Subscription::findOrFail($id);
        $extra_name = $subscribe->image;
		if ($request->file('image')) {
            $photo = $request->file('image');
            $original_name = $photo->getClientOriginalName();
            $extra_name  = uniqid().'_'.time().'_'.uniqid().'.'.$photo->extension();
            $encoded_base64_image = substr($photo, strpos($photo, ',') + 1);
            $resized_image = Image::make($photo->getRealPath());
            $resized_image->save(public_path('storage/subscribtions/'.$extra_name));
            $path = public_path('storage/subscribtions/'.$extra_name);
            $subscribe->image =  $extra_name;

        } 
        $subscribe->title =  $request->title;
        $subscribe->discount =  $request->discount;
        $subscribe->body =  $request->body;
        $subscribe->image =  $extra_name;
        $subscribe->save();

        
		return redirect('/subscribe');
    }
    
    public function archive($id) {

		$subscribe = Subscription::findOrFail($id);
		$subscribe->delete();

		return redirect()->back();
    }
}
