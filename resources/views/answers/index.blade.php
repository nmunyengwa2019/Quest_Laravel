<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>answer</title>
</head>
<body>
	
@if($answer && $question)
<a href="/groups" style="text-decoration: none; font-weight: bolder; color: cadetblue;">HOME</a>
<h4><span style="font-size:smaller; color:blueviolet;">Question:</span> {{$question->expression}}</h4>
<hr>
<h1><span style="font-size:smaller; color:blueviolet;">Answer:</span> {{$answer->response}}</h1>

<a href="{{url($group->path().'/'.$topic->path().'/questions')}}" style="text-decoration:none;"><input type="button" value="&larr;Questions"></a>

<a href="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers/'.$answer->id.'/update')}}"><input type="button" value="Edit"></a>

<form action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers/'.$answer->id)}}" method="POST">
	@csrf
	@method('DELETE')
	<button style="background-color:indianred;">Delete</button>

</form>

@else
<h1 style="text-align:center; color: indianred;">No answer yet!</h1>
<hr>
<div >
	Add Answer
		<div style="margin-top: 5px;">
			<form action="{{url($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
			<div style="margin-bottom: 2px;">
				<textarea name="response" placeholder="Answer..." rows="7" cols="25"></textarea>
			</div>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" value="Cancel"></a>
			</form>



		</div>
	</div>
@endif

</body>
</html>