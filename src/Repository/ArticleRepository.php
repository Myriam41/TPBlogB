<?php

namespace App\Repository;

use App\Model\Repository;
use App\Entity\Article;
use \PDO;

/**
 * Class ArticleRepository extend Repository
 * functions to retreive data from articles
 */

class ArticleRepository extends Repository
{
    /**
     * @function retreive the last 10 articles
     * @return $articles qui est un tableau
     */
    public function getByLimit()
    {
        try {
            $db = $this->getDb();
         }
        catch(PDOException $e)
            {
                die('Echec lors de la connexion : '.$e->getMessage());
            }
        
        
            $req = $db->prepare('SELECT * FROM post ORDER BY createdAt LIMIT 0, 10');
            $req->execute();
            $articles = [];

            // les donnée sont transmisent sous forme d'objet
            while ($dataRaw = $req->fetch()) {
                $articles[] = new Article($dataRaw);
            }
       
        $req->closeCursor();
        return $articles;
        print($articles);
    }
    
    /**
     * La fonction renvoie un seul article suivant id demandé
     * @param int $articleId retreive one article
     * @return $onearticle
     */
    public function getOneById($articleId)
    {
        $db = $this->getDb();

        $articleId = $_GET['id'];

        // recherche de l'article demandé
        $reqSelect = 'SELECT id, title,introduction, content, DATE_FORMAT(createdAt, \'d/m/Y à H/i/s\') AS date_creation_fr, DATE_FORMAT(updateAt, \'d/m/Y à H/i/s\') AS date_update_fr ';
        $reqFrom = 'FROM post';
        $reqWhere = ' WHERE id = :articleId';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->bindParam('articleId', $articleId, \PDO::PARAM_INT);
        $req->execute();
        
        $onearticle = [];
        
        // les donnée sont transmisent sous forme d\'objet
        while ($data = $req->fetch()) {
            $onearticle[] = new Article($data);
        }
   
        $req->closeCursor();
        return $onearticle;
        print($onearticle);

    }

    /**
     * Function pour obtenir tous les articles
     */
    public function allArticles()
    {
    }
}
