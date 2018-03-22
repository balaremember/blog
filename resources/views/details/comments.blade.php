@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $article->title }}</h1>
			<p>{{ $article->body }}</p>
			<hr>
			<p>Posted In: {{ $article->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($article->comments as $comment)
				<div class="comment">
					<p><strong>Comment:</strong><br/>{{ $comment->body }}</p><br>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $article->id], 'method' => 'POST']) }}
				
				<div class="row">
					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection