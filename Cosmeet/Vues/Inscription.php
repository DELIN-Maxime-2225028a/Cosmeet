<?php
$condition = "";
if (isset($A_vue['reussite'])) {
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])) {
    $condition = $A_vue['erreur'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div id="formulaire">
        <form method="POST" action="../Cosmeet/index.php?url=Inscription/traiterFormulaire" enctype="multipart/form-data">

            <div id="Onglets">
                <h3><a id="Connexion" href="../Cosmeet/index.php?url=Connexion">SE CONNECTER</a> <a id="Inscription">S'INSCRIRE</a></h3>
            </div>
            <input type="text" name="pseudo" placeholder="PSEUDO" required>
            <input type="email" name="email" placeholder="E-MAIL" required>
            <input type="password" name="mdp1" placeholder="MOT DE PASSE" required>
            <input type="password" name="mdp2" placeholder="CONFIRMER LE MOT DE PASSE" required>

            <button class="boutonLog" name="boutonLog" type="submit">Valider</button>

            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>

        </form>
    </div>
</body>

</html>
<style>
    @import url("./CSS/Inscription.css");
    @import url("./CSS/Accueil.css");
</style>