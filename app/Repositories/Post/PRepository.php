<?php

namespace Challenge\Repositories\Post;

use Challenge\Post;
use Challenge\Repositories\Base;

/** 
 * Project Created for Italo Morales | @italomoralesf * 
 */

class PRepository extends Base {

    public function getEntity() 
    {
        return new Post;
    }
    
    public function lastPost($take)
    {
        return $this->getEntity()
                ->orderBy('id', 'DESC')
                ->paginate($take);
    }
    
    public function author($take, $user)
    {
        return $this->getEntity()
                ->orderBy('id', 'DESC')
                ->where('user_id', $user)
                ->paginate($take);
    }
    
    public function myItems($user)
    {
        return $this->getEntity()
                ->orderBy('id', 'DESC')
                ->where('user_id', $user)
                ->paginate(15);
    }   
    
    public function createPost(array $data){
        return $this->getEntity()->create([
            'title'     => $data['title'],
            'slug'      => $data['slug'],
            'excerpt'   => $data['excerpt'],
            'body'      => $data['body'],
            'user_id'   => auth()->user()->id,
        ]);
    }

}
