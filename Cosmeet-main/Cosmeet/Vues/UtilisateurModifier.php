<?php
$condition = "";
if (isset($A_vue['reussite'])){
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])){
    $condition = $A_vue['erreur'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cosmeet</title>
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
    <form method="post" action="../Cosmeet/index.php?url=Utilisateur/modifier" enctype="multipart/form-data">
        <h3>modifier les informations de votre compte</h3>
        <input type="text" name="pseudo" placeholder="Pseudonyme" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe pour confirmer" required>

        <button class="boutonLog" name="boutonLog" type="submit">Valider</button>
    </form>
    <h1 style="color: red;">
                <?php echo $condition ?>
    </h1>
</body>
</html>
<style>
    @import url("../CSS/Style.css");
</style>
