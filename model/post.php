<?php 

namespace EmmaLiefmann\blog\model;

class Post 
{
    //attributes, set in buildobject() function postmanager.php 
    private $id;
    private $title; 
    private $content;
    private $creationDate;

    public function getId() 
    {
        return $this->id;
    }
    public function getTitle() 
    {
        return $this->title;
    }
    public function getContent() 
    {
        return $this->content;
    }
    public function getCreationDate() 
    {
        return $this->creationDate;
    }

    public function setId() 
    {
        $this->id = $id;
    }
    public function setTitle() 
    {
        $this->title = $title;
    }
    public function setContent() 
    {
        $this->content = $content;
    }
    public function setCreationDate() 
    {
        $this->creationDate = $creationDate;
    }
}
