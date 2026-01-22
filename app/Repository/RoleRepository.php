<?php
namespace App\Repository;
use App\Entity\Role;
class RoleRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
        
    }

    public function findByRole($role)
    {
        $query = "select * from roles where role = :role";
        $stm = $this->conn->prepare($query);

        $rowRole = $stm->execute([
            ':role' => $role
        ]);

        $rowRole = $stm->fetch();

        if ($rowRole) {
            $r = new Role($rowRole['role']);
            $r->setId($rowRole['id']);
            return $r;
        }

        return null;
    }
}
