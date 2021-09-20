<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Farmer;

use App\Models\PaymentDetail;

use App\Models\CollectionDetail;

use Auth;

use Yajra\Datatables\Datatables;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;

use AfricasTalking\SDK\AfricasTalking;



class FarmerController extends Controller
{
    //
      public function newfarmer()
    {
    	return view('clerk.farmers');
    }


    public function newcollection()
    {
    	$farmers = Farmer::all();
    	return view('clerk.produce',compact('farmers'));
    }



    public function getfarmer()
    {
    	 $faculties = Farmer::query();
        return Datatables::of($faculties)->addColumn('action', function ($faculties) {

            return '<div class="btn-group" role="group" aria-label="user">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-eye"></i></button>
                        <a href="/farmer_destroy/'.$faculties->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                      
                    </div>';
              
        })->make(true);
    	
    }

    public function getcollections()
    {
    	 $faculties = CollectionDetail::query();
        return Datatables::of($faculties)->addColumn('action', function ($faculties) {

            return '<div class="btn-group" role="group" aria-label="user">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-eye"></i></button>
                        <a href="/farmer_destroy/'.$faculties->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                      
                    </div>';
              
        })->make(true);
    	
    }



    public function storefarmer(Request $request)
    {

    	 $this->validate($request, [
                                      'phone_number' => 'required|unique:farmers',
                                      'phone_number' => 'required:numeric',
                                      'fname' => 'required',
                                      'sname' => 'required'
                                  ]
                                ); 

    	$farmer = new Farmer();

		$farmer->fname = $request->input('fname');

		$farmer->sname = $request->input('sname');

		$farmer->phone_number = $request->input('phone_number');

		$farmer->email = $request->input('email');

		$farmer->status = 'Active';

		$farmer->save();

		return back()->with('status','successfuly registered');


    	
    }

     public function storecollection(Request $request)
    {
    	 $this->validate($request, [
                                      'transaction_id' => 'required|unique:collection_details',
                                      'total_cost' => 'required:numeric',
                                      'total_weight' => 'required:numeric',
                                      'collection_date' => 'required',
                                   
                                  ]
                                ); 

    	$collect = new CollectionDetail();

		$collect->farmer_id = $request->input('farmer_id');

		$collect->collection_date = $request->input('collection_date');

		$collect->transaction_id = strtoupper($request->input('transaction_id'));

		$collect->total_cost = $request->input('total_cost');

		$collect->total_weight = $request->input('total_weight');

		$collect->clerk_id =\Auth::user()->email;
	 
	 	$collect->status = 'Received';

		$collect->save();

		$farmer = Farmer::all()->where('id',$request->input('farmer_id'))->first();

		$username = 'dymaholding'; // use 'sandbox' for development in the test environment
		$apiKey   = 'a04ac6aa0c8439c6ad748a95bc21c100075f8495e79f81a1da58b89c92495b75'; // use your sandbox app API key for development in the test environment
		$AT       = new AfricasTalking($username, $apiKey);

		// Get one of the services
		$sms      = $AT->sms();

		// Use the service
		$result   = $sms->send([
		    'to'      => '+254'.$farmer->phone_number,
		    'message' => 'Hello '.$farmer->sname.'!, Received your tea produce '.$request->input('total_weight').'Kg and costing '.$request->input('total_cost').'Ksh.'
		]);

		return back()->with('status','successfuly registered');
    }

    public function sendmessage()
    {
    


print_r($result);
    }


}
