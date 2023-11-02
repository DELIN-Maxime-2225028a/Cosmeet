<?php
require_once 'Noyau/Connection.php';

class PublicationModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();     
    }

    public function addPublication($titre, $message, $nom_categorie)
    {
        $query = "SELECT MAX(id_publication) FROM publications";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        $lastId = $stmt->fetchColumn();
        $newId = $lastId + 1;
        $auteur = $_SESSION['utilisateur']['pseudo'];
        $S_table = "publications";
        $A_parametres = [
            "id_publication" => $newId,
            "titre" => "$titre",
            "message" => "$message",
            "categorie" => "$nom_categorie",
            "auteur" => "$auteur",
            "date_publication" => date('y-m-d H:i:s')
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }

    public function CategorieExiste($nom_categorie){
        $query = "SELECT count(*) FROM categorie WHERE nom_categorie = :nom_categorie";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':nom_categorie', $nom_categorie);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result > 0;
    }

    public function addCategorie($nom_categorie, $description_categorie)
    {
        $query = "SELECT MAX(id_categorie) FROM categorie";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        $lastId = $stmt->fetchColumn();
        $newId = $lastId + 1;
        $S_table = "categorie";
        $A_parametres = [
            "id_categorie" => $newId,
            "nom_categorie" => "$nom_categorie",
            "description_categorie" => "$description_categorie",
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }
}