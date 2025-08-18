<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::index() // gọi scopeIndex
            ->filterSort($request->filter)
            ->filterSearch($request->search)
            ->filterPrice($request->min_price, $request->max_price)
            ->filterAuthor($request->author_id)
            ->filterCategory($request->category_id)
            ->paginate(12)
            ->appends([
                'min_price' => $request->min_price ?? '',
                'max_price' => $request->max_price ?? '',
                'filter' => $request->filter ?? '',
                'search' => $request->search ?? '',
                'author_id' => $request->author_id ?? '',
                'category_id' => $request->category_id ?? ''
            ]);

        $categories = Category::all();
        $authors = Author::all();

        return view('client.products', compact('books', 'categories', 'authors'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $slug)
    {
        $book = DB::table('book')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('category', 'book.category_id', '=', 'category.id')
            ->select(
                'book.id as book_id',
                'book.name',
                'book.price',
                'book.stock',
                'book.img',
                'book.description',
                'author.name as author_name',
                'category.name as category_name'
            )->where('book.id', $id)->first();
        $bookRecommends = Book::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(18)
            ->get();
        return view('client.product-details', compact('book', 'bookRecommends'));
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
}
