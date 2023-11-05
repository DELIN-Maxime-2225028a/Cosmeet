<?php
$condition = "";
if (isset($A_vue['reussite'])) {
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])) {
    $condition = $A_vue['erreur'];
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="Utilisateur">

        <div>
            <p>Nom d'utilisateur : <?= $_SESSION['utilisateur']['pseudo'] ?></p>
            <p>Adresse email : <?= $_SESSION['utilisateur']['email'] ?></p>
            <p>Date inscription : <?= $_SESSION['utilisateur']['date_inscription'] ?></p>
            <p>Dernier connection : <?= $_SESSION['derniere_connexion']['date_derniere_connexion'] ?></p>
        </div>

        <button class="modal-btn modal-trigger">Modifier le Pseudonyme</button>
        <button id="actions" onclick="window.location.href='./index.php?url=Utilisateur/deco'">Déconnexion</button>

        <h1 style="color: red;">
            <?php echo $condition ?>
        </h1>

    </div>
    
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1 id="modalTitle">Modifier votre Pseudonyme </h1>

            <form method="post" action="./index.php?url=Utilisateur/modifier" enctype="multipart/form-data">
                <input type="text" name="pseudo" placeholder="Pseudonyme" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="mdp" placeholder="Mot de passe pour confirmer" required>
                <button class="boutonLog" name="boutonLog" type="submit">Valider</button>
            </form>

        </div>
    </div>
</body>

</html>

<script src="./JavaScript/Modal.js"></script>

<style>
    @import url("./CSS/Modals.css");
    @import url("./CSS/Utilisateur.css");
    @import url("./CSS/MenuCoulissant.css");
</style>