<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');


class DashboardManager extends Manager 
{
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date';
        return $this->createQuery($sql);
    }

    function getPost($postId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?';
        
        return $this->createQuery($sql, [$postId]);
    }

    function deletePost($postId)
    {
        //get row with id 
        //return it 
        $db = $this->dbConnect();
        $postToDelete = $db->prepare('DELETE FROM `posts` WHERE `id` = ?');
    }

    
    function addPost($newPostTitle, $newPostContent)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(`title`, `content`, `creation_date`) VALUES(?, ?, NOW() )');
        $affectedLines = $newPost->execute(array($newPostTitle, $newPostContent));
        return $affectedLines;
    }
}
