@extends('layouts.app')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

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
            
            {{ Form::label('tags', 'Tag: ') }}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value='{{ $tag->id }}'> {{ $tag->name }} </option>
                @endforeach
            </select>

            {{ Form::label('body', 'Body: ') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            
            {{ Form::submit('Create Article', ['class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 15px;']) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection