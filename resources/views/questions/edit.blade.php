@extends('layouts.app')

@section('content')
	
<div class="card-body">
	<h1 class="card-header">Update question</h1>
		<div style="text-align:center; margin: 15px;" class="form-group">
			<form class="form-horizontal" action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id)}}" method="POST">
				@csrf
				{{ method_field('PATCH')}}
			<div class="col-sm-6">
				<textarea name="expression"  class="form-control"  rows="10" cols="50">{{ $question->expression }}</textarea>
			</div>
				<br>
				<div class="col-sm-6">
				<button type="submit" style="margin-right: 15px;">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input  type="button" name="" value="Cancel"></a>
				</div>
			</form>



		</div>
	</div>
@endsection