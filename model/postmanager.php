<?php
namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class PostManager extends Manager 
{
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
    
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date';
        return $this->createQuery($sql);
    }
    
    public function getPost($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?';
        //$_GET['post] comes from URL on index page 
        //$request->execute(array($postId));
        

        return $this->createQuery($sql, [$postId]);
    }

}