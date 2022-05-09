<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = '';
    public $type = 'movies';
    public $category;
    public $director;
    protected $queryString = [
        'type' => ['except' => 'movies'],
        'category' => ['except' => ''],
        'director' => ['except' => ''],
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'search' => 'required|min:2|max:50'
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        if ($this->type == "movies") {
            $moviesQueryBuilder = Movie::with('categories')->with('director');
            if ($this->search != '') {
                $moviesQueryBuilder->where('title', 'like', '%' . $this->search . '%');
            }
            if ($this->director) {
                $moviesQueryBuilder->whereRelation('director', 'id', $this->director);
            }
            if ($this->category) {
                $moviesQueryBuilder->whereRelation('categories', 'id', $this->category);
            }
            $result = $moviesQueryBuilder->paginate(8);
        } else if ($this->type == "directors") {
            $directorsQueryBuilder = Director::with('movies');
            if ($this->search != '') {
                $directorsQueryBuilder->where('name', 'like', '%' . $this->search . '%');
            }
            $result = $directorsQueryBuilder->paginate(8);
        } else {
            $actorsQueryBuilder = Actor::with('movies');
            if ($this->search != '') {
                $actorsQueryBuilder->where('name', 'like', '%' . $this->search . '%');
            }
            $result = $actorsQueryBuilder->paginate(8);
        }
        return view('livewire.search')->with('categories', Category::all())->with('directors', Director::all())->with('result', $result);
    }
}
