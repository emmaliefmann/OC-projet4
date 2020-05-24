<?php

namespace EmmaLiefmann\blog\model;

class CommentManager extends Manager
{
    private function buildObject($comment) {
        $commentObject = new \EmmaLiefmann\blog\model\Comment();
        $commentObject->setId($comment['id']);
        $commentObject->setPostId($comment['post_id']);
        $commentObject->setComment($comment['comment']);
        $commentObject->setAuthor($comment['author']);
        $commentObject->setCommentDate($comment['comment_date_fr']);
        $commentObject->setFlagged($comment['flagged']);
        return $commentObject;
    }   
    public function getComments($postId)
    {
        $sql ='SELECT id, flagged, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date';
        $result = $this->createQuery($sql, [$postId]);
        $commentObjects = [];
        while ($comment = $result->fetch()) {
            $commentObject = $this->buildObject($comment);
            array_push($commentObjects, $commentObject);
        }

        return $commentObjects;
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
    
}