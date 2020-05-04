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
    //change function 
    public function addComments($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW() )');
        $affectedLines = $newComment->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function flagComment($commentId)
    {
        $db = $this->dbConnect();
    
        $flag = $db->prepare('UPDATE `comments` SET `flagged`= 1 WHERE `id`= ?');
        $flaggedComment = $flag->execute(array($commentId));
    }
    
    public function getFlaggedComments()
    {
        $sql = 'SELECT * FROM `comments` WHERE `flagged`=1';
    }
}