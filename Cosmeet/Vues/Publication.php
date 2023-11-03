<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
<div class="publication">
    <h2><?php echo $publication['titre']; ?></h2>
    <p><?php echo $publication['message']; ?></p>
    <p>Publié le <?php echo $publication['date_publication']; ?> par <a href='../Cosmeet/index.php?url=Compte&auteur=<?php echo $publication['auteur']; ?>' class="text-style"><?php echo $publication['auteur']; ?> </a> </p>
    <button id="add-comment-button" onclick="window.location.href='../Cosmeet/index.php?url=Commentaire&id_publication=<?php echo $publication['id_publication']; ?>'">Ajouter un commentaire</button>
    <button class="toggle-comments-button">Commentaires</button>
    <div class="commentaires" style="display: none;">
        <?php foreach ($commentaires as $commentaire) : ?>
            <?php if ($commentaire['id_publication'] == $publication['id_publication']) : ?>
                <p><?php echo $commentaire['commentaire']; ?> |<a href='../Cosmeet/index.php?url=Compte&auteur=<?php echo $commentaire['auteur']; ?>' class="text-style"><?php echo $commentaire['auteur']; ?> </a> | <?php echo $commentaire['date_commentaire']; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
