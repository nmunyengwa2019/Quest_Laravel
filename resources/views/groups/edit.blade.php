<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>
</head>
<body>

	<div>
		<div style="text-align:center;">
			<form method="POST" action="{{url($group->path())}}" >
				{{ method_field('PATCH')}}
				@csrf
				<input type="text" name="name" value="{{$group->name}}">
				<input type="text" name="description" value ="{{$group->description}}">
				<button type="submit">Submit</button>
				<!-- <a href="{{url($group->path())}}"><input type="button" name="Cancel" value="Cancel"></a> -->
			</form>





		</div>
	</div>

</body>
</html>