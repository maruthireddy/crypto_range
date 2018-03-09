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
use App\Models\Withdraw;
use App\Models\CryptoRangeWallet;

class WithdrawController extends Controller
{
	public function withdraw(Request $request){

		// dd($request->all());
		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');
		$default_bit_address = Config::get('app.default_bit_address');
		$user_bitcoin_address = Session::get('user')->bitcoin_add;

		 $validator = Validator::make($request->all(), [
					'address' => 'required',
           			'amount' => 'required',
           			'password' => 'required',
		]);

			 if ($validator->fails()) {

			 	return  Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
			 }

			
			 $login = array();
			 $login['password'] = $request->password;
			 $login['email'] = Session::get('user')->email;
			
        	$user = Auth::attempt($login);
        	
        	if ($user === true) {
        		
       			// do nothing
           	
           	}else{

           		return Redirect::back()->withErrors(['Invalid password']);

           	}





		try{

			$to_addresses = $request->address;
			$amount = $request->amount;

			$block_io=new BlockIo($apiKey,$pin,$version);

			$withdrawresponse=json_encode($block_io->withdraw_from_addresses(array('amounts' => $amount, 'from_addresses' => $user_bitcoin_address, 'to_addresses' => $to_addresses)));

			$resp=json_decode($withdrawresponse,true);

			if($resp['status']=='success'){

				return redirect()->back()->with('message', 'Congrats! Transaction is Success');

			}elseif($resp['status']=='fail'){

				return Redirect::back()->withErrors(['Sorry! Transction Failed, Please try again.']);

			}


        }catch(\Exception $e){
        	return Redirect::back()->withErrors([$e->getMessage()]);
		}
	}

	public function walletWithdraw(Request $request){

		// dd($request->all());

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$user_id = Session::get('user')->id;

		$validator = Validator::make($request->all(), [
					'amout_usd' => 'required',
		]);

		if ($validator->fails()) {

		 	return  Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
		}

		$amout_usd = $request->amout_usd;


		$wallet = CryptoRangeWallet::where('user_id','=',$user_id)->first();
		if($wallet->balance<10 && $wallet->balance<=$amout_usd){
			return Redirect::back()->withErrors(['Withdraw amount must be greater than available balance']);	

		}
	



		
		$to_addresses = Session::get('user')->bitcoin_add;

		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');
		$from_addresses = Config::get('app.default_bit_address');


		$start = Carbon::now()->toDateTimeString();
		$end = Carbon::now()->addDays(1)->toDateTimeString();


		$withdraw = new Withdraw();

		$withdraw->user_id = $user_id;
		$withdraw->amount = $amout_usd;
		$withdraw->status = 'processing';
		$withdraw->start = $start;
		$withdraw->end = $end;
		$withdraw->to_address = $to_addresses;
		$withdraw->save();

		$wallet = CryptoRangeWallet::where('user_id','=',$user_id)->first();

		$withdraw_count = $wallet->withdrawn + $amout_usd;
		$balance = $wallet->balance - $withdraw_count;
		// $wallet->bitcoin_add = $to_addresses;
		$wallet->withdrawn = $withdraw_count;
		$wallet->balance = $balance;
		$wallet->save();

		return redirect('/crypto_range/dashboard')->with('message', 'Congrats! Successfully Withdraw');


	}

}