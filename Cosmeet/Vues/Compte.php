<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="categorie">
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
    @import url("./CSS/Accueil.css");
    @import url("./CSS/Utilisateur.css");
</style>