<?php
namespace App\Repositories;
use App\Interfaces\ShopInterface;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopRepository implements ShopInterface{
    public function index(){
        return Shop::all();
    }
    public function create(){
        return Shop::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:shops|max:255',
            'owner_id' => 'required|exists:owners,id',
            'address' => 'required|max:255',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    
    
        $imageName = time().'.'.$request->image->extension();  

    
        $shop = new Shop;
        $shop->owner_id = $request->owner_id;
        $shop->name=$request->name;
        $shop->address= $request->address;
        $shop->phone= $request->phone;        
        $request->image->move(public_path('images'), $imageName);
    
        $shop->image = $imageName;
    
        $shop->save();    
    }
    public function edit($id){
        
        return $this->find($id);
    }
    public function update($id, $request)
{
    $request->validate([
        'name' => 'required|unique:shops,name,'.$id,
        'owner_id' => 'required|exists:owners,id',
        'address' => 'required|max:255',
        'phone' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $shop = $this->find($id);
    $shop->name=$request->name;
    $shop->owner_id = $request->owner_id;
    $shop->address = $request->address;
    $shop->phone = $request->phone;

    if ($request->hasFile('image')) {
        // Delete existing image
        if ($shop->image) {
            $imagePath = public_path('images/' . $shop->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Update with the new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $shop->image = $imageName;
    }

    $shop->update();
    
}
    
    public function find($id)
    {
        return Shop::findOrFail($id);
    }
    public function delete($id)
    {
        $shop = $this->find($id);
    
        // Delete associated image file
        if ($shop->image) {
            $imagePath = public_path('images/' . $shop->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the product
        $shop->delete();
    }


}

