@extends('layouts.app')

@section('content')
	<h2>Edit</h2>
<div>
 	
 	<div>
 		<form method="POST" action="{{url($group->path() .'/'.$topic->path())}}">
 			@csrf
 			{{ method_field('PATCH')}}
 			<input type="text" name="name" value="{{$topic->name}}"><br>
 			<br>
 			<textarea  name="description"  rows="6" cols="55">{{$topic->description}}</textarea>
 			<br>
 			<button type="submit">Submit</button>
 			<a href="{{url($group->path().'/topics')}}"><input type="button" value ="Cancel"></a>
 		</form>
 	</div>
 </div>
@endsection