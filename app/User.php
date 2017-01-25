<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likes()
    {
        return $this->belongsToMany(Snippet::class, 'user_like_snippet', 'user_id', 'snippet_id');
    }

    public function snippets()
    {
        return $this->hasMany(Snippet::class);
    }

    public function likedBy()
    {
        $snippetsByUser = $this->snippets->pluck('id')->all();
        $count = \DB::table('user_like_snippet')->whereIn('snippet_id', $snippetsByUser)->count();

        return $count;
    }
}
