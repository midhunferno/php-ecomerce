<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=['product_name','discription','price','seling_price','quantity','category_id','expire_Date','stock','thumb_img','image'];
}
