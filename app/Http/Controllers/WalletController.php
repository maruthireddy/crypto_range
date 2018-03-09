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
use App\Models\CryptoRangeWallet;
use App\Models\UserReferral;
use App\Models\UserReferralTransfer;
use App\Models\UserTrade;

class WalletController extends Controller
{
	public function wallet(){

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');
		 $default_bit_address = Config::get('app.default_bit_address');
		// dd($apiKey);

		$bitcoin_address = Session::get('user')->bitcoin_add;
		try{
			$block_io=new BlockIo($apiKey,$pin,$version);

			$bitcoin_balance=array('addresses'=>$bitcoin_address);
			$bitcoin_new_balance=json_encode($block_io->get_address_balance(array('addresses'=>$bitcoin_address)));
			$bitcoin_data = json_decode($bitcoin_new_balance, true);

			$available_balance = $bitcoin_data['data']['available_balance'];

           



            $sent=$block_io->get_transactions(array('type' => 'sent', 'addresses' => $bitcoin_address));

			$received=$block_io->get_transactions(array('type' => 'received', 'addresses' => $bitcoin_address));
			// dd($sent,$received);

			if($sent->status!=="success"){
				return Redirect::back()->withErrors(['Whoops! Something went wrong. Try Again']);
			}else{
				$sent = $sent->data->txs;
			}

			if($received->status!=="success"){
				return Redirect::back()->withErrors(['Whoops! Something went wrong. Try Again']);
			}else{
				$received = $received->data->txs;
			}

				// dd($sent,$received);
				
			
				
			return view('crypto_range/wallet',compact('default_bit_address','available_balance','bitcoin_address','sent','received'));
		

		}catch(\Exception $e){
				return Redirect::back()->withErrors(['Whoops! Something went wrong. Try Again']);
		}
	}


	public function updateWallet(Request $request){

		$user_id = Session::get('user')->id;

		$total_active = Investment::where('user_id','=',$user_id)->where('status','like','%active%')->sum('amount_usd');

		$sum_of_complete = Investment::where('user_id','=',$user_id)->where('status','like','%completed%')->sum('amount_usd');

		$sum_profit =  Investment::where('user_id','=',$user_id)->sum('profit_earned');


		$referral_amt = UserReferralTransfer::where('user_to','=',$user_id)->sum('transfer_amount');

		$total_earnings = $sum_profit+$sum_of_complete+$referral_amt;

		$total_investment = Investment::where('user_id','=',$user_id)->sum('amount_usd');

		$wallet = CryptoRangeWallet::where('user_id','=',$user_id)->first();

		$balance = $total_earnings - $wallet->withdrawn;

		$wallet->active_investment = $total_active;
		$wallet->total_earning = $total_earnings;
		$wallet->balance = $balance;
		$wallet->total_investment = $total_investment;
		$wallet->save();

		return 1;

	}
}