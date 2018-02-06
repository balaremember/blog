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

    <h1>Create a Article</h1>
    

</div>
</body>
</html>