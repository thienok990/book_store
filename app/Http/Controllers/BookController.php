<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = DB::table('book')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->select(
                'book.id as book_id',
                'book.name',
                'book.category_id',
                'book.author_id',
                'book.price',
                'book.stock',
                'book.img',
                'author.name as author_name',
                'category.name as category_name'
            )->paginate(8);
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.book', compact('books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = 'add';
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.components.create-or-edit', compact('mode', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session(['mode' => 'add']);
        $request->validate([
            'name' => 'required|string',
            'author_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
        }
        Book::create([
            'name' => $request->name,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'img' => $path,
            'description' => $request->description,
        ]);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $mode = 'edit';
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.components.create-or-edit', compact('book', 'categories', 'authors', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = Book::findOrFail($id);
        $request->validate([
            'name' => 'string',
            'author_id' => 'numeric',
            'category_id' => 'numeric',
            'price' => 'numeric',
            'stock' => 'numeric',
            'img' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        $book->name = $request->name;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;
        // Nếu có file ảnh mới, lưu ảnh và cập nhật đường dẫn
        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($book->img);
            $file = $request->file('img');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
            $book->img = $path;
        }
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        Storage::disk('public')->delete($book->img);
        $book->delete();
        return redirect()->route('book.index');
    }
}
