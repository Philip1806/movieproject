<div>
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>Търсене на:</label>
                    <select class="form-control bg-dark" wire:model='type' name="category">
                        <option value="movies">Филми</option>
                        <option value="directors">Режисьори</option>
                        <option value="actors">Актьори</option>
                    </select>
                </div>
            </div>
            @if ($type == 'movies')
                <div class="col-sm">
                    <div class="form-group">
                        <label>Жанр:</label>
                        <select class="form-control bg-dark" wire:model='category' name="category">
                            <option value="0">Всички</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label>От директор:</label>
                        <select class="form-control bg-dark" wire:model='director' name="director">
                            <option value="0">Всички</option>
                            @foreach ($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="col-sm">
                <label>Съдържа:</label>
                <input type="text" wire:model='search' class="form-control" placeholder="Търсене...">
            </div>
        </div>
    </form>
    @foreach ($result->chunk(4) as $chunks)
        <div class="row course-set courses__row my-5">
            @foreach ($chunks as $content)
                <div class="col-md-3 course-block course-block-lessons">
                    <div class="post-author">
                        @if ($content->img)
                            <div class="rotate-img">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <a href="{{ $content->getUrl() }}"><img src="{{ $content->getImageUrl() }}"
                                                loading="lazy" alt="banner" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="post-author-content">
                            <div class="card-footer text-white bg-dark">
                                <a href="{{ $content->getUrl() }}">
                                    @if ($content->title)
                                        {{ $content->title }}
                                    @else
                                        {{ $content->name }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    {{ $result->links() }}
    @if ($result->isEmpty())
        <div class="alert alert-info my-3" role="alert">
            Няма намерено съдържание.
        </div>
    @endif

</div>
