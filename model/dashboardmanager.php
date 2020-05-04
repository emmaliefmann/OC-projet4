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
        
        $sql = 'DELETE FROM `posts` WHERE `id` = ?';
        return $this->createQuery($sql, [$postId]);
    }

    
    function addPost($newPostTitle, $newPostContent)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(`title`, `content`, `creation_date`) VALUES(?, ?, NOW() )');
        $affectedLines = $newPost->execute(array($newPostTitle, $newPostContent));
        return $affectedLines;
    }

    function modifyPost($newTitle, $newContent, $postId)
    {
        $db = $this->dbConnect();
        $modifiedPost = $db->prepare('UPDATE posts SET `title`= ?, `content` = ? WHERE `id` = ? ' );
        $affectedLines = $modifiedPost->execute(array($newTitle, $newContent, $postId));
        return $affectedLines;
        
    }

}
