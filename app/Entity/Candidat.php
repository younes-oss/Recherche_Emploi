<?php

namespace App\Entity;

class Candidat extends Utilisateur
{
    private  $phone ;
    private  $expectedSalary;

    public function __construct($name, $email, $password, $phone,$expectedSalary
    ) {
        parent::__construct($name, $email, $password);
       
        $this->phone = $phone;
        $this->expectedSalary = $expectedSalary;
    }

    

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getExpectedSalary()
    {
        return $this->expectedSalary;
    }

    public function setExpectedSalary( $expectedSalary)
    {
        $this->expectedSalary = $expectedSalary;
    }
}
