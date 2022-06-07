<?php

namespace App\Http\Controllers;

use Illuminate\View\Middleware\SharedErrorsFromSession;
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

         $topic=$group->topics()->firstOrNew($attributes);
         $topic->save();
        return redirect($group->path().'/topics');


    }

    public function index(Group $group)
    {



        $topics = $group->topics;

        
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
        if (auth()->user()->id != $topic->user_id) {
            return redirect($group->path(). '/topics');
        }
        $attributes = request()->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $topic->update($attributes);

        return redirect($group->path() .'/topics');

    }

    public function edit(Group $group , Topic $topic)
    {
        if (auth()->user()->id != $topic->user_id) {
            return redirect($group->path(). '/topics');
        }
        return view('topics/edit',[
            'topic'=>$topic,
            'group'=>$group

        ]);
    }

    public function destroy(Group $group , Topic $topic)
    {
        if (auth()->user()->id != $topic->user_id) {
            return redirect($group->path(). '/topics');
        }
        $topic->delete();

        return redirect($group->path(). '/topics');

    }
}
