@extends('layouts.app')

@section('content')

	<div class="card-body">
	<h1 class="card-header">Edit</h1>
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
		<div style="text-align:center;" class="form-group">
		
			<form method="POST" action="{{url($group->path())}}" >
				{{ method_field('PATCH')}}
				@csrf
				
				<div class="col-sm-6">
				
				<input style="margin-bottom: 15px;" value="<?= old('name');?>" class="form-control" type="text" name="name" value="{{$group->name}}">
				</div>
				<div class="col-sm-6">
				<textarea class="form-control"cols="50" rows="10" name="description" >{{$group->description}}</textarea>
				</div>
				<div class="col-sm-6">
				<button type="submit">Submit</button>
				<a href="{{url($group->path())}}"><input type="button" name="Cancel" value="Cancel"></a>
				</div>
			</form>





		</div>
	</div>
@endsection