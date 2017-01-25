<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $guarded = [];

    public function forks()
    {
    	return $this->hasMany(Snippet::class, 'forked_id');
    }

    public function original()
    {
        return $this->belongsTo(Snippet::class, 'forked_id');
    }

    public function isForked()
    {
        return !! $this->forked_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
