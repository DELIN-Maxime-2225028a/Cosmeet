<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
    <link rel="icon" href="./Images/favicon.ico" type="image/x-icon">
</head>

<body>
    <input type="text" id="search" placeholder="Recherche...">
    <button id="searchButton">Rechercher</button>

    <div id="tout" class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">

            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1 id="modalTitle">Publication</h1>

            <form method="POST" action="./index.php?url=Publication/addPublication" enctype="multipart/form-data">
                <input type="text" name="titre" placeholder="TITRE" required>
                <textarea name="message" placeholder="MESSAGE" required></textarea>

                <select id="categorie" name="categorie">
                    <option value="">Aucune</option>
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php endforeach; ?>
                </select>

                <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
            </form>

        </div>
    </div>

    </div>

    <div id="categories"></div>
    <button id="Afficher_plus_categories" class="Afficher_plus">Afficher plus</button>
    <button id="Afficher_moins_categories" class="Afficher_moins" style="display: none;">Afficher moins</button>

    <button id="bouton_utile" class="modal-btn modal-trigger">Ajouter une publication</button>

    <div id="publications"></div>
    <button id="Afficher_plus_publications" class="Afficher_plus">Afficher plus</button>
    <button id="Afficher_moins_publications" class="Afficher_moins" style="display: none;">Afficher moins</button>

</body>

</html>

<script src="./JavaScript/Ajax.js"></script>

<style>
    @import url("./CSS/Modals.css");
    @import url("./CSS/Accueil.css");
</style>