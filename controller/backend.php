<?php 

//namespace here

require_once('model/adminmanager.php');


    public function loginToAdmin($username)
    {
        $adminManager = new \EmmaLiefmann\blog\model\AdminManager();
        //how do I get the username entered in the form here? like this via index? 
        $loginAttempt = $adminManager->login($username);
        //if no result, error => wrong login
        //if there is a result, compare the passwords 
        //if a match, open dashboard
    }

    //$adminManager = new AdminManager 
        //$
        //get user info via username, hashed password

        //compare hashed password with password in db

        //if the same, show dashboard, and $_session (look at lesson OC e.g. $_session_name = ) 
        //?? index.php start session, come back to later
        //if not back to login page