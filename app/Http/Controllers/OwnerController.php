<?php
// app/Http/Controllers/ownerController.php

namespace App\Http\Controllers;

use App\Interfaces\OwnerInterface;
use App\Repositories\OwnerRepository;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    private $OwnerRepository;

    public function __construct(OwnerInterface $OwnerRepository)
    {
        $this->OwnerRepository = $OwnerRepository;
    }

    public function index()
    {
        $owners = $this->OwnerRepository->index();
        return view('admin.owner.index', compact('owners'));
    }

    public function create()
    {
        $this->OwnerRepository->create();
        return view('admin.owner.create');
    }

    public function store(Request $request)
    {
        $this->OwnerRepository->store($request);
        return redirect('admin/owner/index');
    }

    public function edit($id)
    {
        $owner = $this->OwnerRepository->edit($id);
        return view('admin.owner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $this->OwnerRepository->update($id, $request);
        return redirect("admin/owner/index");
    }

    public function delete($id)
    {
        $this->OwnerRepository->delete($id);
        return redirect("admin/owner/index");
    }
}

