@extends('layouts.app')

@section('content')
<div class="row">
    <div class="text-center">
        <h1>Articles</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>№</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
            </thead>

            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ substr($article->body, 0, 50) }}{{ strlen($article->body) > 50 ? "..." : "" }}</td>
                    <td>{{ date('M j, Y', strtotime($article->created_at)) }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-default">See</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default">Edit</a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection