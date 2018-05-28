<?php
namespace App\Repository;

use App\Model\Repository;
use App\Entity\Comment;

class CommentRepository extends Repository
{
    function getByArticleId($articleID)
    {
        $db = $this->getDb();
        $articleId = $_GET['id'];
    
        // récupération des 10 derniers comments d'un article 
        $reqSelect = 'SELECT id, articleId, author, contmessage, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr';
        $reqFrom = ' FROM comments';
        $reqWhere = ' WHERE articleId = :articleId ORDER BY createdAt LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->bindparam(':articleId', $articleId, \PDO::PARAM_INT);
        $req->execute();
        
        $comments = [];
        while ($comment = $req->fetch())
        {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }
    
    function getComment($commentID)
    {
        $db = $this->getDb();
    
        // recherche de l'article demandé
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%im%ss\') AS date_comment_fr FROM comments');
        $req->execute(array($articleId));
        $comment = [];
        $comment = $req->fetch();
    
        return $comment;
    
    }
}
