<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Repositories\api\ProductRepository;

class ProductController extends Controller{
private $productRepository;
public function __construct(ProductRepository $productRepository){
    $this->productRepository = $productRepository;
}
public function get(){
    $product=$this->productRepository->get();
    return ProductResource::collection($product);//likes index show all list
}
public function getProductbyId($id){
    $product=$this->productRepository->getProductbyId($id);
    return new ProductResource($product);//likes show method 
}
}

?>