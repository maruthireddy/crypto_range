<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Cache;
use Redis;
use Log;
use DateTime;
use App\User;
use Config;
use Validator;
use Response;
use App\Models\Investment;

class TradingController extends Controller
{
	public function trading(){

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }


		$user_id = Session::get('user')->id;
		
		$investment = Investment::where('user_id','=',$user_id)->get();



    	 return view('crypto_range/trading',compact('investment'));
    }

}