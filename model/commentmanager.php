<?php

namespace EmmaLiefmann\blog\model;
require_once('model/manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
        $comments->execute(array($postId));

            return $comments;
    }

    public function addComments($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW() )');
        $affectedLines = $newComment->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    
}