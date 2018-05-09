<?php

namespace App\Entity;

/**
 * Class Article
 * 
 * Les attribus de la class sont private pour que la class ne puisse pas perdre sont identité. 
 * Ils sont utilisables grâce aux getters
 */

class Article
{
    /**
     * @var int primary key autoincrémentée
    */
    private $id;

    /**
     * @var string article's title
     */
    private $title;

    /**
     * @var string article's tintroduction
     */
    private $introduction;

    /**
     * @var string article's content
     */
    private $content;

    /**
     * @var int article's titlecreation date
     */
    private $createdAt;

    /**
     * @var int article's update date
     */
    private $updateAt;

    /**
     * @param string $data use function hydrate
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param string $data hydrate attributs with data
     */
    public function hydrate($data)
    {
    
        /**
         * if $data is an array. The value of each column is retrieved 
         */
        if(is_array($data))
        {
            if (isset($data['id']))
            {   
                /**
                 * hydration id
                 * I call my function with this. 
                 */
                $this->setId($data['id']);
            }
             
            if (isset($data['title']))
            {
                /**
                 * hydration title
                 */
                $this->setTitle($data['title']);
            }
            
            if (isset($data['content']))
            {
                /**
                 * hydration content
                 */
                $this->setContent($data['content']);
            }

            if (isset($data['introduction']))
            {
                 /**
                 * hydration introduction
                 */
                $this->setIntroduction($data['introduction']);
            }

            if (isset($data['createAt']))
            {
                 /**
                 * hydration createAt
                 */
                $this->setcreateAt($data['createAt']);
            }

            if (isset($data['updateAt']))
            {
                 /**
                 * hydration UpdateAt
                 */
                $this->setUpdateAt(['updateAt']);
            }
        }  
    }

    /**
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

     /**
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

     /**
     * @return string introduction
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * @param string $introduction
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

    /**
     * @return string content
     */
    public function getcontent()
    {
        return $this->createdAt;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int createAt
     */
    public function getcreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param int $createAt
     */
    public function setcreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

     /**
     * @return int updateAt
     */
    public function getupdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param int $undateAt
     */
    public function setupdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }
}
