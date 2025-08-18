<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {}

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
        //
    }

    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bạn phải đăng nhập!'
            ], 200);
        }
        $book = Book::findOrFail($id);
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $book->stock,
        ]);

        $quantity = $request->quantity;
        $item = Cart::where('user_id', Auth::id())
            ->where('book_id', $id)
            ->first();
        if ($item) {
            if ($item->quantity + $quantity > $book->stock) {
                $item->update(['quantity' => $book->stock]);
            } else {
                $item->increment('quantity', $quantity);
            }
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $id,
                'quantity' => min($quantity, $book->stock),
            ]);
        }
        return response()->json([
            'message' => 'Item Added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('index.index')->with('error', 'Bạn phải đăng nhập!');
        }
        $cart_items = Cart::join('book', 'book.id', '=', 'cart.book_id')
            ->select(
                'cart.book_id as id',
                'book.name',
                'book.price',
                'cart.quantity',
                'book.img',
                'book.stock',
            )
            ->where('user_id', Auth::id())
            ->get() ?? collect();
        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_price += (float)$item->quantity * $item->price;
        }
        return view('client.cart', compact('cart_items', 'total_price'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'integer|min:1',
        ]);
        $item = Cart::where('user_id', Auth::id())
            ->where('book_id', $id)
            ->first();

        $item->quantity = $request->quantity;
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Cart::where('book_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$item) {
            return response()->json([
                'message' => 'Item not found'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }
}
