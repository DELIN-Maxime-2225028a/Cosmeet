<?php
require_once 'Noyau/Connection.php';

class CompteModels
{
    private $pdo;
    public function __construct()     {
        $this->pdo = Connection::getInstance();     
    }

    public function getPseudo($email){
        $query = "SELECT pseudonyme FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $pseudo = $stmt->fetchColumn();
        return $pseudo;
    }

    public function getDateInscription($email){
        $query = "SELECT date_inscription FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }

    public function getDateConnexion($email){
        $query = "SELECT date_derniere_connexion FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_derniere_connexion = $stmt->fetchColumn();
        return $date_derniere_connexion;
    }

}