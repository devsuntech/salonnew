<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Str;
use Carbon\Carbon;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        
        return Socialite::driver($provider)->redirect();
        dd(Socialite::driver($provider)->redirect());
        
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $oldUser     =   User::where(['email' => $userSocial->getEmail()])->first();
        if($oldUser){
            $oldUser->provider_id=$userSocial->getId();
            $oldUser->provider=$provider;
            $oldUser->avatar=$userSocial->getAvatar();
            if(empty($oldUser->email_verified_at)){
                $oldUser->email_verified_at=Carbon::now();
            }
            $oldUser->update();
            Auth::login($oldUser);
            if(Auth::user()->user_type=='customer'){
                if (session()->has('redirect')) {
                    return redirect()->to(session()->pull('redirect'));
                }
                if(session()->has('link')){
                    return redirect()->to(session()->get('link'));
                }

                return redirect()->route('home')->with('success','You are successfully login'); 
            } else{
                 return redirect()->route('home');
            }
        }else{
            $user = User::create([
                'user_type'     => 'customer',
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'avatar'        => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
                'email_verified_at'      => Carbon::now(),
                'password' => Hash::make(Str::random(6)),
            ]);
            if($user){
                $customer=new Customer;
                $customer->user_id=$user->id;
                $customer->save();
            }
            Auth::login($user);
            if(Auth::user()->user_type=='customer'){
                if (session()->has('redirect')) {
                    return redirect()->to(session()->pull('redirect'));
                }
                if(session()->has('link')){
                    return redirect()->to(session()->get('link'));
                }

                return redirect()->route('user/profile')->with('success','You are successfully login'); 
            }else{
                 return redirect()->route('home');
            }
            
        }
    }
}
