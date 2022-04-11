@foreach ($movies->chunk(3) as $chunks)
    <div class="row course-set courses__row">
        @foreach ($chunks as $movie)
            <div class="col-md-4 course-block course-block-lessons">
                <div class="card mb-4" style="max-width: 540px">
                    <div class="row g-0">
                        <div class="col-xl-4">
                            <img src="{{ $movie->getImageUrl() }}" alt="..." class="img-fluid h-100 w-100" />
                        </div>
                        <div class="col-xl-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('home.movies.show', $movie->slug) }}">
                                        {{ $movie->title }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    {{ $movie->plot }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
@if (method_exists($movies, 'links'))
    {{ $movies->links() }}
@endif
