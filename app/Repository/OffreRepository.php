<?php

namespace App\Repository;

use App\Entity\Offre;
use App\Entity\Recruteur;
use App\Entity\Categorie;


class OffreRepository
{

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create(Offre $offre): bool
    {
        $sql = "INSERT INTO offres (poste, salaire, qualifications, lieu, recruteur_id, categorie_id, status) 
                VALUES (:poste, :salaire, :qualifications, :lieu, :recruteur_id, :categorie_id, :status)";

        $stmt = $this->conn->prepare($sql);

        $result = $stmt->execute([
            'poste' => $offre->getPoste(),
            'salaire' => $offre->getSalaire(),
            'qualifications' => $offre->getQualifications(),
            'lieu' => $offre->getLieu(),
            'recruteur_id' => $offre->getRecruteur()->getId(),
            'categorie_id' => $offre->getCategorie()->getId(),
            'status' => $offre->getStatus()
        ]);

        if ($result) {
            $offreId = (int) $this->conn->lastInsertId();
            $offre->setId($offreId);

            $tags = $offre->getTags();

            if (!empty($tags)) {
                $sqlPivot = "INSERT INTO offre_tag (offre_id, tag_id) VALUES (:offre_id, :tag_id)";
                $stmtPivot = $this->conn->prepare($sqlPivot);

                foreach ($tags as $tag) {
                    $stmtPivot->execute([
                        'offre_id' => $offreId,
                        'tag_id' => $tag->getId()
                    ]);
                }
            }
        }

        return $result;
    }

    public function finconnyId(int $id): ?Offre
    {
        $sql = "SELECT o.*, 
                       r.id as rec_id, r.name as rec_name, r.email as rec_email, r.password as rec_password, r.company_name,
                       c.id as cat_id, c.titre as cat_titre, c.description as cat_description
                FROM offres o
                INNER JOIN recruteurs r ON o.recruteur_id = r.id
                INNER JOIN categories c ON o.categorie_id = c.id
                WHERE o.id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        return $this->mapToEntity($data);
    }
    public function findAll(): array
    {
        $sql = "select * from offers";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
    public function finconnyRecruteur(Recruteur $recruteur): array
    {
        $sql = "SELECT o.*, 
                       r.id as rec_id, r.name as rec_name, r.email as rec_email, r.password as rec_password, r.company_name,
                       c.id as cat_id, c.titre as cat_titre, c.description as cat_description
                FROM offres o
                INNER JOIN recruteurs r ON o.recruteur_id = r.id
                INNER JOIN categories c ON o.categorie_id = c.id
                WHERE o.recruteur_id = :recruteur_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['recruteur_id' => $recruteur->getId()]);

        $offres = [];
        while ($data = $stmt->fetch()) {
            $offres[] = $this->mapToEntity($data);
        }

        return $offres;
    }


    public function update(Offre $offre): bool
    {
        $sql = "UPDATE offres 
                SET poste = :poste, salaire = :salaire, qualifications = :qualifications, 
                    lieu = :lieu, recruteur_id = :recruteur_id, categorie_id = :categorie_id, status = :status
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'id' => $offre->getId(),
            'poste' => $offre->getPoste(),
            'salaire' => $offre->getSalaire(),
            'qualifications' => $offre->getQualifications(),
            'lieu' => $offre->getLieu(),
            'recruteur_id' => $offre->getRecruteur()->getId(),
            'categorie_id' => $offre->getCategorie()->getId(),
            'status' => $offre->getStatus()
        ]);
    }

    public function archive(int $id): bool
    {
        $sql = "UPDATE offres SET status = 0 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM offres WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    private function mapToEntity(array $data): Offre
    {
        $recruteur = new Recruteur(
            $data['rec_name'],
            $data['rec_email'],
            $data['rec_password'],
            $data['company_name']
        );
        $recruteur->setId((int) $data['rec_id']);

        $categorie = new Categorie(
            $data['cat_titre'],
            $data['cat_description'],
            (int) $data['cat_id']
        );

        $offre = new Offre(
            $data['poste'],
            $data['salaire'],
            $data['qualifications'],
            $data['lieu']
        );
        $offre->setId((int) $data['id']);
        $offre->setRecruteur($recruteur);
        $offre->setCategorie($categorie);
        $offre->setStatus((int) $data['status']);
        $offre->setCreatedAt($data['created_at']);

        return $offre;
    }
}
