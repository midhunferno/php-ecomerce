<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admincontroller extends Controller
{
    public function admin(){

     return view("admin.main");
    }

   public function dashbord(){
    return view('auth.admin.dashbord');
   }

   public function show_add_product(){
     $get_category=Category::all();
     $data=Product::get();  
    return view('auth.admin.add_product',compact('get_category','data'));
   }

  
  public function store_product( Request $request ){
     
     $data=$request->all();

     $validator=Validator::make($data,['name'=>'required|string|min:3',
     'seling_price'=>'required',
     'cover'=>'required'       
     ]);

     if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors())->withInput();
     }

     if($request->has('image')){
      $image=$request->file('image');
      $extension = $image->getClientOriginalExtension();
      $imageName = now()->getTimestamp().'.'.$extension;

      $path = public_path().'/assets/image';
      $image->move($path,$imageName);
      $data['image'] = '/assets/image/' . $imageName;
     }
     if($request->has('cover')){
      $image=$request->file('cover');
      $extension = $image->getClientOriginalExtension();
      $imageName = now()->getTimestamp().'.'.$extension;

      $path = public_path().'/assets/image';
      $image->move($path,$imageName);
      $data['cover'] = '/assets/image/' . $imageName;
     }

     $add_product= new Product();
     $add_product->product_name=$data['name'];
     $add_product->discription=$data['discription'];    
     $add_product->price=$data['price'];
     $add_product->seling_price=$data['seling_price'];
     $add_product->quantity=$data['quantity'];
     $add_product->category_id=$data['category'];
     $add_product->expire_date=$data['expire_date'];    
     $add_product->thumb_img=$data['cover'];
     $add_product->image=$data['image'];   
     $add_product->save();
     session()->flash('success','product saved');
     return redirect()->route('admins.products.show_category');
   }

  public function show_edit_pro($id){
     $data=Product::findOrFail( $id );
     $get_category=Category::all();
    return view('auth.admin.edit_product',compact('data','get_category'));
  } 

public function update_pro(Request $request ,$id ){
  $data=$request->all();

     if($request->has('image')){
      $image=$request->file('image');
      $extension = $image->getClientOriginalExtension();
      $imageName = now()->getTimestamp().'.'.$extension;
      $path = public_path().'/assets/image';
      $image->move($path,$imageName);
      $data['image'] = '/assets/image/' . $imageName;
     }

     if($request->has('cover')){
      $image=$request->file('cover');
      $extension = $image->getClientOriginalExtension();
      $imageName = now()->getTimestamp().'.'.$extension;
      $path = public_path().'/assets/image';
      $image->move($path,$imageName);
      $data['cover'] = '/assets/image/' . $imageName;
     }

     $upd_product=Product::findOrFail( $id );
     $upd_product->product_name=$data['name'];
     $upd_product->discription=$data['discription'];    
     $upd_product->price=$data['price'];
     $upd_product->seling_price=$data['seling_price'];
     $upd_product->quantity=$data['quantity'];
     $upd_product->category_id=$data['category'];
     $upd_product->expire_date=$data['expire_date'];    
     
    if (isset($data['cover'])) {
      $upd_product->thumb_img = $data['cover'];
    }
    if (isset($data['image'])) {
      $upd_product->image = $data['image'];
    }
    $upd_product->save();
    session()->flash('success','updated successfuly');

  return redirect()->route('admins.dashbord');
}
 public function show_category(){
    $data=Category::all();

  return view('auth.admin.add_category',compact('data'));
 }

public function  store_category(Request $request){
    $data=$request->all();

    $validator= validator($data,['name'=>'required|string|min:3']);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $add_category= new Category();
    $add_category->category_name=$data['name'];

    $add_category->save();

    session()->flash('success','category added ');
    return redirect()->route('admins.products.show_pro');
}

public function showedit($id){
  $data=Category::findOrFail($id);

  return view('auth.admin.category_edit',compact('data'));
}
public function category_update(Request $request,$id){

  $data=$request->all();
  $upd=Category::findOrFail($id);
  $upd->category_name=$data['name'];
  $upd->save();

  return redirect()->route('admins.products.show_category');
}
public function delet($id){

  $data=Category::findOrFail($id);

  $data->delete();
  return redirect()->route('admins.products.show_category');
}
}
