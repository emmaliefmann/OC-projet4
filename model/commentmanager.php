<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');
require_once('model/comment.php');

class CommentManager extends Manager
{
    private function buildObject($comment) {
        $CommentObject = new \EmmaLiefmann\blog\model\Comment();
        $CommentObject->setId($comment['id']);
        $CommentObject->setPostId($comment['post_id']);
        $CommentObject->setComment($comment['comment']);
        $CommentObject->setCommentDate($comment['comment_date_fr']);
        $CommentObject->setFlagged($comment['flagged']);
        return $CommentObject;
    }   
    public function getComments($postId)
    {
        $sql ='SELECT id, flagged, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date';
        return $this->createQuery($sql, [$postId]);
    }

    public function addComments($postId, $author, $comment)
    {
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW() )';
        //return $this->createQuery($sql, array($postId, $author, $comment));
        return false;
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE `comments` SET `flagged`= 1 WHERE `id`= ?';
        return $this->createQuery($sql, array($commentId));
    }
    
    public function getFlaggedComments()
    {
        $sql = 'SELECT * FROM `comments` WHERE `flagged`=1';
    }

    public function getAllComments()
    {
        $sql = 'SELECT `id`, `post_id`, `author`, `comment`, `comment_date`, `flagged` FROM `comments` WHERE `id`= 3';
    }
}