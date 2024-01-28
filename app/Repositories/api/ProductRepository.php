<?php
namespace App\Repositories\api;

use App\Interfaces\api\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface{

    public function get(){
        $products = Product::all();

        foreach ($products as $product) {
            if (!$product->category) {
                $product->category_id = null; // Set category_id to null
            }
        }

        return $products;
    }
    public function getProductbyId($id){
        $product = Product::find($id);

        if ($product && !$product->category) {
            $product->category_id = null; // Set category_id to null
        }

        return $product;
    }
}
?>