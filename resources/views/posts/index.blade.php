@extends('app')

@section('content')
	<h1>Posts</h1>

	@foreach ($posts as $post)

		<article>

			<p>{{ $post->content }}</p>

		</article>

	@endforeach

@stop