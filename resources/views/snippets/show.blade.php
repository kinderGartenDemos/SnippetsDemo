@extends('layout')

@section('contents')
	<article class="snippet">
		<div class="is-flex">
			<h3 class="title is-3 flex">
				{{ $snippet->title }}
				@if ($snippet->user_id)
					<small>by {{ $snippet->user->name }}</small>
				@endif
			</h3>

			@if (auth()->user())
				@if (auth()->user()->likes->contains($snippet->id))
					<a class="like-snippet" href="/snippets/{{ $snippet->id }}/dislike">Dislike</a>
				@else
					<a class="like-snippet" href="/snippets/{{ $snippet->id }}/like">Like</a>
				@endif
			@endif
			<a href="/snippets/{{ $snippet->id }}/fork">Fork Me</a>
		</div>
		<pre>
			<code>{{ $snippet->body }}</code>
		</pre>
		@if ($snippet->countLikes())
			<i>{{ $snippet->countLikes() }} likes</i>
		@endif
	</article>

	<a href="/snippets" class="button is-primary">Back</a>

	@if ($snippet->isForked())
		<hr>
		<h3 class="title is-3">
			it is forked from 
			<a href="/snippets/{{ $snippet->original->id }}">
				{{ $snippet->original->title }}
			</a>
			@if ($snippet->original->user_id)
				by {{ $snippet->original->user->name }}
			@endif
		</h3>
	@endif

	@if ($snippet->forks->count())
		<hr>
		<h3 class="title is-3">it has forks</h3>
		<ul>
			@foreach($snippet->forks as $fork)
				<li>
					<a href="/snippets/{{ $fork->id }}">
						{{ $fork->title }}
					</a>
					@if ($fork->user_id)
						by {{ $fork->user->name }}
					@endif
				</li>
			@endforeach
		</ul>
	@endif
@stop