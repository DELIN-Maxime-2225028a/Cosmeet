<?php
// Ce fichier est le point d'entrée de votre application

require 'Noyau/ChargementAuto.php';

session_start();
$S_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
if (!$S_urlADecortiquer) {
    $S_urlADecortiquer = 'Accueil';
}
$A_postParams = isset($_POST) ? $_POST : null;

Vue::ouvrirTampon(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

try {
    $O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
    $O_controleur->executer();
} catch (ControleurException $O_exception) {
    echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
}


// Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
$contenuPourAffichage = Vue::recupererContenuTampon();

if (!isset($_SESSION['afficherGabarit']) || $_SESSION['afficherGabarit']) {
    // On affiche le contenu dans la partie body du gabarit général
    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));
} else {
    // Si 'afficherGabarit' est false, affichez simplement le contenu sans le gabarit
    echo $contenuPourAffichage;
    // Réinitialisez 'afficherGabarit' pour les prochaines requêtes
    $_SESSION['afficherGabarit'] = true;
}
