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
            </div>
        <p>Publié le <?php echo $publication['date_publication']; ?> par <?php echo $publication['auteur']; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
<script src="/Cosmeet/JavaScript/Modal.js"></script>
<style>
    @import url("./CSS/Accueil.css");
</style>