@extends('panel.layouts.main')

@section('content')
    <div class="row my-2">
        <div class="col-lg">
            <div class="lead">
                Списък с филми
            </div>
        </div>
        <div class="col-lg-3">
            <a href="{{ route('movies.create') }}" class="btn btn-primary btn-block" role="button">
                <i class="fa-solid fa-plus"></i> Филм
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-lg">
            <thead class="thead-dark">
                <tr>
                    <th>Име</th>
                    <th>Сюжет</th>
                    <th style="min-width: 150px;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <p class="font-bold ms-3 mb-0">
                                    <img src="{{ $movie->getImageUrl() }}" height="100px">
                                    <b>{{ $movie->title }}</b> ({{ $movie->year }})
                                </p>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <p class="font-bold ms-3 mb-0">
                                    {{ $movie->plot }}
                                </p>
                            </div>
                        </td>
                        <td class="text-right align-middle">
                            <div class="d-inline-block mb-1">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning" role="button"
                                    aria-disabled="true" title="Редактиране"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>

                            <div class="d-inline-block">
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Изтриване"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <b>Няма добавени филми.</b>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
@endsection
