<?php
namespace App\Repository;
use App\Entity\Role;
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
            ':nom' => $user->getName(),
            ':email' => $user->getEmail(),
            ':motDePasse' => $user->getPassword(),
            ':idRole' => $user->getRole()->getId()
        ]);

        $user->setId($this->conn->lastInsertId());
        return $user;
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
        $query = "  select u.id, u.nom, u.email, u.mot_de_passe, r.nom  
                    from utilisateurs u
                    join utilisateurRoles ur on u.id = ur.idUtilisateur 
                    join roles r on ur.idRole = r.id
                    where email = :email";

        $stm = $this->conn->prepare($query);
        $stm->execute([
            ':email' => $email
        ]);

        $user = $stm->fetch();

        if ($user) {
            return $user;
        }

        return null;
    }

    public function getRoleByUserId($user)
    {
        $query = "  SELECT r.id, r.nom 
                    FROM roles r
                    JOIN utilisateurRoles ur ON r.id = ur.idRole
                    WHERE ur.idUtilisateur = :idUser";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['idUser' => $user->getId()]);
        
        $data = $stmt->fetch();
        $role = new Role($data['nom']);
        $role->setId($data['id']);
        return $role;
    }

    // public function findByEmail($email)
    // {
    //     $query = "
    //             select u.id, u.nom, u.email, u.mot_de_passe, r.nom
    //             from utilisateurs u
    //             join utilisateurroles ur on u.id = ur.idutilisateur
    //             join roles r on ur.idrole = r.id
    //             where u.email = :email
    //         ";

    //     $stm = $this->conn->prepare($query);
    //     $stm->execute([
    //         ':email' => $email
    //     ]);

    //     $user = $stm->fetch();

    //     if ($user) {
    //         return $user;
    //     }
    //     return null;
    // }
}
