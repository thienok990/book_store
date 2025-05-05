<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = $categories = DB::table('category')
            ->leftJoin('book', 'category.id', '=', 'book.category_id')
            ->select('category.id', 'category.name', DB::raw('COUNT(book.id) as book_count'))
            ->groupBy('category.id', 'category.name')
            ->get();
        return view('admin.category', compact('categories'));
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
            'name' => 'required|string'
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $category = Category::find($id);
        $mode = 'add';
        return view('admin.components.create-or-edit', compact('category', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => 'required|string'
        ]);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category.index')->with(['message' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
