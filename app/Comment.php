<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'idea_id',
        'user_id'
    ];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
