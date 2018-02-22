@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create a Article</h1>
        <hr>

        {!! Form::open(['route' => 'articles.store']) !!}
            {{ Form::label('title', 'Title: ') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            
            {{ Form::label('category_id', 'Category: ') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach
            </select>
            
            {{ Form::label('body', 'Body: ') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            
            {{ Form::submit('Create Article', ['class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 15px;']) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection