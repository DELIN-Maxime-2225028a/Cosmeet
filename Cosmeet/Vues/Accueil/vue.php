<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
<div class="modal-container">
      <div class="overlay modal-trigger"></div>
      <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
        <button 
        aria-label="close modal"
        class="close-modal modal-trigger">X</button>
        <h1 id="modalTitle">Publication</h1>
        <form method="POST" action="../Cosmeet/index.php?url=Publication/addPublication" enctype="multipart/form-data">
            <input type="text" name="titre" placeholder="TITRE" required>
            <textarea name="message" placeholder="MESSAGE" required></textarea>
            <input type="text" name="categorie" placeholder="CATEGORIE" required>
            <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
        </form>
      </div>
    </div>
    <button class="modal-btn modal-trigger">Ajouter une publication</button>
    </div>

    <div id="publications">
        <?php
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $affichees = array_slice($publications, $start, 3);
        foreach ($affichees as $publication): ?>
            <div class="publication">
                <h2><?php echo $publication['titre']; ?></h2>
                <p><?php echo $publication['message']; ?></p>
                <p>Publié le <?php echo $publication['date_publication']; ?> par <a href='../Cosmeet/index.php?url=Compte&auteur=<?php echo $publication['auteur']; ?>'class="text-style"><?php echo $publication['auteur']; ?> </a> </p>
                <button id="add-comment-button" onclick="window.location.href='../Cosmeet/index.php?url=Commentaire&id_publication=<?php echo $publication['id_publication']; ?>'">Ajouter un commentaire</button>
                <button class="toggle-comments-button">Commentaires</button>
                <div class="commentaires" style="display: none;">

                <?php foreach ($commentaires as $commentaire): ?>
                    <?php if ($commentaire['id_publication'] == $publication['id_publication']): ?>
                        <p><?php echo $commentaire['commentaire']; ?>  |<a href='../Cosmeet/index.php?url=Compte&auteur=<?php echo $commentaire['auteur']; ?>'class="text-style"><?php echo $commentaire['auteur']; ?> </a> | <?php echo $commentaire['date_commentaire']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="commentaires" style="display: none;">       
            
                <?php if ($_SESSION['auteur'] == $publication['auteur']): ?>
                    <button class="">Modifier</button>
                <?php endif; ?> 
                </div>
        </div>
    </div>
<?php endforeach; ?>
<button id="Afficher plus" onclick="AfficherPosts()">Afficher plus</button>
</div>
</body>
</html>
<script src="./JavaScript/Ajax.js"></script>
<script src="./JavaScript/Modal.js"></script>
<style>
    @import url("./CSS/Accueil.css");
</style>