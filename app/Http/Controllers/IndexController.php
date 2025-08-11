<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Cart;
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
        $books = DB::table('book')
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
            );
        $books->when($request->filter, function ($query, $filter) {
            switch ($filter) {
                case 'price_asc':
                    return $query->orderBy('book.price', 'asc');
                case 'price_desc':
                    return $query->orderBy('book.price', 'desc');
                case 'name_asc':
                    return $query->orderBy('book.name', 'asc');
                case 'name_desc':
                    return $query->orderBy('book.name', 'desc');
                default:
                    return $query;
            }
        });
        if (!empty($request->search)) {
            $books->where(function ($query) use ($request) {
                $query->where('book.name', 'like', '%' . $request->search . '%')
                    ->orWhere('author.name', 'like', '%' . $request->search . '%')
                    ->orWhere('category.name', 'like', '%' . $request->search . '%');
            });
        }
        $books = $books->paginate(9);
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
    public function show(string $id)
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
        return view('client.product-details', compact('book'));
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
