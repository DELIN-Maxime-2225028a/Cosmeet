<?php require_once '../Cosmeet/Controleurs/ControleurPublication.php'; ?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="publication">

        <h2><?php echo $publication['titre']; ?></h2>
        <p><?php echo $publication['message']; ?></p>

        <?php
        $email = $publication['auteur'];
        $controleur = new ControleurPublication();
        $pseudoPost = $controleur->getPseudo($email);
        ?>

        <p> Publié le <?php echo $publication['date_publication']; ?> par
            <a class="text-lien" href="index.php?url=Compte&email=<?php echo $publication['auteur']; ?>"><?php echo $pseudoPost; ?></a>
        </p>
        </p>

        <?php if ($_SESSION['utilisateur']['email'] == $publication['auteur']) : ?>
            <button onclick="window.location.href='../Cosmeet/index.php?url=ModifierPost&id_publication=<?php echo $publication['id_publication']; ?>'">Modifier/Suprimer</button>
        <?php endif; ?>

        <button id="add-comment-button" onclick="window.location.href='../Cosmeet/index.php?url=Commentaire&id_publication=<?php echo $publication['id_publication']; ?>'">Ajouter un commentaire</button>
        <button class="toggle-comments-button">Commentaires</button>

        <div class="commentaires" style="display: none;">

            <?php foreach ($commentaires as $commentaire) : ?>

                <?php
                $email = $commentaire['auteur'];
                $controleur = new ControleurPublication();
                $pseudoCommentaire = $controleur->getPseudo($email);
                ?>

                <?php if ($commentaire['id_publication'] == $publication['id_publication']) : ?>
                    <p><?php echo $commentaire['commentaire']; ?> |
                    <a class="text-lien" href="index.php?url=Compte&email=<?php echo $commentaire['auteur']; ?>"><?php echo $pseudoCommentaire; ?></a> |
                    <?php echo $commentaire['date_commentaire']; ?>
                        <?php if ($_SESSION['utilisateur']['email'] == $commentaire['auteur']) : ?>
                            <button onclick="window.location.href='index.php?url=ModifierCom&id_commentaire=<?php echo $commentaire['id_commentaire']; ?>'">Modifier</button>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>

            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/MenuCoulissant.css");
    @import url("./CSS/Publication.css");
</style>