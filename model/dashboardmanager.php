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

    function deleteComment($id)
    {
        $sql = 'DELETE FROM `comments` WHERE `id` = ?';
        return $this->createQuery($sql, array($id));
    }
    
    function addPost($newPostTitle, $newPostContent)
    {
        $sql = 'INSERT INTO posts(`title`, `content`, `creation_date`) VALUES(?, ?, NOW() )';
        return $this->createQuery($sql, array($newPostTitle, $newPostContent));
    }

    function modifyPost($newTitle, $newContent, $postId)
    {
        $sql = 'UPDATE posts SET `title`= ?, `content` = ? WHERE `id` = ? ';
        return $this->createQuery($sql, array($newTitle, $newContent, $postId));
        
    }
    
    function getFlaggedComments()
    {
        $sql = 'SELECT * FROM `comments` WHERE `flagged`=1';
        return $this->createQuery($sql);
    }

    function unflagComment($id)
    {
        $sql = 'UPDATE `comments` SET `flagged`= 0 WHERE `id` = ?';
        return $this->createQuery($sql, [$id]);
    }

}
