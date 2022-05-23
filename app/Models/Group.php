<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function path()
    {
        return '/groups/' . $this->id;
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function addTopic($attributes)
    {
        return $this->topics()->create($attributes);
    }
}
