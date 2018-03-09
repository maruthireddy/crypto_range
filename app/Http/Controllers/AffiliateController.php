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

class AffiliateController extends Controller
{
	public function affiliate(){

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$user_id = Session::get('user')->id;

		$transfers = UserReferralTransfer::join('users as u','u.id','=','user_referral_transfer.user_by')
										->join('investment as i','i.user_id','=','user_referral_transfer.user_by')
										->where('user_referral_transfer.user_to','=',$user_id)
										->select('u.first_name','u.last_name','user_referral_transfer.*','user_referral_transfer.investment_id','i.amount_usd','i.id as iv_id')
										->distinct('i.iv_id')
										->get();
		

		$collection = collect($transfers);
		$unique = $collection->unique('iv_id');
		$transfers = $unique->values()->all();

		$collection = collect($transfers);
		$total_lend = $collection->sum('amount_usd');

		$total_amount = UserReferralTransfer::where('user_to','=',$user_id)->sum('transfer_amount');
		// dd($total_amount);

		return view('crypto_range/affiliate',compact('transfers','total_amount','total_lend'));
	}
}