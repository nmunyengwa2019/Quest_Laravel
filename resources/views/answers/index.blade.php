@extends('layouts.app')

@section('content')
	
@if($answer && $question)
<a href="/groups" style="text-decoration: none; font-weight: bolder; color: cadetblue;">HOME</a>
<h4 class="card-header"><span style="font-size:smaller; color:orange;">Question: {{$question->expression}}</span> </h4>

<div class="card-body">
<h1 class="card-header"><span style="font-size:smaller; color:orange;">Answer:</span> {{$answer->response}}</h1>
</div>
<div style="margin-bottom: 15px;margin-left: 25px;" class="col-sm-6">
<a href="{{url($group->path().'/'.$topic->path().'/questions')}}" style="text-decoration:none;"><input type="button" value="&larr;Questions"></a>

<a href="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers/'.$answer->id.'/update')}}"><input type="button" value="Edit"></a>
</div>
<div style="margin-bottom: 15px;margin-left: 25px;">
<form action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers/'.$answer->id)}}" method="POST">
	@csrf
	@method('DELETE')
	<button style="background-color:indianred; ">Delete</button>

</form>
</div>
@else
<h1 style="text-align:center; color: indianred;" class="card-header">No answer yet!</h1>

<div class="card-body" >
	<h1 class="card-header">Add Answer</h1>
		<div style="text-align:center; margin: 15px;" class="form-group">
			<form class="form-horizontal"	 action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
				<div class="col-sm-6">
				<textarea name="response" placeholder="Answer..." class="form-control"  rows="10" cols="50"></textarea>
			</div>
				<br>
				<div class="col-sm-6">
				<button type="submit" style="margin-right: 15px;">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" value="Cancel"></a>
				</div>
			</form>



		</div>
	</div>
@endif

@endsection