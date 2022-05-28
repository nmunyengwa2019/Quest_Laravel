@extends('layouts.app')

@section('content')

<div >
	Add question
		<div style="margin-top: 5px;">
			<form action="{{url($group->path().'/'.$topic->path().'/questions')}}" method="POST">
				@csrf
				{{ method_field('POST')}}
			<div style="margin-bottom: 2px;">
				<textarea name="expression" placeholder="Question..." rows="7" cols="25"></textarea>
			</div>
				<br>
				<button type="submit">Submit</button>
				<a href="{{url($group->path().'/'.$topic->path().'/questions')}}"><input type="button" name="" value="Cancel"></a>
			</form>



		</div>
	</div>


	<div class="container" style="margin-top:15px;">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action=""  enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
            </form>
        </div>
    </div>
</div>
@endsection