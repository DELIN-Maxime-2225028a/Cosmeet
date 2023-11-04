<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
<div class="categorie">
    <h3><a href="index.php?url=TrierParCategorie&categorie=<?= urlencode($categorie['nom_categorie']) ?>"><?php echo $categorie['nom_categorie']; ?></a></h3>
    <p><?php echo $categorie['description_categorie']; ?></p>
</div>
</body>

</html>
<style>
    @import url("./CSS/Accueil.css");
</style>