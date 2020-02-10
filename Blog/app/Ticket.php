<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id', 'tags'
    ];

    public function comments()
    {
        return $this->hasMany(Commentaries::class);
    }
}
