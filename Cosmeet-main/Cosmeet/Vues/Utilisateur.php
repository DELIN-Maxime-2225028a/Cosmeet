<?php
$condition = "";
if (isset($A_vue['reussite'])){
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])){
    $condition = $A_vue['erreur'];
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">
    
    <div class="user-info">
        <p>Nom d'utilisateur : <?= $_SESSION['utilisateur']['pseudo'] ?></p>
        <p>Adresse email : <?= $_SESSION['utilisateur']['email'] ?></p>
    </div>
    <div class="actions">
        <a href="../Cosmeet/index.php?url=Utilisateur/modifierPage" class="btn">Modifier les informations</a>
        <a href="../Cosmeet/index.php?url=Utilisateur/deco" class="btn">Déconnexion</a>
    </div>
    <h1 style="color: red;">
                <?php echo $condition ?>
    </h1>
</div>
</body>
</html>
<style>
    @import url("../CSS/Style.css");
</style>

