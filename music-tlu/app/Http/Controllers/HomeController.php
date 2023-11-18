<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\User;
class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::take(5)->get(); // Lấy 5 bản ghi đầu tiên
        return view('homepage', compact('articles'));
        // C2
        // $articles = Article::limit(5)->get(); // Lấy 5 bản ghi đầu tiên
    }

    public function admin()
    {
        $users = User::count();
        $category = Category::count();
        $author = Author::count();
        $article = Article::count();

        return view('admin.index', compact('users', 'category','author','article'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $article = Article::find($id);
        $author = $article->author;
        $category = $article->category;

        return view('detail',compact('article', 'author', 'category'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
