<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Group</title>
</head>
<body>
<h1 style="text-align: center;font-size:x-large;color:darkcyan; ">{{$group->name}}</h1>
<hr>

<h3>{{$group->description}}</h3>



	
	<a href="{{url($group->path() . '/edit')}}"><button type="submit"style="text-align: left;">Update</button></a>



<form style="text-align:center;" method="POST" action="{{url($group->path())}}">
	@method('DELETE')
	@csrf
	<button type="submit"style="text-align: right;">delete</button>
</form>

<a href="/groups">Back</a>
</body>
</html>