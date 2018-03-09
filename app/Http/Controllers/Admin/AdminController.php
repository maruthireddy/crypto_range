<?php

namespace App\Http\Controllers\Admin;

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
use App\User;
use Config;
use Validator;
use App\Models\UserReferral;
use App\Models\CryptoRangeWallet;
use App\Models\Investment;
use App\Models\Withdraw;
use App\Models\UserTrade;
use App\Models\UserReferralTransfer;

class AdminController extends Controller
{

    public function index(){
        return view('admin/index');
    }

	public function login(Request $request){

		Session::forget('user');
        Session::forget('admin');

        $credentials = $request->only('email', 'password');
        $token = null;
        // dD(1);
        try {
        	$user = Auth::attempt($credentials);

        	if ($user === true) {

        		$user = User::where('email','like','%'.$request->email.'%')->where('user_role','=',2)->first();
        		// dd($user->status);      		
        		Session::put('admin',$user);

           	}else{

           		return Redirect::back()->withErrors(['Invalid email or password']);

           	}


        	// dd(Session::get('user')->first_name);

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['Invalid email or password']);
        }

         	
        return redirect('/admin/dashboard');
        		
    }

    public function dashboard(Request $request){

        if(!Session::has('admin')){
            return redirect('/');
        }

        if(isset($request->from_date) && isset($request->to_date)){
            
            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $user_count = User::whereDate('created_at','>=',$from_date)
                              ->whereDate('created_at','<=',$to_date)
                              ->count();

            $investment_count = Investment::whereDate('created_at','>=',$from_date)
                                          ->whereDate('created_at','<=',$to_date)
                                          ->sum('amount_usd');

            $withdraw_count = Withdraw::whereDate('created_at','>=',$from_date)
                                      ->whereDate('created_at','<=',$to_date)
                                      ->sum('amount');

            $daily_profit = UserTrade::whereDate('created_at','>=',$from_date)
                                     ->whereDate('created_at','<=',$to_date)
                                     ->sum('profit_amount');

            // dd($user_count,$investment_count,$withdraw_count,$daily_profit);


        }else{

            $user_count = User::count();
            $investment_count = Investment::sum('amount_usd');
            $withdraw_count = Withdraw::sum('amount');
            $daily_profit = UserTrade::sum('profit_amount');

        }


        return view('admin/dashboard',compact('user_count','investment_count','withdraw_count','daily_profit'));


    }

    public function investmentLogs(Request $request){

        if(!Session::has('admin')){
            return redirect('/');
        }

        if(isset($request->from_date) && isset($request->to_date)){

            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $investments = Investment::join('users as u','u.id','=','investment.user_id')
                                    ->whereDate('investment.created_at','>=',$from_date)
                                    ->whereDate('investment.created_at','<=',$to_date)
                                    ->select(DB::raw('concat (u.first_name," ",u.last_name) as name'),'investment.*')
                                    ->get();
        }else{

            $investments = Investment::join('users as u','u.id','=','investment.user_id')->select(DB::raw('concat (u.first_name," ",u.last_name) as name'),'investment.*')->get();

        }

        return view('admin/investment',compact('investments'));

    }


    public function withdrawLogs(Request $request){

        if(!Session::has('admin')){
            return redirect('/');
        }

        if(isset($request->from_date) && isset($request->to_date)){

            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $withdraw = Withdraw::join('users as u','u.id','=','withdraw.user_id')
                                    ->whereDate('withdraw.created_at','>=',$from_date)
                                    ->whereDate('withdraw.created_at','<=',$to_date)
                                    ->select(DB::raw('concat (u.first_name," ",u.last_name) as name'),'withdraw.*')
                                    ->get();
        }else{

            $withdraw = Withdraw::join('users as u','u.id','=','withdraw.user_id')->select(DB::raw('concat (u.first_name," ",u.last_name) as name'),'withdraw.*')->get();

        }

        return view('admin/withdraw',compact('withdraw'));

    }

    public function dailyTransactionLogs(Request $request){
            
            if(!Session::has('admin')){
                return redirect('/');
            }

        if(isset($request->from_date) && isset($request->to_date)){

            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $trades = UserTrade::join('investment as i','i.id','=','user_trades.investment_id')
                                ->join('users as u','u.id','=','i.user_id')
                                ->whereDate('user_trades.created_at','>=',$from_date)
                                ->whereDate('user_trades.created_at','<=',$to_date)
                                ->select(DB::raw('concat (first_name," ",last_name) as name'),'i.investment_id','plan_name','user_trades.*')
                                ->get();
        }else{

            $trades = UserTrade::join('investment as i','i.id','=','user_trades.investment_id')
                                ->join('users as u','u.id','=','i.user_id')
                                ->select(DB::raw('concat (first_name," ",last_name) as name'),'i.investment_id','plan_name','user_trades.*')
                                ->get();
        }

        return view('admin/trades',compact('trades'));


    }

    public function userLogs(Request $request){
            
            if(!Session::has('admin')){
                return redirect('/');
            }
            // dd(1);

        if(isset($request->from_date) && isset($request->to_date)){

            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $users = User::whereDate('created_at','>=',$from_date)
                            ->whereDate('created_at','<=',$to_date)
                            ->select(DB::raw('concat (first_name," ",last_name) as name'),'created_at','bitcoin_add','email')
                            ->get();
        }else{

            $users = User::select(DB::raw('concat (first_name," ",last_name) as name'),'created_at','bitcoin_add','email')
                          ->get();
        }

        return view('admin/users',compact('users'));


    }

    public function referralLogs(Request $request){
            
            if(!Session::has('admin')){
                return redirect('/');
            }

        if(isset($request->from_date) && isset($request->to_date)){

            $to_date = $request->to_date;
            $from_date = $request->from_date;

            $user_referrals = UserReferralTransfer::join('users as u','user_referral_transfer.user_by','=','u.id')
                            ->join('users as uu','user_referral_transfer.user_to','=','uu.id')
                            ->whereDate('user_referral_transfer.created_at','>=',$from_date)
                            ->whereDate('user_referral_transfer.created_at','<=',$to_date)
                            ->select(DB::raw('concat (u.first_name," ",u.last_name) as name_by'),DB::raw('concat (uu.first_name," ",uu.last_name) as name_to'),'user_referral_transfer.*')
                            ->get();
        }else{

            $user_referrals = UserReferralTransfer::join('users as u','user_referral_transfer.user_by','=','u.id')
                            ->join('users as uu','user_referral_transfer.user_to','=','uu.id')
                            ->select(DB::raw('concat (u.first_name," ",u.last_name) as name_by'),DB::raw('concat (uu.first_name," ",uu.last_name) as name_to'),'user_referral_transfer.*')
                            ->get();
        }

        return view('admin/referral',compact('user_referrals'));


    }
}