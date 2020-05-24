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
        return $this->id;
    }
    public function getPostId()
    {
        return $this->postId;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function getCommentDate()
    {
        return $this->commentDate;
    }
    public function getFlagged()
    {
        return $this->flagged;
    }

    public function setId($id)
    {
       $this->id = $id; 
    }
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setComment($comment)
    {
        $this->comment = $comment; 
    }
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }
    public function setFlagged($flagged)
    {
        $this->flagged = $flagged;
    }
}