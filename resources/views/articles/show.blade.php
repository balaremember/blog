@extends('layouts.app')

@section('content')
    <!-- will be used to show any messages -->
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <div class="jumbotron text-center">
            <h2>{{ $article->title }}</h2>
        </div>

        <div class="bg-info text-center">
            <p>
                {{ $article->body }}<br>
            </p>
        </div>
        <blockquote class="blockquote-reverse">
            <p>Created: {{ $article->created_at }}</p>
            <footer>Last changes: <cite>{{ $article->updated_at }}</cite></footer>
        </blockquote>
    </div>
@endsection