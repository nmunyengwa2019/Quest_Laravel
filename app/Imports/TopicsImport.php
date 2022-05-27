<?php

namespace App\Imports;

use Auth;
use App\Models\Topic;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class TopicsImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Topic([
            'name'=>$row[2],
            'description'=>$row[3],
            'group_id'=>1,
            'user_id'=>Auth::id(),
        ]);
        
    }
}
