@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Articles</h1>
    </div>
    <!-- will be used to show any messages -->
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>№</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
            </thead>

            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->body }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-default btn-sm">See</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default btn-sm">Edit</a>
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection