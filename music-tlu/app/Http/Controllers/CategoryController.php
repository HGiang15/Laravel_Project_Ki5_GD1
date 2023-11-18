<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // SELECT * FROM categories LIMIT 5 OFFSET ((page_number - 1) * 5)
        $categories = Category::orderBy('idCategory', 'desc')->paginate(5);
        return view('admin.category.index', compact('categories'))->with((request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        $search = $request->search;

        $categories = Category::where(function($query) use ($search) {
            $query->where('idCategory', 'like', "%$search%")
            ->orWhere('nameCategory', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.category.index', compact('categories', 'search'));
    }


    public function create()
    {
        return view('admin.category.create');   
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nameCategory' => 'required|alpha_spaces',
        ]);

        // C1
        // $category = Category::create([
        //     'nameCategory' => $request->nameCategory
        // ]);
    
        // C2
        $category = Category::create($validate);

        return redirect()->route('categories.index')->with('information', 'Added category successfully !');
    }

    public function show(string $id)
    {
        $category = Category::where('idCategory', $id)->first();

        return view('admin.category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::where('idCategory', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        // $category = Category::find($id);
        $category = Category::where('idCategory', $id)->first();

        $validate = $request->validate([
            'nameCategory' => 'required|alpha_spaces',
        ]);

        // C1
        // $category->update([
        //     'nameCategory' => $request->input('nameCategory')
        // ]);

        // C2
        $category->update($validate);

        return redirect()->route('categories.index')->with('information', 'Updated category successfully !');
    }

    public function destroy(string $id)
    {
        Category::where('idCategory', $id)->delete();
        return redirect()->route('categories.index')->with('information', 'Removed category successfully !');
    }
}
