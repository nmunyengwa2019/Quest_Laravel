<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create</title>
</head>
<body>
 <div>
 	<!-- <h2>Add {{$group->name}} topics</h2> -->
 	<div>
 		<form method="POST" action="{{url('groups/' .$group->id.'/topics')}}">
 			@csrf
 			{{ method_field('POST')}}
 			<input type="text" name="name" placeholder="Name..."><br>
 			<br>
 			<textarea placeholder="description" name="description" rows="6" cols="25"></textarea>
 			<br>
 			<button type="submit">Submit</button>
 		</form>
 	</div>
 </div>
</body>
</html>