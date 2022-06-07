<?php

namespace App\Http\Controllers;

use Illuminate\View\Middleware\SharedErrorsFromSession;
use App\Models\User;
use App\Models\Group;
use App\Models\Topic;
use App\Models\Question;
use Illuminate\Http\Request;

class TopicQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group,Topic $topic)
    {
        //$questions= Question::all();
        $questions = $topic->questions;
        return view('questions/index',[
                'questions'=>$questions,
                'group'=>$group,
                'topic'=>$topic,
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group, Topic $topic)
    {

        return view('questions/create',[
                'group'=>$group,
                'topic'=>$topic
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Group $group, Topic $topic)
    {
        $attributes = request()->validate([
            'expression'=>'required'
        ]);

        $attributes['topic_id'] = $topic->id;

        $question = $topic->questions()->firstOrNew($attributes);
        $question->save();
        return redirect($group->path().'/'.$topic->path().'/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, Topic $topic, Question $question)
    {
        return view('questions/edit',
                        [
                            'group'=>$group,
                            'topic'=>$topic,
                            'question'=>$question,
                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Group $group, Topic $topic, Question $question)
    {
        // if (auth()->user()->id != $topic->user_id) {
        //     abort(403);
        // }

        $attributes=request()->validate(['expression'=>'required']);
        $question->update($attributes);
        return redirect($group->path().'/'.$topic->path().'/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group, Topic $topic, Question $question)
    {
        $question->delete();
        return redirect($group->path().'/'.$topic->path().'/questions');
    }
}
