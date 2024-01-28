<?php
namespace App\Repositories;


use App\Interfaces\SubCategoryInterface;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryRepository implements SubCategoryInterface
{
    public function index()
    {
        return SubCategory::all();
    }

    public function create()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $sub_category = new SubCategory;
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
    }

    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category_id' => "required|exists:categories,id",
        ]);

        $sub_category = $this->find($id);
        $sub_category->name = $request->name;
        $sub_category->category_id=$request->category_id; 
        $sub_category->save();
    }

    public function delete($id)
    {
        $sub_category = $this->find($id);
        $sub_category->delete();
    }
    public function find($id)
    {
        return SubCategory::findOrFail($id);
    }
}
