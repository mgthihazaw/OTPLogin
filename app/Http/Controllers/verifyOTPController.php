<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;

class verifyOTPController extends Controller
{
    public function verify(Request $request){
// dd(auth()->user()->getOTP());
$this->validate($request,[
 'OTP' =>'required',
]);
      if($request['OTP'] ==Cache::get(auth()->user()->OTPkey())){
          auth()->user()->update(['isVerified' => true]);
          return view('home');
      }
      return back()->withErrors('OTP is expired or invalid');
    }

    public function showVerifyForm(){
      return view('OTP.verify');
    }
}
