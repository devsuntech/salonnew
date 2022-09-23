<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|digits:10',
            'password' => 'required|string',
        ]);
        if(Auth::attempt(["mobile"=>$request->mobile,"password"=>$request->password,"active"=>true]) || Auth::attempt(["email"=>$request->email,"password"=>$request->password,"active"=>true]))
        {
            if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='employee')
            {
                return redirect()->route('admin.dashboard');
            }
            elseif(Auth::user()->user_type=='customer')
            {
                if ($request->session()->has('redirect')) {
                    return redirect()->to($request->session()->pull('redirect'));
                }
                return redirect()->route('user.profile');
            }
            else if (Auth::user()->user_type=='vendor')
            {
                return redirect()->route('vendor.dashboard');
            }
            else
            {
                 abort(403);
            }
        }
        else{
            return back()->with('error','Invalid Credentials!!');
        }
    }
}
