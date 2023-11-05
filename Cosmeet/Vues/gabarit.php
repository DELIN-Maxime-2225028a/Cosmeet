<!doctype html>
<html style="font-size: 16px;" lang="fr">
<!-- Lien vers l'icône du site -->
<link rel="icon" href="./Images/favicon.ico" type="image/x-icon">

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