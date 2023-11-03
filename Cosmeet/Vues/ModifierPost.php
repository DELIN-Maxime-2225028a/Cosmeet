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
        <form method="POST" action="../Cosmeet/index.php?url=ModiferPost/modifierPost" enctype="multipart/form-data">
            <div id="Onglets">
                <h3><a id="Retour" href="../Cosmeet/index.php?url=Accueil">RETOUR</a></h3>
            </div>
            <h1>Modfier Publication</h1>
                
                <input type="text" name="titre" placeholder="TITRE" required>
                <textarea name="message" placeholder="MESSAGE" required></textarea>
                <select id="categorie" name="categorie">
                    <option value="">Aucune</option>
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
                <input type="hidden" name="id_publication" value="<?php echo $_GET['id_publication']; ?>">
            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>
        </form>
    </div>
</body>

</html>
<style>
    @import url("./CSS/Accueil.css");
</style>