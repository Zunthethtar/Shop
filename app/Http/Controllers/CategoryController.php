<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository){
     $this->categoryRepository = $categoryRepository;
    }

    public function index(){

        $categories=$this->categoryRepository->index();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->categoryRepository->create();
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $this->categoryRepository->store($request);
        return redirect('admin/categories/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=$this->categoryRepository->edit($id);
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $this->categoryRepository->update($id,$request);
        return redirect('admin/categories/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect('admin/categories/index');
    }
}
