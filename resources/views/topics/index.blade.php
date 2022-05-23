<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Topics</title>
</head>
<body>
	<h1>{{$group->name }} Topics</h1>
	<ol>
@forelse($topics as $topic)
<li>{{ $topic->name }} &rarr; <span style="font-size: x-small;">{{ $topic->description }}</span>
<a href="{{url($group->path() .'/'.$topic->path() . '/edit')}}" style="margin-right: 7px;"><input type="button" value="Edit"></a>
<form method="POST" action="{{url($group->path().'/'.$topic->path())}}">
	@csrf
	@method('DELETE')
	<a href="{{url($group->path() .'/'.$topic->path())}}"  ><button type="submit" style="background-color:indianred;"> Delete  </button> </a>
</form>

</li>
<hr>

@empty

<h3>No topics yet! </h3>
@endforelse
</ol><div >
<a href="{{url($group->path() . '/topics/create')}}" style="margin:20px; text-decoration: none;"><input type="button" value="Add new"> </a>

<a href="{{url($group->path())}}" style="text-align:center"><input type="button" value="Cancel"></a>
</div>
 </div>
</body>
</html>