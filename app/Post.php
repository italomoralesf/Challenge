<?php

namespace Challenge;

use Illuminate\Database\Eloquent\Model;

/** 
 * Project Created for Italo Morales | @italomoralesf * 
 */

class Post extends Model
{
    protected $fillable = [
        'title', 'excerpt', 'body', 'slug', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getAuthorAttribute()
    {
        return $this->user->name;
    }
    
    public function getAuthorSlugAttribute()
    {
        return $this->user->slug;
    }
    
    public function getTwitterAttribute()
    {
        return $this->user->twitter;
    }
            
}
