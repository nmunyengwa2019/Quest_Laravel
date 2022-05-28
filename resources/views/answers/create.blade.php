@extends('layouts.app')

@section('content')
<div >
	Add Answer
		<div style="margin-top: 5px;">
			<form action="{{url($group->path().'/'.$topic->path().'/questions')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
			<div style="margin-bottom: 2px;">
				<textarea name="expression" placeholder="Question..." rows="7" cols="25"></textarea>
			</div>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
	</div>
@endsection