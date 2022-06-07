<?php

namespace App\Imports;
use Auth;
use App\Models\User;
use Illuminate\Support\Collection;
use App\Models\Group;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class GroupsImport implements ToCollection
{
    use Importable;
    
    public function Collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $group = Group::updateOrCreate([
            'name'=>$row[0],
            'description'=>$row[1],
            'user_id'=>Auth::id(),
        ]);

            $topic=$group->topics()->updateOrCreate([
                'name'=>$row[2],
                'description'=>$row[3],
                'user_id'=>Auth::id(),
            ]);

            $question=$topic->questions()->updateOrCreate([
                        'expression'=>$row[4],
                    ]);
            $question->answer()->updateOrCreate([
                        'response'=>$row[5],
                    ]);
        }
    }


}
