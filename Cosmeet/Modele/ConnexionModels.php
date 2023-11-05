<?php

require_once 'Noyau/Connection.php';

class ConnexionModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction pour vérifier si les paramètres sont passés (à des fins de validation côté serveur).
    public function afficher($pseudo, $mdp1, $mdp2)
    {
        return $pseudo && $mdp1 && $mdp2;
    }

    // Fonction pour vérifier si un pseudonyme existe déjà dans la base de données.
    public function pseudonymeExiste($pseudo)
    {
        $query = "SELECT count(*) FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result > 0;
    }

    // Fonction pour vérifier l'exactitude du couple pseudonyme et mot de passe lors de la connexion.
    public function verifierUtilisateur($pseudo, $mdp1)
    {
        $query = "SELECT * FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $utilisateur = $stmt->fetch();

        if ($utilisateur) {
            return password_verify($mdp1, $utilisateur['mot_de_passe']);
        }

        return false;
    }

    // Fonction pour obtenir l'email d'un utilisateur.
    public function getEmail($pseudo)
    {
        $query = "SELECT email FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    // Fonction pour obtenir le type d'utilisateur.
    public function getUserType($pseudo)
    {
        $query = "SELECT user_type FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    // Fonction pour obtenir la date d'inscription d'un utilisateur.
    public function getDateInscription($pseudo)
    {
        $query = "SELECT date_inscription FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }
}
