<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function snippets()
    {
        return $this->hasMany(Snippet::class, 'language_id');
    }
}
