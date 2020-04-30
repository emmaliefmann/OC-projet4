<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class AdminManager extends Manager 
{
    public function loginToAdmin()
    {
        //get user info via username, hashed password

        //compare hashed password with password in db

        //if the same, show dashboard, and $_session (look at lessopm OC e.g. $_session_name = ) 
        //?? index.php start session, come back to later
        //if not back to login page
    }
}