<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::orderBy('ReviewID', 'desc')->paginate(5);
        return view('admin.review.index', compact('reviews'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('admin.review.create', compact('books', 'users'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'BookID' => 'required',
            'UserID' => 'required',
            'Rating' => 'required',
            'ReviewText' => 'required|alpha_spaces',
            'ReviewDate' => 'required',
        ]);

        // C1
        // $book = Book::create([
        //     'BookID' => $request->BookID,
        //     'UserID' => $request->UserID,
        //     'Rating' => $request->Rating,
        //     'ReviewText' => $request->ReviewText,
        //     'ReviewDate' => $request->ReviewDate,
        // ]);

        // C2
        $review = Review::create($validate);

        
        return redirect()->route('reviews.index')->with('information', 'Added review successfully!');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = Review::where('ReviewID', $id)->first();
        $books = Book::all();
        $users = User::all();

        return view('admin.review.edit', compact('review', 'books', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $review = Review::where('ReviewID', $id)->first();
        
        $validate = $request->validate([
            'BookID' => 'required',
            'UserID' => 'required',
            'Rating' => 'required',
            'ReviewText' => 'required|alpha_spaces',
            'ReviewDate' => 'required',
        ]);

        // C1
        // Update review details
        // $review->update([
        //     'BookID' => $request->BookID,
        //     'UserID' => $request->UserID,
        //     'Rating' => $request->Rating,
        //     'ReviewText' => $request->ReviewText,
        //     'ReviewDate' => $request->ReviewDate,
        // ]);

        // C2
        $review->update($validate);

        return redirect()->route('reviews.index')->with('information', 'Updated review successfully!');

    }


    public function destroy(string $id)
    {
        Review::where('ReviewID', $id)->delete();
        
        return redirect()->route('reviews.index')->with('information', 'Removed review successfully !');
    }
}
