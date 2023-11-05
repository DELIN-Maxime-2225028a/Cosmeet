<?php

require_once 'Noyau/Connection.php';

class PublicationModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction qui ajoute une nouvelle publication dans la base de données.
    public function addPublication($titre, $message, $nom_categorie = NULL)
    {
        $query = "SELECT MAX(id_publication) FROM publications";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        $lastId = $stmt->fetchColumn();
        $newId = $lastId + 1;

        $auteur = $_SESSION['utilisateur']['email'];
        $S_table = "publications";
        $A_parametres = [
            "id_publication" => $newId,
            "titre" => "$titre",
            "message" => "$message",
            "categorie" => $nom_categorie,
            "auteur" => "$auteur",
            "date_publication" => date('y-m-d H:i:s')
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }

    // Fonction pour récupérer un pseudo.
    public function getPseudo($email)
    {
        $query = "SELECT pseudonyme FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $pseudo = $stmt->fetchColumn();
        return $pseudo;
    }

    // Fonction qui vérifie si un compte existe déja.
    public function compteExiste($email)
    {
        $query = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}
