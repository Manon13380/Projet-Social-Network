<?php
class Post extends PostRepository
{
    private $id;
    private $title;
    private $message;
    private $author;

    public function __construct($id, $title, $message, $author)
    {
        $this->id = ($id);
        $this->setTitle($title);
        $this->setMessage($message);
        $this->setAuthor($author);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        if (preg_match("/^[A-Za-z][^<>]{1,50}$/", $title) ) {
            return $this->title = htmlspecialchars($title);
        } else {
            throw new Exception ('Veuillez rentrer un titre valide',1);
            
        }

    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        if (preg_match("/^[A-Za-z][^<>]{1,300}$/", $message)) {
           return $this->message = htmlspecialchars($message);
        } else {
            throw new Exception ('Veuillez rentrer un message valide',2); 
        }
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = htmlspecialchars($author);
    }
}
?>