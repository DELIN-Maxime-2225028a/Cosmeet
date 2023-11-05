<?php
require_once 'Noyau/Connection.php';

class MotDePasseOublierModels
{
    private $pdo;
    public function __construct()
    {
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

    public function getEmail($pseudo){
        $query = "SELECT email FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }
    public function getDateInscription($email){
        $query = "SELECT date_inscription FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }

    public function modifiermdp($pseudo,$email,$mdp1){
        $S_table = "utilisateurs";
        $data = [
            "pseudonyme" => $pseudo,
            "email" => $email,
            "mot_de_passe" => $mdp1,
            "date_inscription" => $this -> getDateInscription($email),
            "date_derniere_connexion" => date('y-m-d H:i:s')
        ];
        $where = "pseudonyme = :$pseudo";
        $data['$pseudo'] = $pseudo;

        return $this->pdo->update($S_table, $data, $where);
    }
}
