<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductInterface{
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update($id,$request);
    public function delete($id);
    public function FindId($id);
}

?>