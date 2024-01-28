<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface CategoryInterface{

    public function index();
    public function create();

    public function store(Request $request);
    public function update($id,Request $request);
    public function edit($id);
    public function delete($id);
    public function FindId($id);


}


?>