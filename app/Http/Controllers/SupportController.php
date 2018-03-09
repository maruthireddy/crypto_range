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

class SupportController extends Controller
{
	public function insert(){

			return view('/crypto_range/support');
		
	}

	
   

}