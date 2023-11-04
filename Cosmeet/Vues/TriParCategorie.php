<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet - Tri par catégorie</title>
</head>

<body>
    <?php foreach($posts as $post): ?>
        <div class="post">
            <h3><?php echo $post['titre']; ?></h3>
            <p><?php echo $post['contenu']; ?></p>
            <!-- Ajoutez ici d'autres détails de la publication que vous voulez afficher -->
        </div>
    <?php endforeach; ?>
</body>

</html>
<style>
    @import url("./CSS/Accueil.css");
</style>