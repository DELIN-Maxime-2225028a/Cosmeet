<?php
$condition = "";
if (isset($A_vue['reussite'])){
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])){
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
        <form method="POST" action="../Cosmeet/index.php?url=Ajout_publication/addPublication" enctype="multipart/form-data">
            
            <div id="Onglets">
                <h3><a id="Retour" href="../Cosmeet/index.php?url=Accueil">RETOUR</a> <a id="AjoutPublication">AJOUTER UNE PUBLICATION</a></h3>
            </div>  
            <input type="text" name="titre" placeholder="TITRE" required>
            <textarea name="message" placeholder="MESSAGE" required></textarea>
            <select name="categorie" required>
                <option value="">Aucune</option>
                <option value="jeux vidéos">Jeux vidéos</option>
                <option value="IRL">IRL</option>
                <option value="musique">Musique</option>
                <option value="sport">Sport</option>
                <option value="créatif">Créatif</option>
                <!-- Soit il en faut plus, soit les cat"gories seront créées par les gens -->
            </select>

            <button class="boutonLog" name="boutonLog" type="submit">Publier</button>
            
            <h1 style="color: red;">
                <?php echo $condition ?>
            </h1>

        </form>
    </div>
</body>
</html>
