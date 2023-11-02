<?php
$condition = "";
if (isset($A_vue['reussite'])) {
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])) {
    $condition = $A_vue['erreur'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div id="formulaire">
        <form method="POST" action="../Cosmeet/index.php?url=Ajout_commentaire/addCommentaire" enctype="multipart/form-data">
            <div id="Onglets">
                <h3><a id="Retour" href="../Cosmeet/index.php?url=Accueil">RETOUR</a></h3>
            </div>
            <textarea name="commentaire" placeholder="COMMENTAIRE" required></textarea>
            <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
            <input type="hidden" name="id_publication" value="<?php echo $_GET['id_publication']; ?>">

            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>
        </form>
    </div>
</body>

</html>