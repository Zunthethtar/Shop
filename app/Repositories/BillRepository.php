<?php

namespace App\Repositories;

use App\Interfaces\BillInterface;
use App\Models\Bill;
use App\Models\Owner;
use Illuminate\Http\Request;

class BillRepository implements BillInterface
{
    public function index()
    {
        return Bill::all();
    }

    
    public function create()
    {
        return Owner::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'date' => 'required|unique:bills',
            'amount' => 'required|numeric|min:0', 
        ]);
    
        $bill = new Bill;
        $bill->owner_id = $request->owner_id;
        $bill->date = $request->date;
        $bill->amount = $request->amount;
        $bill->save();
    }

    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'date' => 'required|unique:bills,date,' . $id,
            'amount' => 'required|numeric|min:0', 
        ]);

        $bill = $this->find($id);
        $bill->owner_id = $request->owner_id;
        $bill->date = $request->date;
        $bill->amount = $request->amount;
        $bill->save();
    }

    public function delete($id)
    {
        $bill = $this->find($id);
        $bill->delete();
    }

    public function find($id)
    {
        return Bill::findOrFail($id);
    }
}
