<?php

namespace EmmaLiefmann\blog\model;

class DashboardManager extends Manager 
{
    function deletePost($postId)
    {
        $sql = 'DELETE FROM `posts` WHERE `id` = ?';
        return $this->createQuery($sql, [$postId]);
    }

    function deletePostComments($postId)
    {
        $sql = 'DELETE FROM `comments` WHERE `post_id` = ?';
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
    
    function unflagComment($id)
    {
        $sql = 'UPDATE `comments` SET `flagged`= 0 WHERE `id` = ?';
        return $this->createQuery($sql, [$id]);
    }

    
}
