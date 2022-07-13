<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_name','image','price','description'];
    public $timestamp = false;
    use HasFactory;

    //Create product
    public static function saveProduct($product_name,$image,$price,$description)
    {
        $product = new Product();
        $product->product_name = $product_name;
        $product->image = $image;
        $product->price = $price;
        $product->description = $description;
        $product->save();
    }

    //Update product
    public static function updateProduct($id,$product_name,$image,$price,$description)
    {
        $product = Product::find($id);
        $product->product_name = $product_name;
        $product->image = $image;
        $product->price = $price;
        $product->description = $description;
        $product->save();
    }


}
