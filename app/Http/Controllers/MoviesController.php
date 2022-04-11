<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.movies.index')->with('movies', Movie::latest()->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allActors = Actor::all();
        $actors = array();
        foreach ($allActors as $actor) {
            $actors[$actor->id] = $actor->name;
        }

        $allDirectors = Director::all();
        $directors = array();
        foreach ($allDirectors as $director) {
            $directors[$director->id] = $director->name;
        }

        $allGenres = Category::all();
        $genres = array();
        foreach ($allGenres as $genre) {
            $genres[$genre->id] = $genre->name;
        }
        return view('panel.movies.create')->with('genres', $genres)->with('actors', $actors)->with('directors', $directors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:3|max:250',
            'image' => 'image|max:8192',
            'plot' => 'required|min:3|max:250',
            'year' => 'required|numeric',
        ];
        $this->validate($request, $rules);
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->slug = Str::slug($request->title);
        $movie->original_title = $request->original_title;
        $movie->year = $request->year;
        $movie->plot = $request->plot;
        $movie->user_id = auth()->user()->id;
        if (Director::find($request->director)) {
            $movie->director_id = $request->director;
        } else {
            Session::flash('error', "Режисьора не съществува");
            return redirect()->route('movies.index');;
        }
        if ($request->image) {
            try {
                $movie->img = Movie::saveImage($request->file('image'));
            } catch (\Exception $e) {
                Session::flash('error', "Проблем при качване на файл.");
                return redirect()->back();;
            }
        }
        $movie->save();
        $movie->actors()->sync($request->actors, false);
        $movie->categories()->sync($request->categories, false);
        Session::flash('success', "Филма е добавен");
        return redirect()->route('movies.index');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allActors = Actor::all();
        $actors = array();
        foreach ($allActors as $actor) {
            $actors[$actor->id] = $actor->name;
        }
        $allDirectors = Director::all();
        $directors = array();
        foreach ($allDirectors as $director) {
            $directors[$director->id] = $director->name;
        }

        $allGenres = Category::all();
        $genres = array();
        foreach ($allGenres as $genre) {
            $genres[$genre->id] = $genre->name;
        }
        return view('panel.movies.edit')->with('movie', Movie::findOrFail($id))->with('genres', $genres)->with('actors', $actors)->with('directors', $directors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:3|max:250',
            'image' => 'image|max:8192',
            'plot' => 'required|min:3|max:250',
            'year' => 'required|numeric',
            'slug' => 'max:250',
        ];
        $this->validate($request, $rules);
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        $movie->year = $request->year;
        $movie->plot = $request->plot;
        if (Director::find($request->director)) {
            $movie->director_id = $request->director;
        } else {
            Session::flash('error', "Режисьора не съществува");
            return redirect()->route('movies.index');;
        }
        if ($request->removeimg) {
            $movie->deleteImage();
        }
        if ($request->image) {
            try {
                $imageaddress = Movie::saveImage($request->file('image'));
                $movie->deleteImage();
            } catch (\Exception $e) {
                Session::flash('error', "Проблем при качване на файл.");
                return redirect()->back();;
            }
            $movie->img = $imageaddress;
        }
        if ($request->slug) {
            $movie->slug = $request->slug;
        }
        $movie->categories()->sync($request->categories);
        $movie->actors()->sync($request->actors);
        $movie->save();

        Session::flash('success', "Филма е редактиран");
        return redirect()->route('movies.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->categories()->detach();
        $movie->actors()->detach();
        $movie->deleteImage();
        $movie->delete();
        Session::flash('success', "Филма е премахнат.");
        return redirect()->back();;
    }
}
