<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Customer;
use App\Http\Requests\MouldRequest;
use App\Http\Requests\NullRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class CustomerController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function __construct() {

	}

    public function getCustomers() {

		return $customers = Customer::latest();
	}


	public function index() {

		$customers = $this->getCustomers()->paginate(50);

		return view('customers.index',compact('customers'));
	}

	public function show($id) {
		
		$customer = Customer::findOrFail($id);

		return view('customers.show',compact('customer'));
	}

	public function create()
	{
		return view('customers.create');
	}

	public function store(Request $request) {
        //dd($request->all());
        $this->validator($request->all())->validate();
        $customer = Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'birth_date' => $request['birth_date'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/customer');
	}


	public function edit($id) {
		
	}

	public function update($id,Request $request) {

		
    }
    
    public function activate($id) {
		
		$customer = Customer::findOrFail($id);
        $customer->activate_account = 1;
        $customer->save();

		return redirect('/customers');
    }
    
    public function deactivate($id) {
		
		$customer = Customer::findOrFail($id);
        $customer->activate_account = 0;
        $customer->save();

		return redirect('/customers');
    }
    
}
