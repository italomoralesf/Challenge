<?php

namespace Challenge\Repositories;

/** 
 * Project Created for Italo Morales | @italomoralesf * 
 */

abstract class Base {
    
    protected $entity;
    
    public function __construct() 
    {
        $this->entity = $this->getEntity();
    }

    abstract public function getEntity();
       
    public function slug($slug)
    {
        return $this->getEntity()
                ->where('slug', $slug)
                ->first();
    }
       
    public function getId($id)
    {
        return $this->getEntity()
                ->where('id', $id)
                ->first();
    }
        
    public function create(array $data) {
        return $this->getEntity()->create($data);
    }
    
    public function update($entity, $data)
    {
        $entity->fill($data);        
        $entity->save();
    } 
    
    public function delete($id) 
    {
        $entity = $this->getId($id);
        
        $entity->delete();
    }
    
}