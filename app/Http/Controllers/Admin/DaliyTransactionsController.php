<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Plans;
use App\Models\AdminTransaction;

class DaliyTransactionsController extends Controller
{


	public function profit(){

		if(!Session::has('admin')){
            return redirect('/');
        }

		$admin_trades = AdminTransaction::get();

		return view('admin/profit',compact('admin_trades'));

	}

	public function dailyTransaction(Request $request){
			// dd($request->all());
		$percentage = $request->percentage;
		$plans = $request->plans;

		$plan_name = $this->planDate($plans);
		$plan_name = $plan_name['plan_name'];

		$check_x = AdminTransaction::where('plan_id','like',$plans)->whereDate( 'created_at', '=', Carbon::now()->toDateString())->count();
		// dd($check_x,Carbon::now()->toDateString());
		if($check_x>0){
		
			return Redirect::back()->withErrors(['Admin transaction completed for the '.$plans.' today']);

		}

		$update_status = Investment::where('status','like','%active%')
								->whereDate( 'end_date', '<', Carbon::now()->toDateString())
								->update(['status'=>'completed']);

		$investments = Investment::where('status','like','%active%')
								->whereDate( 'end_date', '>=', Carbon::now()->toDateString())
								->get();

		foreach ($investments as $i) {

			$profit_amount = ($i->amount_usd/100) * $percentage;

			$profit = $i->profit_earned + $profit_amount;

			$invest = Investment::find($i->id);
			$invest->profit_earned = $profit;
			$invest->update();

			$user_trade = new UserTrade();
			$user_trade->investment_id = $i->id;
			$user_trade->plan_id = $plans;
			$user_trade->profit_amount = $profit_amount;
			$user_trade->profit_percentage = $percentage;
			$user_trade->save();

			$description = $percentage."% for ".$plans;
		}

		$trans = new AdminTransaction();
		$trans->plan_id	 = $plans;
		$trans->profit_percentage = $percentage;
		$trans->description = $description;
		$trans->admin_name = Session::get('admin')->first_name.' '.Session::get('admin')->last_name;
		$trans->save();
		// dd($investment);
		$update_status = Investment::where('status','like','%active%')
								->whereDate( 'end_date', '=', Carbon::now()->toDateString())
								->update(['status'=>'completed']);

		return redirect()->back()->with('message', 'Successfully updated for '.$plans);

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