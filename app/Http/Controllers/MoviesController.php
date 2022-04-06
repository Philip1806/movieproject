<?php

namespace App\Http\Controllers;

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
        return view('panel.movies.create');
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
        $movie->slug = Str::slug($request->name);
        $movie->original_title = $request->original_title;
        $movie->year = $request->year;
        $movie->plot = $request->plot;
        $movie->director_id = 0; //TODO
        $movie->save();

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
        return view('panel.movies.edit')->with('movie', Movie::findOrFail($id));
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
        ];
        $this->validate($request, $rules);
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        $movie->year = $request->year;
        $movie->plot = $request->plot;
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
        $movie->delete();
        Session::flash('success', "Филма е премахнат.");
        return redirect()->back();;
    }
}
