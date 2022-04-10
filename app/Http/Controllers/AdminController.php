<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::count();
        $actors = Actor::count();
        $directors = Director::count();
        return view('panel.index')->with('moviesCount', $movies)->with('actorsCount', $actors)->with('directorsCount', $directors);
    }
}
