@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->articles()->count() }} Articles</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
			{{ Form::close() }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tag->articles as $article)
					<tr>
						<th>{{ $article->id }}</th>
						<td>{{ $article->title }}</td>
						<td>@foreach ($article->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
							</td>
						<td><a href="{{ route('articles.show', $article->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection