<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>questions</title>
</head>
<body>
	<h1 style="text-align:center">{{$topic->name}} questions</h1>
	<hr>
	<ol>
@forelse($questions as $question)
<li>{{$question->expression}} 
&rarr; <a href="" style="text-decoration:none;"> <span style="font-size:medium;">Answers</span></a>
<br>

	<a href="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id)}}"><button type="submit" >Edit</button></a>

<form method="POST" action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id)}}">
	@csrf
	@method('DELETE')
	<button type="submit" style="background-color:indianred;">Delete</button>
</form>
</li>

<hr>
@empty
<h4>   No questions yet</h4>

@endforelse
<a href="{{url($group->path().'/topics')}}" style="text-decoration:none;"><input type="button"  value="&larr;Topics">
</a>
<a href="{{url($group->path().'/'.$topic->path().'/questions/create')}}"><input type="button"  value="Add new">
</a>
</ol>

</body>
</html>

