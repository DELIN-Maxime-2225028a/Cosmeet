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
    <div class="MotDePasseOublie">
        <div id="formulaire">
            <form method="POST" action="./index.php?url=MotDePasseOublie/MotDePasseOublie" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Connexion">RETOUR</a></h3>
                </div>

                <h1>Mot de passe Oublier</h1>
                <input type="text" name="pseudo" placeholder="PSEUDO" required>
                <input type="email" name="email" placeholder="E-MAIL" required>
                <input type="password" name="mdp1" placeholder="NOUVEAU MOT DE PASSE" required>
                <input type="password" name="mdp2" placeholder="CONFIRMER DE NOUVEAU LE MOT DE PASSE" required>
                <button class="boutonLog" name="boutonLog" type="submit">Valider</button>

            </form>

            <!-- Affichage de la condition (réussite ou erreur) -->
            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/MotDePasseOublie.css");
    @import url("./CSS/MenuCoulissant.css");
</style>