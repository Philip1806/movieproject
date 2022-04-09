@extends('panel.layouts.main')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <div class="py-3 lead">
        Редактиране на филма {{ $movie->title }}
    </div>
    <div class="card-body">
        {{ Form::model($movie, ['route' => ['movies.update', $movie->id],'method' => 'PUT','enctype' => 'multipart/form-data']) }}

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
                <div class="mb-3">
                    <label class="form-label">Актьори</label>
                    {{ Form::select('actors[]', $actors, null, ['class' => 'form-control select2-multi','multiple' => 'multiple','id' => 'multisel']) }}
                </div>
                <button type="submit" class="btn btn-primary btn-block my-4">Редакция</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(".select2-multi").select2();
    </script>
@endsection
