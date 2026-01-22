<?php
namespace App\Repository;
class UserRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($user)
    {
        $query = "insert into utilisateurs (nom, email, mot_de_passe, id_role)
        values (:nom, :email, :motDePasse, :idRole)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':nomComplet' => $user->getNomComplet(),
            ':email' => $user->getEmail(),
            // 'telephone' => $user->getTelephone(),
            ':motDePasse' => $user->getPassword(),
            ':idRole' => $user->getRole()->getId()
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

    public function findByEmail($email)
    {
        $query = "
                select u.id, u.nom, u.email, u.mot_de_passe, r.role
                from utilisateurs u
                join utilisateurroles ur on u.id = ur.idutilisateur
                join roles r on ur.idrole = r.id
                where u.nomutilisateur = :email
            ";

        $stm = $this->conn->prepare($query);
        $stm->execute([
            ':email' => $email
        ]);

        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }
        return null;
    }
}
