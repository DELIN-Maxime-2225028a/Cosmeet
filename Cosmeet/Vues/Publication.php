<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="publication">
        <h2><?php echo $publication['titre']; ?></h2>
        <p><?php echo $publication['message']; ?></p>
        <p>Publié le <?php echo $publication['date_publication']; ?> par <a class="text-style" href="index.php?url=Compte&pseudo=<?php echo $publication['auteur']; ?>"><?php echo $publication['auteur']; ?></a></p>
        
        <?php if ($_SESSION['utilisateur']['pseudo'] == $publication['auteur']) : ?>
            <button onclick="window.location.href='index.php?url=Publication/modifier&id_publication=<?php echo $publication['id_publication']; ?>'">Modifier</button>
        <?php endif; ?>

        <button id="add-comment-button" onclick="window.location.href='../Cosmeet/index.php?url=Commentaire&id_publication=<?php echo $publication['id_publication']; ?>'">Ajouter un commentaire</button>
        <button class="toggle-comments-button">Commentaires</button>
        <div class="commentaires" style="display: none;">
            <?php foreach ($commentaires as $commentaire) : ?>
                <?php if ($commentaire['id_publication'] == $publication['id_publication']) : ?>
                    <p><?php echo $commentaire['commentaire']; ?> | <a class="text-style" href="index.php?url=Compte/&pseudo=<?php echo $commentaire['auteur']; ?>"><?php echo $commentaire['auteur']; ?></a> | <?php echo $commentaire['date_commentaire']; ?></p>

                    <?php if ($_SESSION['utilisateur']['pseudo'] == $commentaire['auteur']) : ?>
                        <button onclick="window.location.href='index.php?url=Commentaire/modifier&id_commentaire=<?php echo $commentaire['id_commentaire']; ?>'">Modifier</button>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
<style>
    @import url("./CSS/Accueil.css");
</style>