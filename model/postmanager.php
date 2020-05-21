<?php
namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class PostManager extends Manager 
{
    private function buildObject($post) {
        $postObject = new Post();
        $postObject->setId($post['id']);
        $postObject->setTitle($post['title']);
        $postObject->setContent($post['content']);
        $postObject->setCreationDate($post['creation_date_fr']);
        return $postObject;
    }   
    //insert parameter to limit to five for home page but select all for chapters 
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';
        return $this->createQuery($sql);
    }

    public function getHomePosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 3';
        return $this->createQuery($sql);
    }
    
    public function getPost($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $post = $result->fetch();
        return $this->buildObject($post);
    }
}