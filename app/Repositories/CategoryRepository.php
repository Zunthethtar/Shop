<?php
namespace App\Repositories;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryInterface{
    public function index(){

        return Category::all();

    }

    public function create(){
        return Category::all();
    }

    public function store(Request $request){
        $request->validate([
        'name'=>'required|unique:categories|max:255',
        ]);
        $categories=new Category;
        $categories->name=request()->name;
        $categories->save();
    }
    public function edit($id){
        return $this->FindId($id);
    }
    public function update($id,Request $request)
    {
        $request->validate([
            'name'=>'required|max:255|unique:categories,name,'.$id,
        ]);
        $categories = $this->FindId($id);
        $categories->name = request()->name;
        $categories->save();
    }
    

    public function FindId($id){
        return Category::findOrFail($id);
    }
    public function delete($id){
        $categories=$this->FindId($id);
        $categories->delete();
    }
}


?>