<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>group</title>
</head>
<body>
	<h1 style="text-align:center">Groups</h1>
	<hr>
	<ol>
@forelse($groups as $group)
<div>
<li>
	
<a href="{{'/groups/' . $group->id}}" style="text-decoration: none;"><span style="font-weight: bolder;">{{$group->name}}</span></a>
<!-- <span style="font-size: x-small; ">{{$group->description}}</span> -->
<!-- link to questions list for this topic -->
<!-- Owner: {{ $user = $group->owner}} -->
</li>
</div>
@empty
<h3>No Groups yet. Kindly add one.</h3>
@endforelse
</ol>
<div style="margin: 10px;">
<a href="{{url('groups/create')}}"><input type="button" value="Add new"> </a>
</div>
</body>
</html>