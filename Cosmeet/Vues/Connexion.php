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
    <div class="Connexion">
        <div id="formulaire">

            <!-- Formulaire de connexion -->
            <form method="POST" action="./index.php?url=Connexion/verifierUtilisateur" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Connexion">SE CONNECTER</a> <a id="Inscription" href="./index.php?url=Inscription"> S'INSCRIRE</a></h3>
                </div>

                <input type="text" name="pseudo" placeholder="PSEUDO" required>
                <input type="password" name="mdp1" placeholder="MOT DE PASSE" required>
                <button class="boutonLog" name="boutonLog" type="submit">Valider</button>

                <a href="./index.php?url=MotDePasseOublie" class="password-forgot">Mot de passe oublié ?</a>

                <!-- Affichage de la condition (réussite ou erreur) -->
                <h1 style="color: red;">
                    <?php echo $condition ?>
                </h1>

            </form>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/Connexion.css");
    @import url("./CSS/MenuCoulissant.css");
</style>