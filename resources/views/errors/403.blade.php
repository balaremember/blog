@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron text-center">
      <h1><i class="fa fa-ban red"></i>Access permission</h1>
      <p class="lead">Sorry! You don't have access permissions for that on <em><span id="display-domain"></span></em>.</p>
        <p>
            <a href="http://my-blog.test/home" class="btn btn-default btn-lg green">Take Me To The Homepage</a>
        </p>
    </div>
    </div>
@endsection