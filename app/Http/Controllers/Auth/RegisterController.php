<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Notifications\UserWelcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailWelcomeUser;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function userRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:120|min:3',
            'last_name' => 'nullable|max:120|min:3',
            'gender' => 'required|in:Male,Female,male,female,other,Other',
            'mobile' => 'required|digits:10|unique:App\Models\User',
            'email' => 'required|email|unique:App\Models\User',
            'date_of_birth' => 'required|date',
            // 'country' => 'nullable|max:120',
            // 'state' => 'required|max:120',
            // 'city' => 'required|max:120',
            // 'pin_code' => 'required|digits:6',
            'terms_conditions' => 'required',
            'password' => 'required|string|confirmed|min:6',
        ]);
        $user=new User;
        $user->name=$request->first_name.' '.$request->last_name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->active=1;
        $user->user_type='customer';
        $user->password=Hash::make($request->password);
        if($user->save()){
            $customer=new Customer;
            $customer->user_id=$user->id;
            $customer->name=$user->name;
            $customer->dob=$request->date_of_birth;
            $customer->country=$request->country;
            $customer->state=$request->state;
            $customer->city=$request->city;
            $customer->pincode=$request->pin_code;
            $customer->status=1;
            if($customer->save()) {
                try {
                    Mail::to($request->email)->send(new EmailWelcomeUser());

                } catch (\Throwable $th) {
                    //throw $th;
                }
               return redirect()->route('login')->with('success','You are successfully register');
            } else{
               return back()->with('error','Something Went Wrong');
            }
            // $user->notify(new UserWelcome());
        } else{
            return back()->with('error','Something Went Wrong');
        }

    }
    public function vendorRegister(Request $request)
    {
        $request->validate([
            'salon_title'=> 'required|string|max:255',
            'state'=>'required|string',
            'city'=>'required|string',
            'full_address'=> 'required|string',
            'service_for'=> 'required|string',
            'payment_method'=> 'required|array',
            'facilities'=> 'required|array',
            'service_type' => 'required|in:Salon,Salon with Spa,Spa services',
            'mobile'=> 'required|string|max:10|unique:App\Models\User',
            'whatsapp_number'=> 'required|string|max:10',
            'email'=> 'required|email|unique:App\Models\User',
            'gst_number'=> 'required|string',
            'thumbnail'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'feature_image'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'gst_certificate'=> 'required|mimes:png,jpg,jpeg,svg,gif,pdf|max:300|min:10',
            'salon_description'=> 'required|string',
        ]);
    }
}
