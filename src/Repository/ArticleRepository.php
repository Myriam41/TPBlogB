<?php

namespace App\Repository;

use App\Model\Repository;
use App\Entity\Article;

/**
 * Class ArticleRepository extend Repository
 * functions to retreive data from articles
 */

class ArticleRepository extends Repository
{
    /**
     * retreive the last 10 articles
     * @return $articles
     */
    public function getByLimit()
    {
        $req = $this->getDb()->query('SELECT * FROM post ORDER BY createdAt LIMIT 0, 10');
        $articles = [];

        // les donnée sont transmisent sous forme d'objet
        while ($dataRaw = $req->fetch())
        {
            $articles[] = new Article($dataRaw);
        }
        
        $req->closeCursor();
        return $articles;
    }
    
    /**
     * @param int $articleId retreive one article
     * @return 
     */
    public function getOneById($articleId)
    {
        // recherche de l'article demandé
        $req = $this->getDb()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'d/m/Y à H/i/s\' AS date_creation_fr FROM post WHERE id = ?');
        $req->execute(array($articleID));
        $data = $req->fetch();


        return new Article($data);
     
    }

     /**
     * @param int retreive all articles
     */
    public function allArticles()
    {

    }
}
