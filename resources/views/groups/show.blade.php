@extends('layouts.app')

@section('content')
	<a href="/groups" style="text-decoration: none; font-weight: bolder; color: cadetblue;">HOME</a>
<h1 style="text-align:center"><span style="text-align: center;font-size:x-large;color:darkcyan; ">{{$group->name}} </span> &rarr; 
<a href="{{url($group->path().'/topics')}}" style="font-size:medium; text-decoration: none;">Topics</a>

</h1>
<hr>

<h3>{{$group->description}}</h3>



	
	<a href="{{url($group->path() . '/edit')}}"><button type="submit"style="margin: 20px;">Update</button></a>



<form style="margin: 20px" method="POST" action="{{url($group->path())}}">
	@method('DELETE')
	@csrf
	<button type="submit"style="text-align: right; color: red;">delete </button>
</form>

@endsection