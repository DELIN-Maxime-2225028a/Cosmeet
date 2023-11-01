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
        <p>Dernier connection : <?= $_SESSION['derniere_connexion']['date_derniere_connexion'] ?></p>
    </div>
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1 id="modalTitle">Modifier votre Pseudonyme </h1>
            <form method="post" action="../Cosmeet/index.php?url=Utilisateur/modifier" enctype="multipart/form-data">
                <input type="text" name="pseudo" placeholder="Pseudonyme" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="mdp" placeholder="Mot de passe pour confirmer" required>
                <button class="boutonLog" name="boutonLog" type="submit">Valider</button>
            </form>
        </div>
    </div>
    <button class="modal-btn modal-trigger">Modifier le Pseudonyme</button>
    </div>
    <button id="actions" onclick="window.location.href='../Cosmeet/index.php?url=Utilisateur/deco'">Déconnexion</button>
    <h1 style="color: red;">
        <?php echo $condition ?>
    </h1>
    <script src="./JavaScript/Modal.js"></script>
</body>

</html>
<style>
    @import url("./CSS/Utilisateur.css");
</style>