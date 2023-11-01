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
        <form method="POST" action="../Cosmeet/index.php?url=Ajout_publication/addPublication" enctype="multipart/form-data">
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
        foreach ($publications as $publication): ?>
            <div class="publication">
                <h2><?php echo $publication['titre']; ?></h2>
                <p><?php echo $publication['message']; ?></p>
                <p>Publié le <?php echo $publication['date_publication']; ?> par <?php echo $publication['auteur']; ?></p>
                
                <button id="add-comment-button" onclick="window.location.href='../Cosmeet/index.php?url=Ajout_commentaire&id_publication=<?php echo $publication['id_publication']; ?>'">Ajouter un commentaire</button>                
                
                <button class="toggle-comments-button">Commentaires</button>
                <div class="commentaires" style="display: none;">
                <?php foreach ($commentaires as $commentaire): ?>
                    <?php if ($commentaire['id_publication'] == $publication['id_publication']): ?>
                        <p><?php echo $commentaire['commentaire']; ?> | <?php echo $commentaire['auteur']; ?> |  <?php echo $commentaire['date_commentaire']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
    </div>
</body>
</html>
<script src="/Cosmeet/JavaScript/Modal.js"></script>
<style>
    @import url("./CSS/Accueil.css");
</style>