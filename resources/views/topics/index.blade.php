<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Topic</title>
</head>
<body>
	<ol>
@forelse($topics as $topic)
<li>{{ $topic->name }} &rarr; <span style="font-size: x-small;">{{ $topic->description }}</span></li>
<hr>

@empty

<h3>No topics yet!</h3>
@endforelse
</ol>
<a href="{{url($group->path() . '/topics/create')}}"> create new</a>
 </div>
</body>
</html>