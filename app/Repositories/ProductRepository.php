<?php
namespace App\Repositories;
use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository implements ProductInterface{
    public function index(){
        return Product::all();
    }
    public function create(){
        return Category::all();
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'shop_id'=>'required|exists:shops,id',
            'description' => 'required|',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|max:255',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  

    
        $product = new Product;
        $product->name = $request->name;
        $product->sub_category_id = $request->sub_category_id;
        $product->shop_id = $request->shop_id;

        $product->description = $request->description;
        
        // Save the image to the public/images directory
        $request->image->move(public_path('images'), $imageName);
    
        $product->image = $imageName;
    
        $product->price = $request->price;
        $product->save();    
    }
    public function edit($id){
        
        return  Product::findOrFail($id);
    }
    public function update($id, $request)
{
    $request->validate([
        'name' => 'required|unique:products,name,'.$id,
        'sub_category_id' => 'required|exists:sub_categories,id',
        'shop_id'=>'required|exists:shops,id',
        'description' => "string",
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => "string"
    ]);

    $product = $this->FindId($id);
    $product->name = $request->name;
    $product->sub_category_id = $request->sub_category_id;
    $product->shop_id = $request->shop_id;
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        // Delete existing image
        if ($product->image) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Update with the new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->update();
    
}
    
    public function FindId($id){
        return Product::findOrFail($id);
    }
    public function delete($id)
    {
        $product = $this->FindId($id);
    
        // Delete associated image file
        if ($product->image) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the product
        $product->delete();
    }


}

?>