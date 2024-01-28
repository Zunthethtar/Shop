<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Shop;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $productRepository;

    public function __construct(ProductInterface $productRepository){
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->index();
        return view('admin/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_categories=SubCategory::all();
        $shops=Shop::all();

        $this->productRepository->create();
        return view('admin/products/create', compact("sub_categories",'shops'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productRepository->store($request);
        return redirect('admin/products/index');
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
        $shops=Shop::all();
        $sub_categories=SubCategory::all();
        $product = $this->productRepository->edit($id);

        return view('admin.products.edit',compact('product',"sub_categories",'shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->productRepository->update($id,$request);
        return redirect("admin/products/index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->productRepository->delete($id);
        return redirect("admin/products/index");
    }
}
