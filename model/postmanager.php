<?php
namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class PostManager extends Manager 
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date');

        return $posts;
    }
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        //$_GET['post] comes from URL on index page 
        $request->execute(array($postId));
        $post = $request->fetch();

        return $post;
    }

}