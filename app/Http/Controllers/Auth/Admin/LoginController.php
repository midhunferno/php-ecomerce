<?php

namespace App\Http\Controllers\Auth\Admin;

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
    protected $redirectTo = '/admins.show_reg';

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
        return view('auth.admin.login');
    }

    public function login(Request $request){
        
        $request->validate(['name'=>'required','password'=>'required']);
        if(Auth::guard('master')->attempt(['name'=>$request->name,'password'=>$request->password])){

            return redirect()->route('admins.dashbord');

        }else{
            return redirect()->back()->withInput()->withErrors(['name'=> 'please check the name']);
        }

    }

    public function logout(){
        Auth::guard('master')->logout();
        session()->flash('success','logout success');
        session()->regenerate();
        return redirect()->route('admins.show_reg');
    }
}
