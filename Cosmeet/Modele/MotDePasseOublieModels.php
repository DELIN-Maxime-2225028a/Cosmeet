<?php

require_once 'Noyau/Connection.php';

class MotDePasseOublieModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
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

    // Fonction pour récupérer un email.
    public function getEmail($pseudo)
    {
        $query = "SELECT email FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    // Fonction pour récupérer la date d'inscription dun utilisateur.
    public function getDateInscription($email)
    {
        $query = "SELECT date_inscription FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }

    // Fonction pour récupérer un user_type.
    public function getUserType($pseudo)
    {
        $query = "SELECT user_type FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    // Fonction qui modifie le mot de passe d'un utilisateur.
    public function modifiermdp($pseudo, $email, $mdp1)
    {
        $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
        $S_table = "utilisateurs";
        $data = [
            "pseudonyme" => $pseudo,
            "email" => $email,
            "mot_de_passe" => $mdp1,
            "date_inscription" => $this->getDateInscription($email),
            "date_derniere_connexion" => date('y-m-d H:i:s'),
            "user_type" => $this->getUserType($pseudo)
        ];
        $where = "pseudonyme = '$pseudo'";

        return $this->pdo->update($S_table, $data, $where);
    }
}
