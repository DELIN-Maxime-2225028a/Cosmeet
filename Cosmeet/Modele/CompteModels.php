<?php
require_once 'Noyau/Connection.php';

class CompteModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction pour obtenir le pseudonyme d'un utilisateur.
    public function getPseudo($email)
    {
        $query = "SELECT pseudonyme FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $pseudo = $stmt->fetchColumn();
        return $pseudo;
    }

    // Fonction pour obtenir les id_publication faites par un utilisateur.
    public function getPostIds($email)
    {
        $query = "SELECT id_publication FROM publications WHERE auteur = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $postIds = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $postIds;
    }

    // Fonction pour obtenir la date d'inscription d'un utilisateur.
    public function getDateInscription($email)
    {
        $query = "SELECT date_inscription FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }

    // Fonction pour obtenir la date de la dernière connexion d'un utilisateur.
    public function getDateConnexion($email)
    {
        $query = "SELECT date_derniere_connexion FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $date_derniere_connexion = $stmt->fetchColumn();
        return $date_derniere_connexion;
    }

    // Fonction pour supprimer un compte utilisateur.
    public function supprimerCompte($pseudo)
    {
        $S_table = "utilisateurs";
        $where = "pseudonyme = '$pseudo'";
        return $this->pdo->delete($S_table, $where);
    }

    // Fonction pour supprimer les publications d'un utilisateur.
    public function supprimerPosts($email)
    {
        $S_table = "publications";
        $where = "auteur = '$email'";
        return $this->pdo->delete($S_table, $where);
    }

    // Fonction pour supprimer les commentaires.
    public function supprimerCommentaires($id_publication)
    {
        $S_table = "commentaires";
        $where = "auteur = '$id_publication'";
        return $this->pdo->delete($S_table, $where);
    }
}
