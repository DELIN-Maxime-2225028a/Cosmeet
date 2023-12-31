<?php

require_once 'Noyau/Connection.php';

class ModifierPostModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction pour modifier un post existant dans la base de données.
    public function modifierPost($id_publication, $titre, $message, $nom_categorie = NULL)
    {
        if ($_SESSION['utilisateur']['user_type'] == "admin") {
            $auteur = $this->getPublicationById($id_publication)["auteur"];
        } else {
            $auteur = $_SESSION['utilisateur']['pseudo'];
        }
        $S_table = "publications";
        $data = [
            "titre" => $titre,
            "message" => $message,
            "categorie" => $nom_categorie,
            "auteur" => $auteur,
            "date_publication" => date('y-m-d H:i:s')
        ];
        $where = "id_publication = :id_publication";
        $data['id_publication'] = $id_publication;

        return $this->pdo->update($S_table, $data, $where);
    }

    // Fonction pour supprimer un post de la base de données.
    public function SuprimerPost($id_publication)
    {
        $S_table = "publications";
        $where = "id_publication = $id_publication";
        return $this->pdo->delete($S_table, $where);
    }

    // Fonction pour obtenir l'id_publication d'une publication.
    public function getPublicationById($id_publication)
    {
        $sql = "SELECT * FROM publications WHERE id_publication = :id_publication";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(['id_publication' => $id_publication]);
        return $stmt->fetch();
    }

    // Fonction pour obtenir la catégorie d'une publication.
    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Fonction qui obtient les identifiants des commentaires liés à une publication.
    public function getCommentaireIds($id_publication)
    {
        $query = "SELECT id_commentaire FROM commentaires WHERE id_publication = :id_publication";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':id_publication', $id_publication);
        $stmt->execute();
        $commentaireIds = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $commentaireIds;
    }
}
