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
use App\Models\CryptoRangeWallet;
use App\Models\Withdraw;
use App\Models\UserTrade;

class DashboardController extends Controller
{
	public function dashboard(Request $request){
		// dd(1);

		if(!Session::has('user')){

			Auth::logout();
			Session::forget('user');

            return redirect('/signin');
        }

		$user_id = Session::get('user')->id;

		$user = User::where('id','=',$user_id)->first();

		if($user->status==0){

   //   		Auth::logout();
			// Session::forget('user');

			return redirect('/signin')->withErrors(['Please verify your email']);
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

			$user_id = Session::get('user')->id;

			app('App\Http\Controllers\WalletController')->updateWallet($request);


			$dashboard_wallet = CryptoRangeWallet::where('user_id','=',$user_id)->first();

			$investments = Investment::where('user_id','=',$user_id)->pluck('id');

			$user_trades = UserTrade::join('investment as i','i.id','=','user_trades.investment_id')->whereIn('user_trades.investment_id',$investments)->select('user_trades.*','i.investment_id as invest_id')->get();

			$withdarws = Withdraw::where('user_id','=',$user_id)->get();
			// dd($withdarws);
			

			return view('crypto_range/dashboard',compact('available_balance','dashboard_wallet','user_trades','','withdarws'));

		}catch(\Exception $e){
				return Redirect::back()->withErrors(['Whoops! Something went wrong. Try Again']);
		}

		
       
                   
		
	}

	public function estimateBTCValue(Request $request){


		$amount = $request->amount;
		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');
		$default_bit_address = Config::get('app.default_bit_address');
		
		if(!isset($amount)){
			return Response::json(array('status'=>400,'message'=>"Please enter amount"))->header('vary', 'Accept-Encoding');
		}

		// dD($amount);

		try{


			$block_io=new BlockIo($apiKey,$pin,$version);

			$bitcoin_address = Session::get('user')->bitcoin_add;

			$bitcoin_balance=array('addresses'=>$bitcoin_address);
			$bitcoin_new_balance=json_encode($block_io->get_address_balance(array('addresses'=>$bitcoin_address)));
			$bitcoin_data = json_decode($bitcoin_new_balance, true);
			$bitcoin_balance=$bitcoin_data['data']['available_balance'];

			$estimate=$block_io->get_network_fee_estimate(array('amounts'=>$amount,'to_addresses'=>$bitcoin_address));

			// $resesti=array('response'=>$estimate);

			// dd($estimate->data->estimated_network_fee);

			// dd($bitcoin_balance);

			if($bitcoin_balance > $estimate->data->estimated_network_fee + $amount){

			}else{

				return Response::json(array('status'=>400,'message'=>"Cannot withdraw more than your available balance"))->header('vary', 'Accept-Encoding');

			}

			$calculate = $estimate->data->estimated_network_fee + $amount;

			$message = "Amount: ".$amount." + Networking Fees: ".$estimate->data->estimated_network_fee." = ".$calculate;



			// $status = "success";
   //      	$response =array("bitcoin_balance"=>$bitcoin_balance);
        	// $message = "your bitcoin balance ";

        	return Response::json(array('status'=>200,'message'=>$message))->header('vary', 'Accept-Encoding');

    	}catch(\Exception $e){

			return Response::json(array('status'=>400,'message'=>$e->getMessage()))->header('vary', 'Accept-Encoding');
		}

	}

	public function dashboardWallet(){

		$user_id = Session::get('user')->id;

		$dashboard_wallet = CryptoRangeWallet::where('user_id','=',$user_id)->first();

        	return Response::json(array('status'=>200,'dashboard_wallet'=>$dashboard_wallet))->header('vary', 'Accept-Encoding');
	}


	public function invest(Request $request){

		// dd($request->all());

		$entered_amt = $request->entered_amt;
		$plan_id = $request->plan_id;
		$entered_btc = $request->entered_btc;

		 $validator = Validator::make($request->all(), [
					'entered_amt' => 'required',
           			'plan_id' => 'required',
           			'entered_btc' => 'required',
			 ]);

			 if ($validator->fails()) {

			 	return  Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
			 }

		

		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');
		$default_bit_address = Config::get('app.default_bit_address');
		$user_bitcoin_address = Session::get('user')->bitcoin_add;

		try{

			$block_io=new BlockIo($apiKey,$pin,$version);

			$withdrawresponse=json_encode($block_io->withdraw_from_addresses(array('amounts' => $entered_btc, 'from_addresses' => $user_bitcoin_address, 'to_addresses' => $default_bit_address)));

			$resp=json_decode($withdrawresponse,true);


			if($resp['status']=='success'){

				$investment_id = $this->generateTransaction();
				$end_date = $this->planDate($plan_id);

				$plan_name = $end_date['plan_name'];
				$end_date = $end_date['end_date'];

				$invest_data = new Investment();
				$invest_data->user_id = Session::get('user')->id;
				$invest_data->investment_id = $investment_id;
				$invest_data->plan_id = $plan_id;
				$invest_data->plan_name = $plan_name;
				$invest_data->amount_btc = $entered_btc;
				$invest_data->amount_usd = $entered_amt;
				$invest_data->balance_amount = 0;
				$invest_data->witdraw_amount = 0;
				$invest_data->profit_earned = 0;
				$invest_data->end_date = $end_date;
				$invest_data->from_address = $user_bitcoin_address;
				$invest_data->to_address = $default_bit_address;
				$invest_data->status = 'active';
				$invest_data->save();

				$percentage = ($entered_amt/100) * 5;

				$user_id = Session::get('user')->id;
				$users_by = UserReferral::where('user_referred','=',$user_id)->get();

				foreach ($users_by as $u) {

					$transfer = new UserReferralTransfer();
					$transfer->user_by = $user_id;
					$transfer->user_to = $u->user_referred_by;
					$transfer->transfer_amount = $percentage;
					$transfer->investment_id = $invest_data->id;
					$transfer->save();
				}

				return redirect()->back()->with('message', 'Congrats! Successfully Invested');

			}elseif($resp['status']=='fail'){

				return Redirect::back()->withErrors(['Sorry! Transction Failed, Please try again.']);

			}



		}catch(\Exception $e){

			return Redirect::back()->withErrors(['Sorry! Transction Failed, Please try again.']);
		}

		

		


	}



	public function generateTransaction(){
		
		$investment_id = str_random(10);

		$check = Investment::where('investment_id','like','%'.$investment_id.'%')->count();
		if($check>0){

			$this->generateTransaction();

		}

		return $investment_id;
	}

	public function planDate($plan_id){

		$date = Carbon::now()->addDays(7)->toDateTimeString();
		// dd($date);
		$data = array();

		switch ($plan_id) {
    		case "PLAN001":
    				$date = Carbon::now()->addDays(7)->toDateTimeString();
    				$data['end_date'] = $date;
    				$data['plan_name'] = "Range_1";
        		return $data;
    		
    		case "PLAN002":
    				$date = Carbon::now()->addDays(30)->toDateTimeString();

        		$data['end_date'] = $date;
    				$data['plan_name'] = "Range_2";
        		return $data;
        	
        	case "PLAN003":

        		$date = Carbon::now()->addDays(60)->toDateTimeString();
        		$data['end_date'] = $date;
    				$data['plan_name'] = "Range_3";
        		return $data;
        	
        	case "PLAN004":
        		
        		$date = Carbon::now()->addDays(90)->toDateTimeString();
        		$data['end_date'] = $date;
    				$data['plan_name'] = "Range_4";
        		return $data;

	    	default:
    	    	return null;
		}

	}



}