<?php

// RegisterController.php

namespace App\Http\Controllers\Auth\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/customer/show_login';

    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.customer.customer_reg');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:customers'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('customers.sh_login')->with('registration_success', true);
    }
}
