<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>update</title>
</head>
<body>
	<h1>Update question</h1>
<div >
	
		<div style="margin-top: 5px;">
			<form action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id)}}" method="POST">
				@csrf
				{{ method_field('PATCH')}}
			<div style="margin-bottom: 2px;">
				<textarea name="expression" placeholder="{{ $question->expression }}" rows="7" cols="25"></textarea>
			</div>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
	</div>
</body>
</html>