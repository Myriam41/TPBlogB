<?php

namespace App\Entity;

class Article
{
/*Les attribus de la class sont private 
pour que la class ne puisse pas perdre sont identité. 
Ils sont utilisables car aux fonctionis get.*/
    private $id;
    
    private $title;

    private $introduction;

    private $content;

    private $createdAt;

    private $updateAt;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
// On test si data est un tableau
        if(is_array($data))
        {
            if (isset($data['id']))
 // j'appelle ma fonction grâce à this. la valeur de chaque colonne est récupérée
            {
                $this->setId($data['id']);
            }

            if (isset($data['title']))
            {
                $this->setTitle($data['title']);
            }
            
            if (isset($data['content']))
            {
                $this->setContent($data['content']);
            }

            if (isset($data['introduction']))
            {
                $this->setIntroduction($data['introduction']);
            }

            if (isset($data['createAt']))
            {
                $this->setcreateAt($data['createAt']);
            }

            if (isset($data['update']))
            {
                $this->setUpdate(['update']);
            }
        }  
    }

//functions pour id
    public function getId()
    {
        return $this->id;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

//functions pour title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

//functions pour introduction
    public function getIntroduction()
    {
        return $this->introduction;
    }

    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

//functions pour content
    public function getcontent()
    {
        return $this->createdAt;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
//functions pour updateAt
    public function getupdateAt()
    {
        return $this->updateAt;
    }

    public function setupdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }
}