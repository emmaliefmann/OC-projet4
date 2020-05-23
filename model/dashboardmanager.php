<?php

namespace EmmaLiefmann\blog\model;

class DashboardManager extends Manager 
{
    private function buildObject($comment) {
        $commentObject = new \EmmaLiefmann\blog\model\Comment();
        $commentObject->setId($comment['id']);
        $commentObject->setPostId($comment['post_id']);
        $commentObject->setComment($comment['comment']);
        //$commentObject->setCommentDate($comment['comment_date_fr']);
        $commentObject->setFlagged($comment['flagged']);
        return $commentObject;
    }   

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
    
    function getFlaggedComments()
    {
        $sql = 'SELECT * FROM `comments` WHERE `flagged`=1';
        $result = $this->createQuery($sql);
        $commentObjects = [];
        while ($data = $result->fetch()) {
            $commentObject = $this->buildObject($data);
            array_push($commentObjects, $commentObject);
        }
        return $commentObjects;
    }

    function unflagComment($id)
    {
        $sql = 'UPDATE `comments` SET `flagged`= 0 WHERE `id` = ?';
        return $this->createQuery($sql, [$id]);
    }

    public function getAllComments()
    {
        $sql = 'SELECT * FROM `comments` WHERE 1 ORDER BY post_id';
        $result = $this->createQuery($sql);
        $commentObjects = [];
        while ($data = $result->fetch()) {
            $commentObject = $this->buildObject($data);
            array_push($commentObjects, $commentObject);
        }
        return $commentObjects;
    }
}
