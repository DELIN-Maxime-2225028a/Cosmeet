<!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cosmeet</title>
</head>

<body>
    <button id="sidebarButton">Menu</button>
    <?php Vue::montrer('standard/haut'); ?>
    <?php echo $A_vue['body'] ?>
    <?php Vue::montrer('standard/pied'); ?>
</body>

</html>
<script src="./JavaScript/MenuCoulissant.js"></script>
<style>
</style>