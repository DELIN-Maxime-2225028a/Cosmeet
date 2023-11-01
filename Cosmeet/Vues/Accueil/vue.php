<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <button id="add-publication-button" onclick="window.location.href='../Cosmeet/index.php?url=ajout_publication'">Ajouter une publication</button>
    <div id="publications">
        <?php 
        foreach ($publications as $publication): ?>
            <div class="publication">
                <h2><?php echo $publication['titre']; ?></h2>
                <p><?php echo $publication['message']; ?></p>
            </div>
        <p>Publié le <?php echo $publication['date']; ?> par <?php echo $publication['auteur']; ?></p>
        <?php endforeach; ?>
    </div>
</body>

</html>

<style>
    @import url("/Cosmeet/CSS/Accueil.css");
</style>