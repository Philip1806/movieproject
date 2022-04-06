@extends('panel.layouts.main')

@section('content')
    <div class="py-3 lead">
        Добавяне на филм
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'movies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label class="form-label">Име</label>
                    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <div class="mb-3">
                    <label class="form-label">Оригинално Име</label>
                    {{ Form::text('original_title', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    {{ Form::text('plot', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <label class="form-label">Година</label>
                    {{ Form::number('year', null, ['class' => 'form-control']) }}
                </div>
                <button type="submit" class="btn btn-primary btn-block my-4">Добавяне</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
