<?php 

namespace EmmaLiefmann\blog\model;

class Comment 
{
    private $id; 
    private $postId;
    private $author;
    private $comment;
    private $commentDate;
    private $flagged;

    public function getId()
    {
        return $this->$id;
    }
    public function getPostId()
    {
        return $this->$postId;
    }
    public function getAuthor()
    {
        return $this->$author;
    }
    public function getComment()
    {
        return $this->$id;
    }
    public function getCommentDate()
    {
        return $this->$id;
    }
    public function getFlagged()
    {
        return $this->$id;
    }

    public function setId($id)
    {
        $id = $this->$id; 
    }
    public function setPostId($postId)
    {
        $postId = $this->$postId;
    }
    public function setComment($comment)
    {
        $comment = $this->$comment;
    }
    public function setCommentDate($commentDate)
    {
        $commentDate = $this->$commentDate;
    }
    public function setFlagged($flagged)
    {
        $flagged = $this->$flagged;
    }
}