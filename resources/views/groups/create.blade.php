@extends('layouts.app')

@section('content')

	
<div class="card-body">
	<h3 class="card-header">Create new </h3>
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
		
			<form class="form-horizontal" action="{{url('/groups')}}" method="POST" class="form-horizontal">
				@csrf
				{{ method_field('POST')}}
			<div class="col-sm-6">
				<input class="form-control" value="<?= old('name');?>" type="text" name="name" placeholder="Group name..." style="margin-bottom: 15px;">
			</div>
			<div class="col-sm-6">
				<textarea class="form-control" value="<?= old('description');?>"  rows="10" cols="50" name="description" placeholder="Group description..."></textarea>
			</div>
			<div class="col-sm-6" style="margin-top: 15px;">
				<button type="submit" style="margin-right: 15px;">
					
				Submit</button>
				<a href="{{url('/groups')}}"><input type="button" name="" value="Cancel"></a>
			</div>
			</form>



		</div>
	</div>
@endsection