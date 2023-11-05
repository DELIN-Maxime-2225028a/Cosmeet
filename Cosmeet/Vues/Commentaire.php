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
    <div class="Commentaire">
        <div id="formulaire">

            <form method="POST" action="./index.php?url=Commentaire/addCommentaire" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Accueil">RETOUR</a></h3>
                </div>

                <textarea name="commentaire" placeholder="COMMENTAIRE" required></textarea>
                <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
                <input type="hidden" name="id_publication" value="<?php echo $_GET['id_publication']; ?>">

                <h1 style="color: red;">
                    <?php echo $condition ?>
                </h1>

            </form>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/Commentaire.css");
    @import url("./CSS/MenuCoulissant.css");
</style>