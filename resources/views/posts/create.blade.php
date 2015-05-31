@extends('app')

@section('content')
	<h1>Create a Post</h1>

	<form action="/posts" method="POST">

		<input type="text" name="content" placeholder="Type...">

		<input type="submit" value="Publish Post">

	</form>
@stop
