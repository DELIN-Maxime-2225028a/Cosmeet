<?php
$condition = "";
if (isset($A_vue['reussite'])) {
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])) {
    $condition = $A_vue['erreur'];
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="ModifierPost">
        <div id="formulaire">
            <!-- Formulaire de modification de publication -->
            <form method="POST" action="./index.php?url=ModifierPost/modifierPost" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Accueil">RETOUR</a></h3>
                </div>
                
                <h1>Modifier Publication</h1>
                <input type="text" name="titre" placeholder="TITRE" required value="<?php echo $publication['titre']; ?>"></br>
                <textarea name="message" placeholder="MESSAGE" required><?php echo $publication['message']; ?></textarea></br>

                
                <select id="categorie" name="categorie">
                    <!-- Option par défaut "Aucune", qui est sélectionnée si la catégorie de la publication est NULL -->
                    <option value="" <?php if ($publication['categorie'] == NULL) echo 'selected'; ?>>Aucune</option>
                    <?php foreach ($categories as $categorie) : ?>
                        <!-- Pour chaque catégorie, crée une option avec la valeur égale à $categorie['nom_categorie'] -->
                        <!-- Si la catégorie de la publication est égale à la catégorie actuelle, alors cette option est marquée comme sélectionnée -->
                        <option value="<?= $categorie['nom_categorie'] ?>" <?php if ($categorie['nom_categorie'] == $publication['categorie']) echo 'selected'; ?>><?= $categorie['nom_categorie'] ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Champ caché pour récupérer l'id de la publication -->
                <input type="hidden" name="id_publication" value="<?= $publication['id_publication'] ?>">
                <button type="submit">Modifier</button>
            </form>

            <!-- Formulaire de suppression de publication -->
            <form method="POST" action="./index.php?url=ModifierPost/suprimerPost" enctype="multipart/form-data">
                <!-- Champ caché pour récupérer l'id de la publication -->
                <input type="hidden" name="id_publication" value="<?= $publication['id_publication'] ?>">
                <button type="submit">Supprimer</button>
            </form>

            <!-- Affichage de la condition (réussite ou erreur) -->
            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/ModifierPost.css");
    @import url("./CSS/MenuCoulissant.css");
</style>