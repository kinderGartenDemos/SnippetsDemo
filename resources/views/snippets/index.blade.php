@extends('layout')

@section('contents')
	@if (count($snippets))
		@foreach ($snippets as $snippet)
			<article class="snippet">
				<div class="is-flex">
					<h3 class="title is-3 flex">
						<a href="/snippets/{{ $snippet->id }}">
							{{ $snippet->title }}
						</a>
					</h3>
					<a href="/snippets/{{ $snippet->id }}/fork">Fork Me</a>
				</div>
				<pre>
					<code>{{ $snippet->body }}</code>
				</pre>
			</article>
		@endforeach
	@else
		<p>there's no snippets yet</p>
	@endif
@stop