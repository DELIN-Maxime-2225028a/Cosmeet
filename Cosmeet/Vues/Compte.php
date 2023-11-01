<?php
$condition = "";
if (isset($A_vue['reussite'])) {
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])) {
    $condition = $A_vue['erreur'];
}
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="user-info">
        <p>Nom d'utilisateur : <?= $_SESSION['utilisateur']['pseudo'] ?></p>
        <p>Adresse email : <?= $_SESSION['utilisateur']['email'] ?></p>
        <p>Date inscription : <?= $_SESSION['utilisateur']['date_inscription'] ?></p>
        <p>Dernier connection : <?= $_SESSION['utilisateur']['date_derniere_connexion'] ?></p>
    </div>
</body>

</html>
<style>
    @import url("./CSS/Utilisateur.css");
</style>