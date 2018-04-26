<?php
namespace App\Model;
function getComments($articleID)
{
    //connexion à la base de données
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', '');

    }
    catch(Exception $e)
    {
        die('Error : '.$e->getMessage());
    }

    // récupération des 10 derniers comments d'un article 
    $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\' AS date_comment_fr FROM comments  WHERE post_id = ? ORDER BY comment_date LIMIT 0, 10');
    $req->execute(array());
    $articles = $req->fetch();

    return $comments;
}

function getComment($commentID)
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', '');

    }
    catch(Exception $e)
    {
        die('Error : '.$e->getMessage());
    }

    // recherche de l'article demandé
    $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%im%ss\' AS date_comment_fr FROM comments');
    $req->execute(array($articleID));
    $comment = $req->fetch();

    return comment;

}