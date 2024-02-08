<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'productName' => $product->name,  // Adjust this based on your product data
            'cartCount' => count(session('cart')),
        ]);    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request)
    {
        

        $cart = $request->session()->get('cart', []);
        $date = Carbon::now()->format('d-m-Y');

        $order = new Order;
        $order->date = $date;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach ($cart as $id => $details) {
            $product = Product::find($id);

            if ($product) {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $id;
                $orderDetails->name = $details['name'];
                $orderDetails->price = $details['price'];
                $orderDetails->image = $details['image'];
                $orderDetails->quantity = $details['quantity'];
                $orderDetails->save();
            }
        }

        session()->forget('cart');
        return redirect('admin/UI/products')->with('success', 'Order placed successfully');
    }
}
