<?php

namespace App\Imports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class AnswersImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Answer([
            'response'=>$row[5],
            'question_id'=>1,
        ]);
    }
}
