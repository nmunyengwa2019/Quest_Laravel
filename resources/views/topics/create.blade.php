@extends('layouts.app')

@section('content')
	
 <div class="card-body">
 <h1 class="card-header">Add topic</h1>
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
 		<form method="POST" class="form-horizontal" action="{{url('groups/' .$group->id.'/topics')}}">
 			@csrf
 			{{ method_field('POST')}}
			 <div class="col-sm-6">
 			<input type="text" value="<?= old('name');?>" class="form-control" name="name" placeholder="Name...">
			</div><br>
			<div class="col-sm-6">
 			<textarea placeholder="description" name="description" class="form-control"  rows="10" cols="50"></textarea>
			</div>
			<div class="col-sm-6">
 			<button type="submit" style="margin: 15px;">Submit</button>
 			<a href="{{url($group->path().'/topics')}}" style="margin: 15px;"><input type="button" value="Cancel"></a>
			</div>
		</form>
 	</div>
 </div>
@endsection