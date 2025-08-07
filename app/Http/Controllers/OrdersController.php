<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cart_items = Cart::join('book', 'book.id', '=', 'cart.book_id')
            ->select(
                'cart.book_id as id',
                'book.name',
                'book.price',
                'cart.quantity',
            )
            ->whereIn("cart.book_id", $request->ids)
            ->where('user_id', Auth::id())
            ->get();

        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_price += (float)$item->quantity * $item->price;
        }
        return view('client.checkout', compact('cart_items', 'total_price'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email'      => ['required', 'email', 'regex:/^[\w.+\-]+@gmail\.com$/i'],
                'phone'      => 'required|numeric|digits_between:10,11',
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
                'description' => 'required|string',
            ],
            [
                'email.regex' => 'Email phải là địa chỉ Gmail (@gmail.com).',
            ]
        );
        $responseProvinces = Http::get("https://provinces.open-api.vn/api/p/");
        $provinces = collect($responseProvinces->json());
        $province = $provinces->firstWhere('code', $request->province_id);
        $provinceName = $province['name'] ?? 'Không tìm thấy';

        $responseDistricts = Http::get("https://provinces.open-api.vn/api/p/$request->province_id?depth=2");
        $districts = collect($responseDistricts['districts']);
        $district = $districts->firstWhere('code', $request->district_id);
        $districtName = $district['name'] ?? 'Không tìm thấy';

        $responseWards = Http::get("https://provinces.open-api.vn/api/d/$request->district_id?depth=2");
        $wards = collect($responseWards['wards']);
        $ward = $wards->firstWhere('code', $request->ward_id);
        $wardName = $ward['name'] ?? 'Không tìm thấy';

        $fullName = $request->last_name . " " . $request->first_name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->description . ", " . $wardName . ", " . $districtName . ", " . $provinceName;
        $cart_items = Cart::join('book', 'book.id', '=', 'cart.book_id')
            ->select(
                'cart.book_id as book_id',
                'book.name as book_name',
                'book.price',
                'cart.quantity'
            )
            ->where('user_id', Auth::id())
            ->whereIn('book_id', $request->ids)
            ->get();
        $total_price = $cart_items->sum(function ($item) {
            return (float)$item->quantity * $item->price;
        });
        $orders = Orders::create([
            'user_id' => Auth::id(),
            'address' => $address,
            'phone' => $phone,
            'name' => $fullName,
            'email' => $email,
            'total_price' => $total_price,
            'status' => 'pending'
        ]);
        foreach ($cart_items as $item) {
            OrderDetail::create([
                'order_id' => $orders->id,
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->price * (float)$item->quantity
            ]);
            Cart::where('user_id',  Auth::id())->where('book_id', $item->book_id)->delete();
        }
        return redirect()->route('index.index')->with('success', 'Bạn đã đặt hàng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $oders = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('book', 'order_details.book_id', '=', 'book.id')
            ->join('user', 'orders.user_id', '=', 'user.id')
            ->select(
                'book.img as img',
                'order_details.order_id as order_id',
                'book.name as name',
                'order_details.quantity as quantity',
                'order_details.price as price',
                'order_details.total as total',
                'orders.total_price as total_price',
                'orders.status as status',
                'orders.total_price as total_price',
            )->where('user.id', $user->id)
            ->get()
            ->toArray();
        $order_details = [];
        foreach ($oders as $order) {
            $order_details[$order->order_id][] = $order;
        }
        return view('client.components.order', compact('order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function indexAdmin()
    {
        $oders = Orders::select('name', 'phone', 'address', 'total_price', 'status', 'id')->paginate(8);
        return view('admin.order.order', compact('oders'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('orders.indexAdmin')->with('success', 'Bạn đã cập nhật đơn hàng thành công');
    }
}
