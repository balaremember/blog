@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron">
      <h1><i class="fa fa-ban red"></i>Access permission</h1>
      <p class="lead">Sorry! You don't have access permissions for that on <em><span id="display-domain"></span></em>.</p>
        <p>
            <a href="http://my-blog.test/home" class="btn btn-default btn-lg green">Take Me To The Homepage</a>
        </p>
    </div>
    </div>
    <div class="container">
      <div class="body-content">
        <div class="row">
          <div class="col-md-6">
            <h2>What happened?</h2>
            <p class="lead">A 403 error status indicates that you don't have permission to access the file or page. In general, web servers and websites have directories and files that are not open to the public web for security reasons.</p>
          </div>
        </div>
      </div>
    </div>
@endsection