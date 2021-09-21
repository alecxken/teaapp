<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Farmer;

use App\Models\PaymentDetail;

use App\Models\CollectionDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $pending = CollectionDetail::all()->where('status','Received')->sum('total_cost');
          $paid = CollectionDetail::all()->where('status','Paid')->sum('total_cost');
          $farmers = Farmer::all()->count();
        return view('home',compact('paid','pending','farmers'));
    }
}
