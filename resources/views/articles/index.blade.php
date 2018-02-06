<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('articles') }}">Blog</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('articles') }}">View All Articles</a></li>
            <li><a href="{{ url('articles/create') }}">Create a Article</a>
        </ul>
    </nav>

    <h1>Articles</h1>

    <!-- will be used to show any messages -->
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Body</td>
            <td>Created</td>
            <td>Last changed</td>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->body }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ url('articles/' . $value->id) }}">Show this Article</a>
                    <a class="btn btn-small btn-info" href="{{ url('articles/' . $value->id . '/edit') }}">Edit this Article</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>