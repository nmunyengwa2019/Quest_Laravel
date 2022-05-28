@extends('layouts.app')

@section('content')
	<h1>Add topic</h1>
 <div>
 	<!-- <h2>Add {{$group->name}} topics</h2> -->
 	<div>
 		<form method="POST" action="{{url('groups/' .$group->id.'/topics')}}">
 			@csrf
 			{{ method_field('POST')}}
 			<input type="text" name="name" placeholder="Name..."><br>
 			<br>
 			<textarea placeholder="description" name="description" rows="6" cols="25"></textarea>
 			<br>
 			<button type="submit">Submit</button>
 			<a href="{{url($group->path().'/topics')}}"><input type="button" value="Cancel"></a>
 		</form>
 	</div>
 </div>
@endsection