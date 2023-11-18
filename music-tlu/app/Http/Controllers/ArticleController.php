<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('idArticle', 'desc')->paginate(5);
        return view('admin.article.index', compact('articles'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        $search = $request->search;

        $articles = Article::where(function($query) use ($search) {
            $query->where('title', 'like', "%$search%")
            ->orWhere('nameSong', 'like', "%$search%")
            ->orWhere('summary', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.article.index', compact('articles', 'search'));
    }


    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.article.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'nameSong' => 'required|alpha_spaces',
            'idCategory' => 'required',
            'summary' => 'required|alpha_spaces',
            'content' => 'required|alpha_spaces',
            'idAuthor' => 'required',
            'dateW' => 'required',
            'imgArticle' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $filename = '';
        if ($request->hasFile('imgArticle')) {
            $file = $request->file('imgArticle');
            $extension = $file->getClientOriginalExtension();
            // $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    
            // if (!in_array($extension, $allowedExtensions)) {
            //     return redirect()->route('books.index')->with('error', 'Only JPG, JPEG, PNG, SVG and GIF files are allowed.');
            // }
    
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/article/' . time() . '.' .$extension;
            $file->move(public_path('/assets/img/article/'), $filename);
        }

        // C1
        // $article = Article::create([
        //     'title' => $request->title,
        //     'nameSong' => $request->nameSong,
        //     'idCategory' => $request->idCategory,
        //     'summary' => $request->summary,
        //     'content' => $request->content,
        //     'idAuthor' => $request->idAuthor,
        //     'dateW' => $request->dateW,
        //     'imgArticle' => $filename
        // ]);

        // C2
        $articleData = array_merge($validate, ['imgArticle' => $filename]);
        $article = Article::create($articleData);

        return redirect()->route('articles.index')->with('information', 'Added article successfully !');
    }

    public function show(string $id)
    {
        $article = Article::where('idArticle', $id)->first();
        $author = $article->author;
        $category = $article->category;
        return view('admin.article.show', compact('article', 'author', 'category'));
    }

    public function edit(string $id)
    {
        $article = Article::where('idArticle', $id)->first();
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.article.edit', compact('article','categories','authors'));
    }

    public function update(Request $request, string $id)
    {
        $article = Article::where('idArticle', $id)->first();

        $validate = $request->validate([
            'title' => 'required',
            'nameSong' => 'required|alpha_spaces',
            'idCategory' => 'required',
            'summary' => 'required|alpha_spaces',
            'content' => 'required|alpha_spaces',
            'idAuthor' => 'required',
            'dateW' => 'required',
            'imgArticle' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        // C1
        // $article ->update([
        //     'title' => $request->input('title'),
        //     'nameSong' => $request->input('nameSong'),
        //     'idCategory' => $request->input('idCategory'),
        //     'summary' => $request->input('summary'),
        //     'content' => $request->input('content'),
        //     'idAuthor' => $request->input('idAuthor'),
        //     'dateW' => $request->input('dateW'),
        // ]);

        // C2
        $article->update($validate);

        // Handle image update if a new image is provided
        if ($request->hasFile('imgArticle')) {
            $file = $request->file('imgArticle');
            $extension = $file->getClientOriginalExtension();

            // Remove the old image
            if (File::exists(public_path($article->imgArticle))) {
                File::delete(public_path($article->imgArticle));
            }

            // Save the new image
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/article/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/article/'), $filename);

            // Update the book record with the new image URL
            $article->update(['imgArticle' => $filename]);
        }

        return redirect()->route('articles.show', $article->idArticle)->with('information', 'Updated article successfully !');
    }

    public function destroy(string $id)
    {
        Article::where('idArticle', $id)->delete();
        
        return redirect()->route('articles.index')->with('information', 'Removed article successfully !');
    }
}
