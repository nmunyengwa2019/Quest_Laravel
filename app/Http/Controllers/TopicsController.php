<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function store(Group $group)
    {


        $attributes = request()->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['group_id'] = $group->id;

         $group->topics()->create($attributes);
        return redirect($group->path().'/topics');


    }

    public function index(Group $group)
    {

        // if (auth()->user()->id != $group->user_id) {
        //     abort(403);
        // }

        $topics = $group->topics;
        //$topics = Topic::all();

        //dd($topics);
        
        return view('topics/index',[
            'topics'=>$topics,
            'group'=>$group

        ]);
    }

    public function create(Group $group)
    {

        return view('topics/create',compact('group'));
    }

    public function update(Group $group , Topic $topic)
    {
        $attributes = request()->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $topic->update($attributes);

        return redirect($group->path() .'/topics');

    }

    public function edit(Group $group , Topic $topic)
    {
        return view('topics/edit',[
            'topic'=>$topic,
            'group'=>$group

        ]);
    }

    public function destroy(Group $group , Topic $topic)
    {
        $topic->delete();

        return redirect($group->path(). '/topics');

    }
}
