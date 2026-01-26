<?php
namespace App\Repository;
class UserRoleRepository
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
       
    }

    public function addUserRole($userRole)
    {
        $query = "insert into utilisateurRoles (idUtilisateur, idRole)
        values (:idUtilisateur, :idRole)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':idUtilisateur' =>  $userRole->getUtilisateurId(),
            ':idRole' => $userRole->getRoleId()
        ]);
    }
}
