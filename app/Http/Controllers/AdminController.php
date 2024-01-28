<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins= Admin::all();
        return view('admin/index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins=Admin::all();
        return view('admin/create',compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:admins|max:255',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        $hashedPassword = Hash::make($request->password);
    
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $hashedPassword;
    
        $admin->save();
        return redirect('admin/index');
    
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        return view('admin.edit', compact('admins'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'email' => 'email|unique:admins|max:255,' . $id,
            'password' => 'sometimes|required|string|min:8',
        ]);
    
        $admins = Admin::where('id', $id)->firstOrFail();
        $admins->name = $request->name;
        $admins->email = $request->email;
    
        if ($request->has('password')) {
            $hashedPassword = Hash::make($request->password);
            $admins->password = $hashedPassword;
        }
    
        $admins->save();
        return redirect('admin/index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $admins=Admin::findOrFail($id);
        $admins->delete();
        return redirect('admin/index');


    }
}
