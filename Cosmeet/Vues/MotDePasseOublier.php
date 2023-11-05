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
    <div class="MotDePasseOublier">
        <div id="formulaire">
            <form method="POST" action="./index.php?url=MotDePasseOublier/motDePasseOublier" enctype="multipart/form-data">

                <div id="Onglets">
                    <h3><a id="Retour" href="./index.php?url=Accueil">RETOUR</a></h3>
                </div>

                <h1>Mot de passe Oublier</h1>
                <input type="text" name="pseudo" placeholder="PSEUDO" required>
                <input type="email" name="email" placeholder="E-MAIL" required>
                <input type="password" name="mdp1" placeholder="NOUVEAU MOT DE PASSE" required>
                <input type="password" name="mdp2" placeholder="CONFIRMER NOUVEAU LE MOT DE PASSE" required>
                <button class="boutonLog" name="boutonLog" type="submit">Valider</button>

            </form>

            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>

        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/MotDePasseOublier.css");
    @import url("./CSS/MenuCoulissant.css");
</style>