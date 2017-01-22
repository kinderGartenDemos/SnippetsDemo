@extends('layout')

@section('contents')
	<article class="snippet">
		<div class="is-flex">
			<h3 class="title is-3 flex">
				{{ $snippet->title }}
			</h3>

			<a href="/snippets/{{ $snippet->id }}/fork">Fork Me</a>
		</div>
		<pre>
			<code>{{ $snippet->body }}</code>
		</pre>
	</article>

	<a href="/snippets" class="button is-primary">Back</a>

	@if ($snippet->isForked())
		<hr>
		<h3 class="title is-3">
			it is forked from 
			<a href="/snippets/{{ $snippet->original->id }}">
				{{ $snippet->original->title }}
			</a>
		</h3>
	@endif

	@if ($snippet->forks->count())
		<hr>
		<h3 class="title is-3">it has forks</h3>
		<ul>
			@foreach($snippet->forks as $fork)
				<a href="/snippets/{{ $fork->id }}">
					{{ $fork->title }}
				</a>
			@endforeach
		</ul>
	@endif
@stop