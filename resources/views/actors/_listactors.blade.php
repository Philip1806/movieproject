@foreach ($actors->chunk(4) as $chunks)
    <div class="row course-set courses__row my-5">
        @foreach ($chunks as $actor)
            <div class="col-md-3 course-block course-block-lessons">
                <div class="post-author">
                    <div class="rotate-img">
                        <div class="position-relative">
                            <div class="rotate-img">
                                <a href="{{ route('home.actors.show', $actor->slug) }}"><img
                                        src="{{ $actor->getImageUrl() }}" loading="lazy" alt="banner"
                                        class="card-img-top">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="post-author-content">
                        <div class="card-footer text-white bg-dark">
                            {{ $actor->name }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
{{ $actors->links() }}
