<?php

namespace App\Http\Controllers;

use App\Interfaces\BillInterface;
use App\Models\Owner;
use Illuminate\Http\Request;

class BillController extends Controller
{
    private $billRepository;

    public function __construct(BillInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function index()
    {
        $bills = $this->billRepository->index();
        return view('admin.bill.index', compact('bills'));
    }

    public function create()
    {
        $owners = $this->billRepository->create();
        return view('admin.bill.create', compact('owners'));
    }
    

    public function store(Request $request)
    {
        $this->billRepository->store($request);
        return redirect('admin/bill/index');
    }

    public function show(string $id)
    {
    
    }

    public function edit($id)
    {
        $owners=Owner::all();
        $bills= $this->billRepository->edit($id);
        return view('admin.bill.edit', compact('bills','owners'));
    }

    public function update($id, Request $request)
    {
        $this->billRepository->update($id, $request);
        return redirect('admin/bill/index');
    }

    public function delete($id)
    {
        $this->billRepository->delete($id);
        return redirect('admin/bill/index');
    }
}
