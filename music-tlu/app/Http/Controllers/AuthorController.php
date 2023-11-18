<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    public function index()
    {
        // SELECT * FROM authors LIMIT 5 OFFSET ((page_number - 1) * 5)
        $authors = Author::orderBy('idAuthor', 'desc')->paginate(5);
        return view('admin.author.index', compact('authors'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        $search = $request->search;

        $authors = Author::where(function($query) use ($search) {
            $query->where('nameAuthor', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.author.index', compact('authors', 'search'));
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nameAuthor' => 'required|alpha_spaces',
            'imgAuthor' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);


        $filename = '';
        if ($request->hasFile('imgAuthor')) {
            $file = $request->file('imgAuthor');
            $extension = $file->getClientOriginalExtension();
    
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/author/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/author/'), $filename);
        }

        // C1
        // $author = Author::create([
        //     'nameAuthor' => $request->nameAuthor,
        //     'imgAuthor' => $filename
        // ]);

        // C2
        $authorData = array_merge($validate, ['imgAuthor' => $filename]);
        $author = Author::create($authorData);

        return redirect()->route('authors.index')->with('information', 'Added author successfully !');
    }

    public function show(string $id)
    {
        $author = Author::where('idAuthor', $id)->first();

        return view('admin.author.show', compact('author'));
    }

    public function edit(string $id)
    {
        // $author = Author::find($id);
        $author = Author::where('idAuthor',$id)->first();
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, string $id)
    {
        // $author = Author::find($id);
        $author = Author::where('idAuthor', $id)->first();

        $validate = $request->validate([
            'nameAuthor' => 'required|alpha_spaces',
            'imgAuthor' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        // C1
        // $author->update([
        //     'nameAuthor' => $request->input('nameAuthor'),
        // ]);

        // C2
        $author->update($validate);


        // Handle image update if a new image is provided
        if ($request->hasFile('imgAuthor')) {
            $file = $request->file('imgAuthor');
            $extension = $file->getClientOriginalExtension();

            // Remove the old image
            if (File::exists(public_path($author->imgAuthor))) {
                File::delete(public_path($author->imgAuthor));
            }

            // Save the new image
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/author/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/author/'), $filename);

            // Update the book record with the new image URL
            $author->update(['imgAuthor' => $filename]);
        }

        return redirect()->route('authors.show', $author->idAuthor)->with('information', 'Updated author successfully !');
    }

    public function destroy(string $id)
    {
        Author::where('idAuthor', $id)->delete();
        
        return redirect()->route('authors.index')->with('information', 'Removed author successfully !');
    }
}
