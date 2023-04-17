<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $deletedCount = Category::onlyTrashed()->count();
        return view('categories_index', compact('categories','deletedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $category = new Category();
    $category->ten_tloai = $request->input('category');
    $category->save();
    return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->ten_tloai= $request->category;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $category = Category::findOrFail($id);
         $category->delete();
         return redirect()->route('categories.index');
    }
    public function softDeleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories_deleted', compact('categories'));
    }
    public function restore($id){
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.deleted')->with('success', 'category has been restored.');
    }
    public function forceDelete($id){
        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('categories.deleted')->with('success', 'category has been permanently deleted.');
    }
}
