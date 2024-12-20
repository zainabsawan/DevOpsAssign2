<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "products";
    // protected $primaryKey = 'your_primary_key_column_name';
    public $timestamps = false;

    public function getProductByName($product) {
        $product = ProductModel::where('name', $productName)->first();
        return $product;
    }

    public function getProductByCategory($category) {
        $products = ProductModel::where('category', 'LIKE', "%{$category}%")->get();
        return $products;
    }


}
