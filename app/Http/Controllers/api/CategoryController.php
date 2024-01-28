<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Interfaces\api\CategoryInterface;
use App\Models\Category;

class CategoryController extends Controller{
private $categoryRepository;

public function __construct(CategoryInterface $categoryRepository){
    $this->categoryRepository = $categoryRepository;
}

public function get(){
    $category=$this->categoryRepository->get();
    // return response()->json(['data'=>$category,['status'=>200]]); 
   return CategoryResource::collection($category);
}
public function getcategorybyid($id){

    $category=$this->categoryRepository->getcategorybyid($id);
    return new CategoryResource($category);
}
}

?>