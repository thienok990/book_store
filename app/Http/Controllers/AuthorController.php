<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = DB::table('author')
            ->leftJoin('book', 'author.id', '=', 'book.author_id')
            ->select('author.id', 'author.name', DB::raw('COUNT(book.id) as book_count'))
            ->groupBy('author.id', 'author.name')
            ->get();
        return view('admin.author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = 'add';
        return view('admin.components.create-or-edit', compact('mode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        Author::create([
            'name' => $request->name,
        ]);
        return redirect()->route('author.index')->with(['message' => 'Tác giả thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::find($id);
        return $author;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::find($id);
        $mode = 'edit';
        return view('admin.components.create-or-edit', compact('author', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::find($id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $author->name = $request->input('name');
        $author->save();
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('author.index');
    }
}
