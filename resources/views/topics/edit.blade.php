@extends('layouts.app')

@section('content')
	
<div class="card-body">
<h2 class="card-header">Edit</h2>
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
 		<form class="form-horizontal" method="POST" action="{{url($group->path() .'/'.$topic->path())}}">
 			@csrf
 			{{ method_field('PATCH')}}
			 <div class="col-sm-6">
 			<input type="text" class="form-control" value="<?= old('name');?>" name="name" value="{{$topic->name}}"><br>
 			
			</div>

			 <div class="col-sm-6">
 			<textarea  name="description" class="form-control"  rows="10" cols="50">{{$topic->description}}</textarea>
			</div>
			<div class="col-sm-6">
 			<button type="submit" style="margin: 15px;">Submit</button>
 			<a href="{{url($group->path().'/topics')}}" style="margin: 15px;"><input type="button" value ="Cancel"></a>
			</div>
		</form>
 	</div>
 </div>
@endsection