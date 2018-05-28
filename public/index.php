<?php

//j'appelle ce qui va permettre autoloading des fichiers de l'application que je vais nommer ensuite
require_once'../vendor/autoload.php';

// charge les fichiers de l'appli
use App\Controller\ArticleController;
use App\View;
use App\Entity\Article;
use App\Controller\CommentController;
use App\Repository\CommentRepository;

//le chemin prit suivant les indications récupérées dans URL
//si le paramètre action existe on test le paramètre sinon on charge la liste des articles.

if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 'listArticle';
}

if ($p === 'listArticle') {
    $articleController = new ArticleController();
    $articleController->ListArticles();
}

if ($p === 'articleView') {
    $contArticle = new ArticleController();
    $contArticle->article();
}
