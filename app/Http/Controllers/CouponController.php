<?php


namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();

        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons',
            'discount_percentage' => 'required|numeric',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after:valid_from',
        ]);

        Coupon::create($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully!');
    }

    public function show(Coupon $coupon)
    {
        return view('coupons.show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code,'.$id,
            'discount_percentage' => 'required|numeric',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after:valid_from',
        ]);
        $coupon = Coupon::findOrFail($id);

        $coupon->update($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully!');
    }

    public function delete($id)
{
    $coupon = Coupon::findOrFail($id);
    $coupon->delete();

    return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully!');
}

public function applyCoupon(Request $request)
{
    $request->validate([
        'coupon_code' => 'required|string',
    ]);

    $coupon = Coupon::where('code', $request->coupon_code)
        ->where('valid_from', '<=', now())
        ->where('valid_to', '>=', now())
        ->first();

    if ($coupon) {
        session()->put('applied_coupon', $coupon);

        return response()->json(['success' => true, 'applied_coupon' => $coupon]);
    }

    return response()->json(['success' => false, 'error' => 'Invalid coupon code or expired.']);
}

public function cancelCoupon()
{
    session()->forget('applied_coupon');

    // Recalculate the total without the coupon
    $total = $this->calculateTotal();

    return response()->json(['success' => true, 'newTotal' => $total]);
}

protected function calculateTotal()
{
    $total = 0;

    if (session('cart')) {
        foreach (session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }
    }

    return $total;
}


}


