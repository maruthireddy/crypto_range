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
use App\Models\UserReferral;
use App\Models\UserReferralTransfer;
use App\Models\UserTrade;

class TradingHistoryController extends Controller
{
	public function tradingHistory(){

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$user_id = Session::get('user')->id;
		$investments = Investment::where('user_id','=',$user_id)->pluck('id');

		$user_trades = UserTrade::join('investment as i','i.id','=','user_trades.investment_id')->whereIn('user_trades.investment_id',$investments)->select('user_trades.*','i.investment_id as invest_id')->get();
		// dd($user_trades);

		
		return view('crypto_range/trading_history',compact('user_trades'));
	}
}