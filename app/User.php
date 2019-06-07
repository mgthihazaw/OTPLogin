<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use App\Mail\OTPMail;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isVerified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getOTP(){
       return Cache::get($this->OTPkey());
    }
    public function OTPkey(){
        return "OTP_for_{$this->id}";
    }
    public function cacheOTP(){
        $OTP = rand(100000,999999);
        Cache::put([$this->OTPkey()=>$OTP],now()->addSeconds(20));
        return $OTP;
    }
    public function sendOTP($via){
        if($via=='via_sms'){
           
        }
        else{
            Mail::to('thihazawww742@gmail.com')->send(new OTPMail($this->cacheOTP()));
        }
        
    }
}
