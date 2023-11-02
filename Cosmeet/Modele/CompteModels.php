<?php
require_once 'Noyau/Connection.php';

class CompteModels
{
    private $pdo;
    public function __construct()     {
        $this->pdo = Connection::getInstance();     
    }

    public function getEmail($pseudo){
        $query = "SELECT email FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    public function getDateInscription($pseudo){
        $query = "SELECT date_inscription FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }

    public function getDateConnexion($pseudo){
        $query = "SELECT date_derniere_connexion FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $date_derniere_connexion = $stmt->fetchColumn();
        return $date_derniere_connexion;
    }
}