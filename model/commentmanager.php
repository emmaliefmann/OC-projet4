<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');


class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $sql ='SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date';
        return $this->createQuery($sql, [$postId]);
    }

    public function addComments($postId, $author, $comment)
    {
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW() )';
        return $this->createQuery($sql, array($postId, $author, $comment));
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
}