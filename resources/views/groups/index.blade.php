@extends('layouts.app')

@section('content')
	<h1 style="text-align:center" class="text-3xl font-bold">Groups</h1>
	<hr>
<div class="justify-between">
	<div>
	<ol>
@forelse($groups as $group)
<div>
<li class="list">
	
<a href="{{'/groups/' . $group->id}}" style="text-decoration: none;"><span style="font-weight: bolder;">{{$group->name}} </span></a>
<!-- <span style="font-size: x-small; ">{{$group->description}}</span> -->
<!-- link to questions list for this topic -->
<!-- Owner: {{ $user = $group->owner}} -->
</li>
</div>
@empty
<h3>No Groups yet. Kindly add one.</h3>
@endforelse
</ol>


<div style="margin: 10px;">
<a href="{{url('groups/create')}}"><input type="button" value="Add new"> </a>
</div>
</div>
<div class="card bg-red-900">

<h3 class="card-header">You can upload csv file below</h3>
<div class="card-body">
@if (session('status'))
    <div class="alert alert-success">
       <h2 style="color:green;"> {{ session('status') }}</h2>
    </div>
@endif
<form method="POST" action="{{url('imports')}}" class="form-control" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button type="submit" >Submit</button>
</form>
</div>
</div>

</div>
@endsection