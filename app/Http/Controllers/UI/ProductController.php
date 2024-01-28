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

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        $products = Product::all();

        return view('products', compact('products'));

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function cart()

    {

      return view('cart');
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function addToCart($id)

    {

        $product = Product::findOrFail($id);

          

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

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

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function update(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }

    public function checkout(Request $request){
   
        $cart = $request->session()->get('cart');
        $date = Carbon::now()->format('d-m-Y');

        $order =new Order;
        $order->date=$date;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach($cart as $id=>$details){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id=$order->id;
            $orderDetails->product_id=$id;
            $orderDetails->name=$details['name'];
            $orderDetails->price=$details['price'];
            $orderDetails->image=$details['image'];
            $orderDetails->quantity=$details['quantity'];
            $orderDetails->save();
        }

        session()->forget('cart');
        return redirect('UI/products');

    }

}