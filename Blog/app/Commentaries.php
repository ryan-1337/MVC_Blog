<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaries extends Model
{
        protected $fillable = [
        'ticket_id', 'user_id', 'commentaries'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
