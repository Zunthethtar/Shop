<?php
namespace App\Repositories\api;

use App\Interfaces\api\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface{

    public function get(){
        return Category::all();
    }
    public function getcategorybyid($id){
        return Category::find($id);

    }
}
?>