<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
    <title>Cosmeet</title>
</head>

<body>
    <div class="Compte">
        <div class="user-info">

            <p>Nom d'utilisateur : <?php echo $A_vue['pseudo'] ?></p>
            <p>Adresse email : <?php echo $A_vue['email'] ?></p>
            <p>Date inscription : <?php echo $A_vue['DateInscription'] ?></p>
            <p>Dernier connection : <?php echo $A_vue['DateConnexion'] ?></p>

            <?php if ($_SESSION['utilisateur']['user_type'] == "admin") : ?>
                <form method="POST" action="./index.php?url=Compte/supprimerCompte" enctype="multipart/form-data">
                    <input type="hidden" name="pseudo" value="<?= $A_vue['pseudo'] ?>">
                    <input type="hidden" name="email" value="<?= $A_vue['email'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            <?php endif ?>
        </div>
    </div>
</body>

</html>

<style>
    @import url("./CSS/Compte.css");
    @import url("./CSS/MenuCoulissant.css");
</style>