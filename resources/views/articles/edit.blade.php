@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Edit article "{{ $article->title }}"</h1>
    </div>

    <div class="row">
        {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
            <div class="col-md-8">
                {{ Form::label('title', 'Title: ') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}
                {{ Form::label('body', 'Body: ') }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            </div>

        <div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($article->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($article->updated_at)) }}</dd>
                </dl>
                
                <hr>
                
                <div class="row">
					<div class="col-sm-6">
						{!! link_to_route('articles.show', 'Back', array($article->id), ['class' => 'btn btn-danger btn-block']) !!}
					</div>
					<div class="col-sm-6">
                        {{ Form::submit('Updated', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

			</div>
		</div>
        {!! Form::close() !!}
    </div>
@endsection