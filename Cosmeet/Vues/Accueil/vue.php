<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
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
    </div>
    <button class="Afficher_plus" id="Afficher_plus" onclick="AfficherPosts()">Afficher plus</button>

    
</body>

</html>
<script src="./JavaScript/Ajax.js"></script>
<script src="./JavaScript/Modal.js"></script>
<style>
    @import url("./CSS/Accueil.css");
</style>