<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface SubCategoryInterface
{
    public function index();

    public function create();

    public function store(Request $request);

    public function edit($id);
    public function find($id);

    public function update($id, Request $request);

    public function delete($id);
}
