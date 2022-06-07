@extends('layouts.app')

@section('content')
<div class="card-body">
	<h1 class="card-header">Add Answer</h1>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>
				{{$error}}
			</li>
			@endforeach
		</ul>
	</div>
	@endif
		<div style="text-align:center; margin: 15px;" class="form-group">
			<form class="form-horizontal" action="{{url($group->path().'/'.$topic->path().'/questions')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
				<div class="col-sm-6">
				<textarea name="expression" placeholder="Question..."  class="form-control"  rows="10" cols="50"></textarea>
			</div>
				<br>
			<div class="col-sm-6">
				<button type="submit" style="margin-right: 15px;">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" name="" value="Cancel"></a>
			</form>
			</div>

		</div>
	</div>
@endsection