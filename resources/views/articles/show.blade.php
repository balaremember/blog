@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-8">
			<p class="lead">Category: {{ $article->category->name }}</p>
            <h2>{{ $article->title }}</h2>
			<p class="lead">{{ $article->body }}</p>
        </div>

        <div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($article->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($article->updated_at)) }}</dd>
				</dl>
                <hr>
                
				<div class="row">
					<div class="col-sm-6">
						{!! link_to_route('articles.edit', 'Edit', array($article->id), ['class' => 'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Comments</h3>
			<hr>
			@foreach($article->comments as $comment)
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($comment->created_at)) }}</dd>
					
				</dl>
					
				<p class="lead">
					<span>{{ $comment->body }}</span>
				</p>
			@endforeach
		</div>
	</div>
@endsection