<?php
namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class PostManager extends Manager 
{   
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';
        return $this->createQuery($sql);
    }
    
    public function getPost($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?';
        return $this->createQuery($sql, [$postId]);
    }
}