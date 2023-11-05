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
    <div class="ModifierCom">
        <div id="formulaire">

            <form method="POST" action="./index.php?url=ModifierCom/modifierCom" enctype="multipart/form-data">
                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Accueil">RETOUR</a></h3>
                </div>
                <h1>Modifier Commentaire</h1>
                <textarea name="commentaire" placeholder="COMMENTAIRE" required><?php echo $commentaire['commentaire']; ?></textarea></br>
                <input type="hidden" name="id_commentaire" value="<?= $commentaire['id_commentaire'] ?>"></br>
                <button type="submit">Modifier</button>
            </form>

            <form method="POST" action="./index.php?url=ModifierCom/suprimerCom" enctype="multipart/form-data">
                <input type="hidden" name="id_commentaire" value="<?= $commentaire['id_commentaire'] ?>">
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
    @import url("./CSS/ModifierCom.css");
    @import url("./CSS/MenuCoulissant.css");
</style>