<?php

namespace App\Repository;
use PDO;
require_once ('../src/Model/Repository.php');

use App\Model\Repository;

class ArticleRepository extends Repository
{
    public function getArticles()
    {
        // récupération des 10 derniers posts avec préparation de la requête pourquoi déjà ?
        $req = $this->getPDO()->query('SELECT title FROM post');
        var_dump ($req);
        $articles = [];
// les donnée sont transmisent sous forme d'objet
        while ($article = $req->fetchAll(PDO::FETCH_OBJ))
        {
            $articles[] = new Article($article);
        }
    
        return $articles;

        $articles->closeCursor();
    }
    
    public function getArticle($articleID)
    {
        // recherche de l'article demandé
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'d/m/Y à H/i/s\' AS date_creation_fr FROM post WHERE id = ?');
        $req->execute(array($articleID));
        $article = [];

        while ($article = $req->fetch())
        {
            $article[] = new Article($article);
        }
    
        return $article;

        $article->closeCursor();
    }

    public function allArticles()
    {

    }
}