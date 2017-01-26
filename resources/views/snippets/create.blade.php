@extends('layout')

@section('contents')
	<div>
		<h3 class="title is-3">create a new snipepts</h3>
	</div>
	<form action="/snippets" method="POST">
		{{ csrf_field() }}

		@if ($snippet)
			<input type="hidden" name="forked_id" value="{{ $snippet->id }}">
		@endif

		<div class="control">
		    <label for="title" class="label">Title:</label>
		    <input type="text" id="title" name="title" class="input" value="{{ $snippet->title }}">
		</div>
		
		<div class="control">
		    <label for="body" class="label">Body:</label>
		    <textarea id="body" name="body" class="textarea">{{ $snippet->body }}</textarea>
		</div>
		
		@if ($languages)
			<div class="control">
			    <label for="language" class="label">Language:</label>
				<span class="select">
					<select name="language_id">
						<option value="">none</option>
						@foreach ($languages as $language)
							<option value="{{ $language->id }}"
									@if ($language->id == $snippet->language->id) selected="selected" @endif 
							>
								{{ $language->name }}
							</option>
						@endforeach
					</select>
				</span>
			</div>
		@endif
		
		<div class="control">
		    <button class="button is-primary">publish snippets</button>
		</div>
	</form>
@stop