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

        </div>
    </div>    
</body>

</html>

<style>
    @import url("./CSS/Compte.css");
    @import url("./CSS/MenuCoulissant.css");
</style>