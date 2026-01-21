<?php

class UserRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($user)
    {
        $query = "insert into utilisateurs (nom, email, mot_de_passe)
        values (:nom, :email, :mot_de_passe)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':nomComplet' => $user->getNomComplet(),
            ':nomUtilisateur' => $user->getNomUtilisateur(),
            ':motDePasse' => $user->getMotDePasse()
        ]);

        $user->setId($this->conn->lastInsertId());
        return $user;
    }

    public function getRoleByUserId($idUser)
    {
        $query = "SELECT r.role 
              FROM roles r
              JOIN utilisateurRoles ur ON r.id = ur.idRole
              WHERE ur.idUtilisateur = :idUser";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['idUser' => $idUser]);
        $roles = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $roles;
    }

    public function findUserById($user)
    {
        $query = "select * from utilisateurs where id = :id";
        $stm = $this->conn->prepare($query);

        $res = $stm->execute([
            ':id' => $user->getId()
        ]);

        $res = $stm->fetch();

        if ($res) {
            $user->setNomUtilisateur($res['nomUtilisateur']);
            $user->setMotDePasse($res['motDePasse']);
            return $user;
        }
        return null;
    }

}
