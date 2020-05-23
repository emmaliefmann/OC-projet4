<?php

namespace EmmaLiefmann\blog\model;

class AdminManager extends Manager 
{
    public function login($username)
    {
        $sql = 'SELECT * FROM users WHERE username = ? ';
        return $this->createQuery($sql, array($username));
    }
}



