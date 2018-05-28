<?php
namespace App\View;

// définition du titre de la page qui sera inséré dans le template en fin de script
$title = 'Un article de Mimi';

// la fonction ob_start mémorise la sortie HTML
//qui sera récupérée à la fin du script par la fonction ob_get_clean
ob_start();
?>

    <h1> Un super article </h1>
    <p> Vous donnerez votre avis plus tard ! </p>

<?php
// insérer le formulaire pour l'envois des contentaires à faire plus tard
try{
    echo $req;
}
catch (Exception $e){
    echo 'exception reçue : ', $e->getMessage(); 
}
// affichage d'un article
foreach($onearticle as $article)
{
    ?>

    <div class="news">
        <h3>
            <?= htmlspecialchars($article->getTitle()) ;?>
            <em>le <?= $article->getCretaedAt() ; ?></em>
            
        </h3>

        <p>
        <?php
            //on affiche le contenu de l'article
            echo nl12br(htmlspecialchars($article->getContent())) ; ?>
        <br/>
    
        </p>
    </div>
    <?php
}
foreach($comments as $comment)
{
    echo nl12br(htmlspecialchars($comment->getMessage()));
}

$content = ob_get_clean();

require 'templates/default.php';
