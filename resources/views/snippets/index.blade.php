@extends('layout')

@section('contents')
	<div class="columns">
		<div class="columm is-8">
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
		</div>
		<div class="column is-3 is-offset-1">
			<div class="message is-primary">
				<div class="message-header">
					<p>all users</p>
				</div>
				<div class="message-body">
					<ul>
						@foreach ($users as $user)
							<li>
								{{ $user->name }} has {{ $user->likedBy()}} likes.
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			
			@if ($languages)
				<div class="message is-info">
					<div class="message-header">
						<p>all languages</p>
					</div>
					<div class="message-body">
						<ul>
							@foreach ($languages as $language)
								<li>
									<a href="/snippets/language/{{ $language->id}}">
										{{ $language->name }} 
									</a>
									<small>{{ $language->snippets->count() }}</small>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
		</div>
	</div>
@stop