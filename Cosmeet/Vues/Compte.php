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
        <p>Nom d'utilisateur : <?php echo $A_vue['pseudo'] ?></p>
        <p>Adresse email : <?php echo $A_vue['email'] ?></p>
        <p>Date inscription : <?php echo $A_vue['DateInscription'] ?></p>
        <p>Dernier connection : <?php echo $A_vue['DateConnexion'] ?></p>
    </div>
</body>

</html>
<style>
    @import url("./CSS/Utilisateur.css");
</style>