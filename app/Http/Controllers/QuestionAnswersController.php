<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Topic;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;


class QuestionAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group,Topic $topic, Question $question)
    {

        $answers = $question->answer()->first();
        return view('answers/index',[
                            'answer'=>$answers,
                            'question'=>$question,
                            'group'=>$group,
                            'topic'=>$topic,
                        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group,Topic $topic, Question $question)
    {
        return view('answers/create',[
                            
                            'question'=>$question,
                            'group'=>$group,
                            'topic'=>$topic,                           
                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Group $group,Topic $topic, Question $question)
    {
        $attributes = request()->validate([
            'response'=>'required'
        ]);
        $attributes['question_id'] = $question->id;

        $answer=$question->answer()->firstOrNew($attributes);
        
        $answer->save();

        return redirect($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers');
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
    public function edit(Group $group,Topic $topic, Question $question ,Answer $answer)
    {
        return view('answers/edit',
                        [
                            'group'=>$group,
                            'topic'=>$topic,
                            'question'=>$question,
                            'answer'=>$answer

                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Group $group,Topic $topic, Question $question ,Answer $answer)
    {
        $attributes = request()->validate([
                                'response'=>'required'
                                ]);
        $answer->update($attributes);
        return redirect($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group,Topic $topic, Question $question ,Answer $answer)
    {
        $answer->delete();

        return redirect($group->path().'/'.$topic->path().'/questions/'.$question->id.'/answers');
        
    }
}
