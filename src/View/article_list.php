<?php
    /* définition du titre de la page qui sera 
    insérée dans le template en fin de script*/

    $title = 'Les articles de Mimi';

    /* la fonction ob_start mémorise la sortie HTML 
    qui sera récupérée à la fin du script par la fonction ob_get_clean */

    ob_start();?>
        <h1> Les 10 derniers articles </h1>

    <?php // affichage de la liste des articles
    
    foreach ($articles as $article)
    {
    ?>
        <div class="news">
            <h3>
                <? htmlspecialchars($article->getTitle()) ;?>
            </h3>
            <br/>
            <p>
                <?//on affiche le contenu de l'article
                htmlspecialchars($article->getContent());?>
            <br/>
                <em><a href="articleView.php"=<? $data['id']; ?>">Commentaires</a></em>
            </p>
        </div>
    <?php
    }

    $content = ob_get_clean();

    require('templates/default.php');
