<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create</title>
</head>
<body>
	<h3>Create new group</h3>
<div style="margin-left: 15px;">
		<div >
			<form action="{{url('/groups')}}" method="POST">
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
</body>
</html>