<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('BookID', 'desc')->paginate(5);
        return view('admin.book.index', compact('books'))->with('i', (request()->input('page', 1) - 1) *5);

    }

    public function search(Request $request) {
        $search = $request->search;

        $books = Book::where(function($query) use ($search) {
            $query->where('Title', 'like', "%$search%")
            ->orWhere('Author', 'like', "%$search%")
            ->orWhere('Genre', 'like', "%$search%")
            ->orWhere('PublicationYear', 'like', "%$search%")
            ->orWhere('ISBN', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.book.index', compact('books', 'search'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request)
    {
        // Có thể tự cho message lỗi của mình
        // [
        //     'Title.required' => 'Title is required.',
        //     'Author.required' => 'Author is required.',
        //     'Author.alpha' => 'Author must contain only alphabetic characters.',
        //     'Genre.required' => 'Genre is required.',
        //     'Genre.alpha' => 'Genre must contain only alphabetic characters.',
        //     'PublicationYear.required' => 'Publication Year is required.',
        //     'PublicationYear.integer' => 'Publication Year must be an integer.',
        //     'ISBN.required' => 'ISBN is required.',
        //     'ISBN.integer' => 'ISBN must be an integer.',
        //     'ConvertImageURL.file' => 'Convert Image must be a file.',
        //     'ConvertImageURL.mimes' => 'Only JPG, JPEG, PNG, GIF, SVG files are allowed for Convert Image.',
        // ]

        $validate = $request->validate([
            'Title' => 'required',
            'Author' => 'required|alpha_spaces',
            'Genre' => 'required|alpha_spaces',
            'PublicationYear' => 'required|numeric_spaces',
            'ISBN' => 'required|numeric_spaces',
            'ConvertImageURL' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);


        $filename = '';
        if ($request->hasFile('ConvertImageURL')) {
            $file = $request->file('ConvertImageURL');
            $extension = $file->getClientOriginalExtension();
            // $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    
            // if (!in_array($extension, $allowedExtensions)) {
            //     return redirect()->route('books.index')->with('error', 'Only JPG, JPEG, PNG, SVG and GIF files are allowed.');
            // }
    
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/books/' . time() . '.' .$extension;
            $file->move(public_path('/assets/img/books/'), $filename);
        }
    
        // C1
        // $book = Book::create([
        //     'Title' => $request->Title,
        //     'Author' => $request->Author,
        //     'Genre' => $request->Genre,
        //     'PublicationYear' => $request->PublicationYear,
        //     'ISBN' => $request->ISBN,
        //     'ConvertImageURL' => $filename,
        // ]);

        // C2
        $bookData = array_merge($validate, ['ConvertImageURL' => $filename]);
        $book = Book::create($bookData);

        
        return redirect()->route('books.index')->with('information', 'Added book successfully!');
    }

    public function show(string $id)
    {
        $book = Book::where('BookID', $id)->first();

        return view('admin.book.show', compact('book'));
    }


    public function edit(string $id)
    {
        // $book = Book::find($id);
        $book = Book::where('BookID', $id)->first();
        return view('admin.book.edit', compact('book'));
    }


    public function update(Request $request, string $id)
    {
        // $book = Book::find($id);
        $book = Book::where('BookID', $id)->first();

        $validate = $request->validate([
            'Title' => 'required',
            'Author' => 'required|alpha_spaces',
            'Genre' => 'required|alpha_spaces',
            'PublicationYear' => 'required|numeric_spaces',
            'ISBN' => 'required|numeric_spaces',
            'ConvertImageURL' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        // C1
        // Update book details
        // $book->update([
        //     'Title' => $request->Title,
        //     'Author' => $request->Author,
        //     'Genre' => $request->Genre,
        //     'PublicationYear' => $request->PublicationYear,
        //     'ISBN' => $request->ISBN,
        // ]);

        // C2
        $book->update($validate);

        // Handle image update if a new image is provided
        if ($request->hasFile('ConvertImageURL')) {
            $file = $request->file('ConvertImageURL');
            $extension = $file->getClientOriginalExtension();

            // Remove the old image
            if (File::exists(public_path($book->ConvertImageURL))) {
                File::delete(public_path($book->ConvertImageURL));
            }

            // Save the new image
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/books/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/books/'), $filename);

            // Update the book record with the new image URL
            $book->update(['ConvertImageURL' => $filename]);
        }

        return redirect()->route('books.index')->with('information', 'Updated book successfully!');

    }

    public function destroy(string $id)
    {
        Book::where('BookID', $id)->delete();
        
        return redirect()->route('books.index')->with('information', 'Removed book successfully !');
    }
}
