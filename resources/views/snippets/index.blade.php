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
		@endforeach
	@else
		<p>there's no snippets yet</p>
	@endif
@stop