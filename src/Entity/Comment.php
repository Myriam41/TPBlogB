<?php

namespace App\Entity;

class Comment
{
    private $id;
    private $articleId;
    private $title;
    private $message;
    private $author;
    private $createdAt;
    private $updateAt;

    public function setId($Id)
    {
        $this->id = $Id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setTitle($title) 
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setArticleId($articleId)
    {
        $this->articleId =$articleId;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }
    
    public function setMessage()
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setUpdateAt()
    {
        $this->updateAt();
    }

    public function getUpdateAt()
    {
        return $this->updatedAt;
    }

   /**
     * @param string $data use function hydrate
     */
    public function __construct($data)
    {
        if(isset($data))
        {
           $this->hydrate($data); 
        }
        
    }

    /**
     * @param string $data hydrate attributs with data
     */
    public function hydrate($data)
    {
        if (is_array($data)) 
        {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
             
            if (isset($data['title'])) {
                $this->setTitle($data['title']);
            }
            
            if (isset($data['message'])) {
                $this->setcontent($data['message']);
            }

            if (isset($data['author'])) {
                $this->setAuthor($data['author']);
            }
            if (isset($data['articleId'])) {
                $this->setarticleId($data['articleId']);
            }

            if (isset($data['createAt'])) {
                $this->setcreateAt($data['createAt']);
            }

            if (isset($data['updateAt'])) {
                $this->setUpdateAt(['updateAt']);
            }
        }
    }
}
