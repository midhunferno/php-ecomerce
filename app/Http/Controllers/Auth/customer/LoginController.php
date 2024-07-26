<?php

namespace App\Http\Controllers\Auth\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/base';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(){
        return view('auth.customer.customer_reg', [
            'registration_success' => session('registration_success')
        ]);
    }

    public function login(Request $request){
        
        $request->validate(['name'=>'required','password'=>'required']);
        if(Auth::guard('customer')->attempt(['name'=>$request->name,'password'=>$request->password])){


            return redirect()->route('base');

        }else{
            return redirect()->back()->withInput()->withErrors(['name'=> 'please check the name']);
        }

    }

    public function logout(){
        Auth::guard('customer')->logout();
        session()->flash('success','logout success');
        session()->regenerate();
        return redirect()->route('customers.show_regi');
    }
}
