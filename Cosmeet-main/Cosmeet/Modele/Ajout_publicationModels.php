<?php
require_once 'Noyau/Connection.php';

class Ajout_PublicationModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();     
    }

    public function addPublication($titre, $message, $categorie)
    {
        // last publication id
        $query = "SELECT MAX(id_publication) FROM publications";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        $lastId = $stmt->fetchColumn();

        // increment id
        $newId = $lastId + 1;

        // get author session
        $auteur = $_SESSION['utilisateur']['pseudo'];

        $S_table = "publications";
        $A_parametres = [
            "id_publication" => $newId,
            "titre" => "$titre",
            "message" => "$message",
            "categorie" => "$categorie",
            "auteur" => "$auteur",
            "date_publication" => date('y-m-d h:i:s')
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }
}