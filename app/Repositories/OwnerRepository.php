<?php
namespace App\Repositories;


use App\Interfaces\OwnerInterface;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerRepository implements OwnerInterface
{
    public function index()
    {
        return Owner::all();
    }

    public function create()
    {
        // Additional logic for create if needed
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners',
            'password' => 'required|min:8',
        ]);

        $owner = new Owner;
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = bcrypt($request->password);
        $owner->save();
    }

    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners,email,' . $id,
        ]);

        $owner = $this->find($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->save();
    }

    public function delete($id)
    {
        $owner = $this->find($id);
        $owner->delete();
    }
    public function find($id)
    {
        return Owner::findOrFail($id);
    }
}
