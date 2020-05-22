<?php
namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');
require_once('model/post.php');
class PostManager extends Manager 
{
    private function buildObject($post) {
        $postObject = new \EmmaLiefmann\blog\model\Post();
        $postObject->setId($post['id']);
        $postObject->setTitle($post['title']);
        $postObject->setContent($post['content']);
        $postObject->setCreationDate($post['creation_date_fr']);
        return $postObject;
    }
    
    private function buildObjects($data) {
        
        $postObjects = [];
        foreach($data as $postObject) {
            $postObject = new \EmmaLiefmann\blog\model\Post();
            $postObject ->setId($postObject['id']);
            $postObject->setTitle($data['title']);
            $postObject->setContent($data['content']);
            $postObject->setCreationDate($data['creation_date_fr']);
            array_push($postObjects, [$postObject]);
        }
        
        
    }
    
    //insert parameter to limit to five for home page but select all for chapters 
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';
        $result = $this->createQuery($sql);
        $postObjects = [];
        while ($data = $result->fetch()) {
            $postObject = new \EmmaLiefmann\blog\model\Post();
            $postObject ->setId($data['id']);
            $postObject->setTitle($data['title']);
            $postObject->setContent($data['content']);
            $postObject->setCreationDate($data['creation_date_fr']);
            array_push($postObjects, [$postObject]);
        }
        
        return $postObjects;
        //return $this->buildObjects($data);
        //return $this->buildObjects($data);
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
        //var_dump($post);
        return $this->buildObject($post);
    }
}