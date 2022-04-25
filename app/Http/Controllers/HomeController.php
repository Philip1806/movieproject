<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index')->with('movies', Movie::latest()->limit(9)->get());
    }
    public function movies()
    {
        return view('movies.index')->with('movies', Movie::latest()->paginate(6))->with('categories', Category::all());
    }
    public function genre($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        if (!$category) abort(404);
        $movies = $category->movies()->latest()->paginate(9);
        return view('movies.category')->with('category', $category)->with('movies', $movies);
    }
    public function actors()
    {
        return view('actors.index')->with('actors', Actor::paginate(12));
    }
    public function actorsShow($slug)
    {
        $actor = Actor::where('slug', '=', $slug)->first();
        if (!$actor) abort(404);
        $movies = $actor->movies()->latest()->paginate(9);
        return view('actors.show')->with('actor', $actor)->with('movies', $movies);
    }
    public function moviesShow($slug)
    {
        $movie = Movie::where('slug', '=', $slug)->first();
        if (!$movie) abort(404);
        $actors = $movie->actors()->paginate(9);
        return view('movies.show')->with('movie', $movie)->with('actors', $actors);
    }

    public function userShow($slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) abort(404);
        $movies = $user->movies()->latest()->paginate(6);
        return view('user')->with('user', $user)->with('movies', $movies);
    }
}
