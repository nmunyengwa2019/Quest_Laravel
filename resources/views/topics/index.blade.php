<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Topic</title>
</head>
<body>
@forelse($topics as $topic)
<li>{{ $topic->name }}</li>
<li>{{ $topic->description }}</li>

@empty

<h3>No topics yet!</h3>
@endforelse
<a href="{{url($group->path() . '/topics/create')}}"> create new</a>
 </div>
</body>
</html>