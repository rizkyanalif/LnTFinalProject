<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $category = $category->reverse();
        return view('editCategory', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required'
        ]);

        Category::create([
            'nama'=>$request->nama
        ]);
        
        return redirect('/edit-category')->with('success', 'Category berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rename($id)
    {
        $category = Category::findorFail($id);
        return view('renameCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required'
        ]);

        Category::findorFail($id)->update([
            'nama'=>$request->nama
        ]);
        
        return redirect('/edit-category')->with('success', 'Category berhasil direname');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::Destroy($id);
        return redirect('/edit-category')->with('deleted', 'Barang berhasil dihapus');
    }
}
