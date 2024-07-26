<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customercontroller extends Controller
{
    public function base(){
        return view('customer.main');
    }

    public function product(){
        $show=Product::get();
        return view('customer.product',compact('show'));
    }
    public function cart(){
        $show=Cart::with('product')->get();
        print_r($show);exit;
        return view('customer.cart',compact('show'));
    }
    public function stor_cart(Request $request, $id)
    {
        if (Auth::guard('customer')->check()) {
            $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);

            $customer_id = Auth::guard('customer')->id();
           
        
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->quantity = $request->quantity;
            $cart->price = $request->price;
            $cart->customer_id = $customer_id;
            $cart->save();

            session()->flash('success', 'Cart added successfully.');
            return redirect()->back();
        } else {
            return redirect()->route('customers.cart');
        }
    }
    public function contact(){
        return view('customer.contact');
    }
}
