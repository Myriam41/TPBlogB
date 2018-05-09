<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

/**
 * Class Articlecontroller
 */

class ArticleController
{
    // ce sont des actions de controller
    public function listArticles()
    {
    //intensiation de la class ArticleRepository $articleRepository devient un objet
        $articleRepository = new ArticleRepository();
    // j'appelle la fonction voulu de l'objet
        $articles = $articleRepository->getByLimit();

        require('../src/View/article_list.php');
    }
    
    public function article()
    {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getArticle($_GET['id']);

        $commentRepository = new CommentRepository();
        $comments = $commentRepository->getComments($_GET['id']);
    
        require('../src/View/articleView.php');
    }
}
