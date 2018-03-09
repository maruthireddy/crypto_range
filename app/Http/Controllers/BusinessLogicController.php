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
use App\User;
use Config;
use Validator;
use App\Models\UserReferral;
use App\Models\CryptoRangeWallet;

class BusinessLogicController extends Controller
{
	public function register(Request $request){

		// dd($request->all());

		    $validator = Validator::make($request->all(), [
					'first_name' => 'required',
           			'last_name' => 'required',
           			'email' => 'required',
					'password' => 'required',
			 ]);

			 if ($validator->fails()) {

			 	return  Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
			 }

		$apiKey = Config::get('app.apiKey');
		$version = Config::get('app.version');
		$pin = Config::get('app.pin');

			$verification_key = $this->generateVerificationKey();
		    $name = $request->first_name.' '.$request->last_name;
          	$email = $request->email;

  //         	$mailContent = "User Name : ".$name.', Please verify your email.';
		// 	\Mail::send('emails.verify_email', ['mailContent' => $mailContent,'verification_key' => $verification_key], function($message)use ($email,$name,$verification_key) {
  //           	$message->to($email, $name)
  //               	->subject('Crypto Range Verification');
  //       	});
		// dd($apiKey);
		try{
			$block_io=new BlockIo($apiKey,$pin,$version);

			$bitcoin_add=array();
			$bitcoin_new_add=json_encode($block_io->get_new_address(array()));
			$bitcoin_data = json_decode($bitcoin_new_add, true);
			$bitcoin_address=$bitcoin_data['data']['address'];


			$referral_key = $this->generateReferralKey();
			$ip_address = \Request::ip();
		}catch(\Exception $e){
				return Redirect::back()->withErrors($e->getMessage());
		}

		try{


			$user_register = User::create([
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'verification_key' => $verification_key,
				'bitcoin_add' => $bitcoin_address,
				'referral_key' => $referral_key,
				'ip_address' => $ip_address,
				'status' => 0,
			]);

			$qr_code_name = str_random(8).'-'.$user_register->id;

			$renderer = new \BaconQrCode\Renderer\Image\Png();
        	$renderer->setHeight(256);
        	$renderer->setWidth(256);
        	$writer = new \BaconQrCode\Writer($renderer);

        	$path = public_path('qr_code').'/';
        	$writer->writeFile(''.$bitcoin_address.'', 'qr_code/'.$qr_code_name.'.png');

			$user = User::find($user_register->id);
          	$user->qr_code = 'qr_code/'.$qr_code_name.'.png';
          	$user->save();

          	$refer = $request->refer;

          	if(isset($refer)){

          		$user_by = User::where('referral_key','like',$refer)->first();
          		$user_ref = new UserReferral();
          		$user_ref->user_referred_by = $user_by->id;
          		$user_ref->user_referred = $user_register->id;
          		$user_ref->save();

          	}

          	$user_trade = new CryptoRangeWallet();
          	$user_trade->user_id = $user_register->id;
          	$user_trade->save();

          	$name = $request->first_name.' '.$request->last_name;
          	$email = $user_register->email;

          	$mailContent = "User Name : ".$name.', Please verify your email.';
			\Mail::send('emails.verify_email', ['mailContent' => $mailContent,'verification_key' => $verification_key], function($message)use ($email,$name,$verification_key) {
            	$message->to($email, $name)
                	->subject('Crypto Range Verification');
        	});



          	// $user_register->id

          	return redirect('/signin');


		 }catch(\Exception $e){
			return Redirect::back()->withErrors($e->getMessage());
		 }

	}


	public function login(Request $request){

		Session::forget('user');

        $credentials = $request->only('email', 'password');
        $token = null;
        // dD(1);
        try {
        	$user = Auth::attempt($credentials);

        	if ($user === true) {

        		$user = User::where('email','like','%'.$request->email.'%')->where('user_role','=',1)->first();
        		// dd($user->status);      		
        		Session::put('user',$user);

           	}else{

           		return Redirect::back()->withErrors(['Invalid email or password']);

           	}


        	// dd(Session::get('user')->first_name);

        } catch (Exception $e) {
            return Redirect::back()->withErrors(['Invalid email or password']);
        }

         		if($user->status==0){

        			// Auth::logout();
					//Session::forget('user');

					return Redirect::back()->withErrors(['Please verify your email']);
        		}else{
        			 return redirect('/crypto_range/dashboard');
        		}


       
                        // ->withErrors()
                        // ->withInput();
    }

    public function generateReferralKey(){

		$referral_key = str_random(10);

		$check = User::where('referral_key','like','%'.$referral_key.'%')->count();

		if($check>0){

			$this->generateReferralKey();

		}

		return $referral_key;
	}

	public function logout(){

		Auth::logout();
		Session::forget('user');
		Session::forget('admin');

		return redirect('/');
	}

	public function emailVerification($verification_key){

		$verification_key = $verification_key;

		// if(Session::has('user')){
		// 	$user_id = Session::get('user')->id;	
		// }else{
		// 	return redirect('/signin')->with('message', 'Please signin to verify email');	
		// }
		
				

		$user = User::where('verification_key','like','%'.$verification_key.'%')->first();

		if(isset($user)){

			$user = User::where('verification_key','like','%'.$verification_key.'%')->update(['status'=>1]);
			return redirect('/signin')->with('message', 'Congrats! Successfully verified');

		}else{
			return redirect('/signin')->with('message', 'Try again! Email Not verified');	
		}	
	}

	public function forgotPassword(Request $request){
			
		Auth::logout();
		Session::forget('user');

		return view('forgot_password');
	}

	public function sendLink(Request $request){
			
		Auth::logout();
		Session::forget('user');

        $user = User::where('email','like','%'.$request->email.'%')->first();

        if(!isset($user)){
        	return Redirect::back()->withErrors(['Email is not register with us.']);
        }else{

        	$verification_key = $this->generateVerificationKey();

        	$user->verification_key = $verification_key;
        	$user->save();

        	$name = $user->first_name.' '.$user->last_name;
          	$email = $user->email;

          	$mailContent = "User Name : ".$name.'';
			\Mail::send('emails.reset_email', ['mailContent' => $mailContent,'verification_key' => $verification_key], function($message)use ($email,$name,$verification_key) {
            	$message->to($email, $name)
                	->subject('Crypto Range Verification');
        	});


        }

           	

		return view('reset_email',compact($request->email));
	}

	public function resetPassword($key){
		return view('reset_password',compact('key'));
	}

	public function generateVerificationKey(){

		$referral_key = str_random(10);

		$check = User::where('verification_key','like','%'.$referral_key.'%')->count();

		if($check>0){

			$this->generateReferralKey();

		}

		return $referral_key;
	}



	public function resetUserPassword(Request $request){

		$user = User::where('verification_key','like','%'.$request->key.'%')->first();
		// dd($user);
		if(!isset($user)){
			return Redirect::back()->withErrors(['Invaild request']);
		}else{

			$user->password = bcrypt($request->password1);
			$user->save();

			return redirect('/signin')->with('message', 'Successfully Changed password, Please sign-in');
		}

	}


}
