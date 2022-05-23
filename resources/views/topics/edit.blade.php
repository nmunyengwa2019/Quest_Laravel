<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit</title>
</head>
<body>
	<h2>Edit</h2>
<div>
 	
 	<div>
 		<form method="POST" action="{{url($group->path() .'/'.$topic->path())}}">
 			@csrf
 			{{ method_field('PATCH')}}
 			<input type="text" name="name" value="{{$topic->name}}"><br>
 			<br>
 			<textarea  name="description" placeholder ="{{$topic->description}}" rows="6" cols="25"></textarea>
 			<br>
 			<button type="submit">Submit</button>
 			<a href="{{url($group->path().'/topics')}}"><input type="button" value ="Cancel"></a>
 		</form>
 	</div>
 </div>
</body>
</html>