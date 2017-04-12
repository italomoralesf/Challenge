<?php

namespace Challenge;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    protected $fillable = [
        'id_twitter', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
