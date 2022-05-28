@extends('layouts.app')

@section('content')

	<h1>Edit answer</h1>
<div class="card">
			<form action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers/'.$answer->id)}}" method="POST">
				@csrf
				{{ method_field('PATCH')}}
			<div style="margin-bottom: 2px;">
				<textarea name="response" rows="10" cols="30">{{$answer->response}}</textarea>
			</div>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
@endsection