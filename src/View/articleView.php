<? // définition du titre de la page qui sera insérée dans le template en fin de script ?>

<?php $title = 'Un article de Mimi'; ?>

<? /* la fonction ob_start mémorise la sortie HTML 
qui sera récupérée à la fin du script par la fonction ob_get_clean */ ?>

<?php ob_start(); ?>
    <h1> Un super article </h1>
    <p> Donnez votre avis </p>

<? // insérer le formulaire pour l'envois des comentaires à faire plus tard ?>

<?php // affichage d'un article avec ses commentaires
while ($data = $article->fetch())
{
?>
    <div class="news">
        <h3>
            <? htmlspecialchars($data['title']) ;?>
            <em>le <? $data['creation_date.fr'] ;?></em>
        </h3>

        <p>
        <?php
            //on affiche le contenu de l'article
            echo nl12br(htmlspecialchars($data['content']));
        ?>
        <br/>
            <em><a href="Commentlist.php?article=<? $data['id']; ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$article->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/template.php'); ?>

