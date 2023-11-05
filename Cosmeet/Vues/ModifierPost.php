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
            <form method="POST" action="./index.php?url=ModifierPost/modifierPost" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Accueil">RETOUR</a></h3>
                </div>
                
                <h1>Modifier Publication</h1>
                <input type="text" name="titre" placeholder="TITRE" required value="<?php echo $publication['titre']; ?>"></br>
                <textarea name="message" placeholder="MESSAGE" required><?php echo $publication['message']; ?></textarea></br>

                <select id="categorie" name="categorie">
                    <option value="" <?php if ($publication['categorie'] == NULL) echo 'selected'; ?>>Aucune</option>
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie['nom_categorie'] ?>" <?php if ($categorie['nom_categorie'] == $publication['categorie']) echo 'selected'; ?>><?= $categorie['nom_categorie'] ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="hidden" name="id_publication" value="<?= $publication['id_publication'] ?>">
                <button type="submit">Modifier</button>
            </form>

            <form method="POST" action="./index.php?url=ModifierPost/suprimerPost" enctype="multipart/form-data">
                <input type="hidden" name="id_publication" value="<?= $publication['id_publication'] ?>">
                <button type="submit">Supprimer</button>
            </form>

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