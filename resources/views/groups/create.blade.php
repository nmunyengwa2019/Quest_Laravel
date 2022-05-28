@extends('layouts.app')

@section('content')
	
<div class="card">
	<h3 class="card-header">Create new group</h3>
		<div class="card-body bg-red-900" >
			<form action="{{url('/groups')}}" method="POST" class="form-control">
				@csrf
				{{ method_field('POST')}}
				<input type="text" name="name" placeholder="New group name..." style="margin-bottom: 15px;"><br>
				<textarea name="description" placeholder="New description..." rows="6" cols=" 25"></textarea>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url('/groups')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
	</div>
@endsection