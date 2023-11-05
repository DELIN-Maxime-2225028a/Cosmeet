<?php
require_once 'Noyau/Connection.php';

class AccueilModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction pour récupérer toutes les publications de la base de données.
    function getPublications()
    {
        $query = "SELECT * FROM publications ORDER BY id_publication DESC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour récupérer un nombre limité de publications .
    function getPublicationsStart($start = 0, $nombre = 5)
    {
        $query = "SELECT * FROM publications ORDER BY id_publication DESC LIMIT :start, :nombre";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour récupérer tous des commentaires de la base de données.
    function getCommentaires()
    {
        $query = "SELECT * FROM commentaires ORDER BY id_publication ASC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour récupérer des catégories existantes.
    public function getCategories()
    {
        $query = "SELECT nom_categorie FROM categories";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction similaire à getCategories mais limite les résultats.
    function getCategoriesStart($start = 0, $nombre = 5)
    {
        $query = "SELECT * FROM categories ORDER BY id_categorie DESC LIMIT :start, :nombre";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour mettre à jour la date de dernière connexion d'un utilisateur.
    public function modifierDerniereConnection()
    {
        $S_table = "utilisateurs";
        $data = [
            "date_derniere_connexion" => date('y-d-m H:i:s')
        ];
        $userId = $_SESSION['utilisateur']['email'];
        $where = "email = :email";
        $data['email'] = $userId;
        $_SESSION['derniere_connexion'] = array(
            "date_derniere_connexion" => date('y-m-d h:i:s')
        );
        return $this->pdo->update($S_table, $data, $where);
    }

    // Fonction pour obtenir les résultats de recherche dans les publications et les commentaires en fonction d'une recherche.
    public function getRecherche($recherche)
    {
        $query = "SELECT DISTINCT publications.* FROM publications 
    LEFT JOIN commentaires ON publications.id_publication = commentaires.id_publication
    LEFT JOIN categories ON publications.categorie = categories.nom_categorie
    WHERE publications.titre LIKE :recherche OR publications.date_publication LIKE :recherche 
    OR publications.message LIKE :recherche OR publications.auteur LIKE :recherche 
    OR publications.categorie LIKE :recherche OR commentaires.commentaire LIKE :recherche 
    OR commentaires.auteur LIKE :recherche OR commentaires.date_commentaire LIKE :recherche
    OR categories.nom_categorie LIKE :recherche OR categories.description_categorie LIKE :recherche
    ORDER BY id_publication DESC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':recherche', "%$recherche%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour ajouter une nouvelle catégorie ou mettre à jour une catégorie existante.
    public function ajouterCategorie($nom_categorie, $description_categorie) {
        $query = "SELECT * FROM categories WHERE nom_categorie = :nom_categorie";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':nom_categorie', $nom_categorie);
        $stmt->execute();
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
        $S_table = 'categories';
    
        if ($categorie) {
            $data = [
                'description_categorie' => $description_categorie,
                'nom_categorie' => $nom_categorie
            ];
            $where = "nom_categorie = :nom_categorie";
            $this->pdo->update($S_table, $data, $where);
        } 
        else {
            $query = "SELECT MAX(id_categorie) AS max_id FROM categories";
            $stmt = $this->pdo->getPdo()->prepare($query);
            $stmt->execute();
            $max_id = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
    
            $new_id = $max_id + 1;
    
            $parametres = [
                'id_categorie' => $new_id,
                'nom_categorie' => $nom_categorie, 
                'description_categorie' => $description_categorie
            ];
            $this->pdo->insert($S_table, $parametres);
        }
    }
}
