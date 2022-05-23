<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>group</title>
</head>
<body>
@forelse($groups as $group)
<div>
<li>
	
<a href="{{'/groups/' . $group->id}}"><span style="font-weight: bolder;">{{$group->name}}</span></a>:
<!-- <span style="font-size: x-small; ">{{$group->description}}</span> -->
<!-- link to questions list for this topic -->
<!-- Owner: {{ $user = $group->owner}} -->
</li>
</div>
@empty
<h3>No Groups yet. Kindly add one.</h3>
@endforelse
<a href="{{url('groups/create')}}">Create new group</a>
</body>
</html>