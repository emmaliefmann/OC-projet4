<?php 

class Manager 
{
    protected function dbConnect()
    //Doesn't work when protected or private
    {  
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
}