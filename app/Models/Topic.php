<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public function path()
    {
        return 'topics/'.$this->id;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

