<?php

require_once 'Noyau/Connection.php';

class Utilisateur
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction qui vérifie si l'email est déjà utilisé par un autre utilisateur.
    public function emailUtiliser($email)
    {
        $query = "SELECT count(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result > 0;
    }

    // Fonction qui vérifie si le pseudonyme est déjà utilisé par un autre utilisateur.
    public function pseudoUtilise($pseudo)
    {
        $query = "SELECT count(*) FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result > 0;
    }

    // Fonction qui modifie le pseudo d'un utilisateur.
    public function modifierpseudo($pseudo, $email)
    {
        $S_table = "utilisateurs";
        $data = [
            "pseudonyme" => "$pseudo",
            "email" => "$email",
        ];

        $userId = $_SESSION['utilisateur']['email'];
        $where = "email = :email";
        $data['email'] = $userId;

        return $this->pdo->update($S_table, $data, $where);
    }

    // Fonction pour récupérer la date d'inscription dun utilisateur.
    public function getDateinscription($pseudo)
    {
        $query = "SELECT date_inscription FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();

        return $date_inscription;
    }
}
