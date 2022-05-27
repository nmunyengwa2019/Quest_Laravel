<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Topics</title>
</head>
<body>
	<a href="/groups" style="text-decoration: none; font-weight: bolder; color: cadetblue;">HOME</a>
	<h1 style="text-align:center">{{$group->name }} Topics 
	
	</h1>
	<hr>

	<ol>
@forelse($topics as $topic)
<li>{{ $topic->name }} &rarr;
<a href="{{url($group->path().'/'.$topic->path().'/questions')}}" style="text-decoration:none; margin-bottom:10px ;">
	 	<span style="font-size:smaller;">Questions</span>
	 </a> 


	<span style="font-size: x-small;"><h3>{{ $topic->description }}</h3></span>
 

<div>
<a href="{{url($group->path() .'/'.$topic->path() . '/edit')}}" style="margin-top: 10px;">
	<input type="button" value="Edit">
</a>
</div>
<div style="margin-top: 10px;">
<form method="POST" action="{{url($group->path().'/'.$topic->path())}}">
	@csrf
	@method('DELETE')
	<a href="{{url($group->path() .'/'.$topic->path())}}"  ><button type="submit" style="background-color:indianred;"> Delete  </button> </a>
</form>
</div>
</li>
<hr>

@empty

<h3>No topics yet! </h3>
@endforelse
</ol><div >
<a href="{{url($group->path())}}" style="text-align:center;margin:20px;"><input type="button" value="&larr;Back"></a>
<a href="{{url($group->path() . '/topics/create')}}" style="margin:10px; text-decoration: none;"><input type="button" value="Add new"> </a>


</div>
 </div>
</body>
</html>