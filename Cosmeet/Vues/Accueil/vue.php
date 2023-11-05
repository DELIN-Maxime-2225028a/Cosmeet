<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="L'accueil de Cosmeet, ou l'on trouve les categories et les publications">
    <meta name="keywords" content="espace, accueil, réseau social, Cosmeet">
</head>

<body>
    <div id="tout" class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">

            <!-- Bouton pour fermer la modal -->
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1 id="modalTitle">Publication</h1>

            <!-- Formulaire pour ajouter une publication -->
            <form method="POST" action="./index.php?url=Publication/addPublication" enctype="multipart/form-data">
                <input type="text" name="titre" placeholder="TITRE" required>
                <textarea name="message" placeholder="MESSAGE" required></textarea>

                <!-- Sélection de la catégorie de la publication -->
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

    <!-- Conteneur pour les catégories -->
    <div id="categories"></div>
    
    <div class=categorie>
        <?php if ($_SESSION['utilisateur']['user_type'] == "admin") : ?>
            <form method="POST" action="./index.php?url=Accueil/ajouterCategorie" enctype="multipart/form-data">
                <input type="text" name="nom_categorie">
                <textarea name="description_categorie"></textarea>
                <button id="bouton_utile">Ajouter/Modifier</button>
            </form>
        <?php endif; ?>
    </div>

    <button id="Afficher_plus_categories" class="Afficher_plus">Afficher plus</button>
    <button id="Afficher_moins_categories" class="Afficher_moins" style="display: none;">Afficher moins</button>

    <button id="bouton_utile" class="modal-btn modal-trigger">Ajouter une publication</button>

    <!-- Conteneur pour les publications -->
    <div id="publications"></div>
    <button id="Afficher_plus_publications" class="Afficher_plus">Afficher plus</button>
    <button id="Afficher_moins_publications" class="Afficher_moins" style="display: none;">Afficher moins</button>

</body>

</html>

<script src="./JavaScript/Ajax.js"></script>
<script src="./JavaScript/Modal.js"></script>

<style>
    @import url("./CSS/Modals.css");
    @import url("./CSS/Accueil.css");
</style>