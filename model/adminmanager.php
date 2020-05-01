<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');


class AdminManager extends Manager 
{
    public function login($username)
    {
        
        
        $sql = 'SELECT * FROM users WHERE username = ? ';
        return $this->createQuery($sql, [$username]);
        //result is query of database based on username entered
        //function in manager.php
    }
}



