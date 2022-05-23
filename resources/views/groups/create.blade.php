<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create</title>
</head>
<body>
<div >
		<div style="text-align:center;">
			<form action="{{url('/groups')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
				<input type="text" name="name" placeholder="New group name...">
				<input type="text" name="description" placeholder="New description...">
				<button type="submit">Submit</button>
				<a href="{{url('/groups')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
	</div>
</body>
</html>