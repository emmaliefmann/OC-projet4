<?php 

namespace EmmaLiefmann\blog\model;

class Manager 
{
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    protected function dbConnect()
    {  
        $db = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
        return $db;

    }

    protected function createQuery($sql, $parameters=null)
    {
        if($parameters)
        {
            $result=$this->dbConnect()->prepare($sql);
            $result->execute($parameters);

            return $result;
        }

        $result=$this->dbConnect()->query($sql);
        return $result;
    }
}