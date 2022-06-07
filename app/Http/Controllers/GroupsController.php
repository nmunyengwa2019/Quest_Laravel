<?php

namespace App\Http\Controllers;
use Illuminate\View\Middleware\SharedErrorsFromSession;
use App\Models\User;
use App\Imports\GroupsImport;
use App\Imports\TopicsImport;
use App\Imports\AnswersImport;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function create()
    {
        return view('groups/create');
    }
    public function edit(Group $group)
    {
        return view('groups/edit', compact('group'));
    }


    public function index()
    {
        //$groups= auth()->user()->groups;
        $groups = Group::all();
        
        return view('groups.index',compact('groups'));
    }


    public function store(Request $request){


        $group = Group::all();

        $attributes = request()->validate([
            'name'=>'required',
            'description'=>'required',
            ]);
       

        // if ( $attributes['name'] == $group->name ) {
        //     return " Group already exists";
        // }

        $group=auth()->user()->groups()->firstOrNew($attributes);

        $group->save();
        
         return redirect('/groups');
    }

    


    public function show(Group $group)
    {
        return view('groups/show', compact('group'));
    }

    public function update(Group $group)
    {
        $attributes = request()->validate([
            'name'=>'required',
            'description'=>'required',
            ]);
        

             if(auth()->user()->id != $group->user_id)
             {
                return redirect('/groups');
             }
         $group->update($attributes);

         return redirect('/groups');
    }

    public function destroy(Group $group)
    {
        if(auth()->user()->id != $group->user_id)
         {
            return redirect('/groups');
         }
        $group->delete();

        return redirect('/groups');
    }


}
