<?php

namespace Challenge\Repositories\User;

use Challenge\User;
use Challenge\Repositories\Base;

/** 
 * Project Created for Italo Morales | @italomoralesf * 
 */

class URepository extends Base {

    public function getEntity() 
    {
        return new User;
    }

}
