<?php

namespace Challenge\Repositories\Twitter;

use Challenge\Twitter;
use Challenge\Repositories\Base;
use Thujohn\Twitter\Facades\Twitter as TW;

/** 
 * Project Created for Italo Morales | @italomoralesf * 
 */

class TRepository extends Base {

    public function getEntity() 
    {
        return new Twitter;
    }
    
    public function hideTweet($id_twitter)
    {   
        $user_id = auth()->user()->id;
        
        $entity = $this->confirmTweet($id_twitter, $user_id);
        
        if($entity){
            $this->delete($entity->id);
        }else{
            $this->create([
                'id_twitter' => $id_twitter,
                'user_id'    => $user_id
            ]);
        }
    }
    
    public function confirmTweet($id_twitter, $user_id)
    {
        $entity = $this->getEntity()
                ->where('id_twitter', $id_twitter)
                ->where('user_id', $user_id)
                ->first();
        
        return $entity;
    }
    
    public function tweets($user)
    {
        try{
            $history  = TW::getUserTimeline(['screen_name' => $user->twitter, 'count' => 4, 'format' => 'array']);
        
            $timeline = '';
            foreach($history as $key => $value){
                if( ! $this->confirmTweet($value['id'], $user->id)){
                    $timeline .= '<div class="alert alert-info">';
                    $timeline .= $value['text'];
                    $timeline .= '</div>';
                }
            }
        } catch (\Exception $ex) {
            $timeline = $ex->getMessage();            
        }        
        
        return $timeline;
    }
    
    public function adminTweets($user)
    {
        try {
            $history = TW::getUserTimeline(['screen_name' => $user->twitter, 'count' => 4, 'format' => 'array']);
            
            $timeline = '';
            foreach($history as $key => $value){
                $timeline .= '<div class="alert alert-info">';
                $timeline .= '<a href="' . route('twitter', $value['id']) . '">';

                if($this->confirmTweet($value['id'], $user->id)){
                    $timeline .= '<span class="glyphicon glyphicon-eye-close pull-right" title="Tweet oculto"></span>';
                }else{
                    $timeline .= '<span class="glyphicon glyphicon-eye-open pull-right" title="Tweet visible"></span>';
                }

                $timeline .= '</a>';
                $timeline .= $value['text'];
                $timeline .= '</div>';
            }
        } catch (\Exception $ex) {
            $timeline = $ex->getMessage();            
        }                        
        
        return $timeline;
    }

}
