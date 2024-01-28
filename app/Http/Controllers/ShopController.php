<?php

namespace App\Http\Controllers;


use App\Interfaces\ShopInterface;
use App\Models\Owner;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $shopRepository;

    public function __construct(ShopInterface $shopRepository){
        $this->shopRepository = $shopRepository;
    }
    public function index()
    {
        $shops = $this->shopRepository->index();
        return view('admin/shop/index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners=Owner::all();
        $this->shopRepository->create();
        return view('admin/shop/create', compact('owners'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->shopRepository->store($request);
        return redirect('admin/shop/index');
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
        $owners=Owner::all();
        $shops = $this->shopRepository->edit($id);

        return view('admin.shop.edit',compact('owners',"shops"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->shopRepository->update($id,$request);
        return redirect("admin/shop/index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->shopRepository->delete($id);
        return redirect("admin/shop/index");
    }
}
