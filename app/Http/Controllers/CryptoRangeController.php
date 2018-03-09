<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Redirect;
use Carbon;
use Cache;
use Redis;
use Log;
use DateTime;

class CryptoRangeController extends Controller
{
	public function index(){

		if(Session::has('user')){

		 return redirect('/crypto_range/dashboard');

		}else{
			
			return view('index');
		}
	}

	public function signin(){
		return view('signin');			
	}

	public function signup(Request $request){

		$referral_id = $request->referral;

		if(isset($referral_id)){
			return view('signup',compact('referral_id'));
		}else{
			return view('signup');
		}

    	
		
	}

	public function services(){
		return view('services');				
	}
    public function plans(){
        return view('plans');
    }
    public function blog(){
        return view('blog');
    }
    public function mail(){
        return view('emails.mailcheck');
    }
   

}