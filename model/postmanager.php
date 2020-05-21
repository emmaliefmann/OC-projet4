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
        $postObject = new \EmmaLiefmann\blog\model\Post();
        $postObjects = [];
        for($x = 0; $x <= 10; $x++) {
            $postObject->setId($data['id']);
            $postObject->setTitle($data['title']);
            $postObject->setContent($data['content']);
            $postObject->setCreationDate($data['creation_date_fr']);
            array_push($postObjects, [$postObject]);
        }
            var_dump($postObjects[1]);
        
        
    }
    
    //insert parameter to limit to five for home page but select all for chapters 
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';
        $result = $this->createQuery($sql);
        $data = $result->fetch();
        //return $this->buildObjects($data);
        $this->buildObjects($data);
        
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