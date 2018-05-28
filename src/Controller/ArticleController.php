<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\Commentrepository;

/**
 * Class Articlecontroller
 */

class ArticleController
{
    /**
     * La function crée des occuraeces pour obtenir la liste des 10 derniers articles
     *
     * @var $articles
     */
    public function listArticles()
    {
        //intensiation de la class ArticleRepository $articleRepository devient un objet
        $articleRepository = new ArticleRepository();
        // j'appelle la fonction voulu de l'objet
        $articles = $articleRepository->getByLimit();
        require '../src/View/article_list.php';
    }
    
    /**
     * La function crée des occurences pour obtenir un article avec ses commentaires
     *
     * @var $article and contents
     */
    public function article()
    {
        $articleId = $_GET['id'];
        $articleRepository = new ArticleRepository();

        if (!empty($articlesId)) {
            $article = $articleRepository->getOneById($articleId);
        }

        $commentRepository = new CommentRepository();
        if (!empty($articleId)) {
            $commentRepository->getByArticleId($articleId);
        }
        require '../src/View/articleView.php';
    }
}
