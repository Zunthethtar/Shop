<?php

namespace App\Http\Controllers;

use App\Interfaces\SubCategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subcategoryRepository;

    public function __construct(SubCategoryInterface $subcategoryRepository)
    {
        $this->subcategoryRepository = $subcategoryRepository;
    }

    public function index()
    {
        $sub_categories = $this->subcategoryRepository->index();
        return view('admin.sub_category.index', compact('sub_categories'));
    }

    public function create()
    {
        $categories=Category::all();
        $sub_categories = $this->subcategoryRepository->create();
        return view('admin.sub_category.create', compact('sub_categories','categories'));
    }
    

    public function store(Request $request)
    {
        $this->subcategoryRepository->store($request);
        return redirect('admin/sub_category/index');
    }

    public function show(string $id)
    {
    
    }

    public function edit($id)
    {
        $categories=Category::all();
        $sub_categories= $this->subcategoryRepository->edit($id);
        return view('admin.sub_category.edit', compact('sub_categories','categories'));
    }

    public function update($id, Request $request)
    {
        $this->subcategoryRepository->update($id, $request);
        return redirect('admin/sub_category/index');
    }

    public function delete($id)
    {
        $this->subcategoryRepository->delete($id);
        return redirect('admin/sub_category/index');
    }
}
