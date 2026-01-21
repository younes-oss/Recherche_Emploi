<?php


namespace App\Controller;

class PageController
{
    public function register()
    {
        require 'view/auth/register.php';
    }

    public function login()
    {
        require 'view/auth/login.php';
    }

    public function dashboradAdmine()
    {
        require 'view/admine/dashborad.php';
    }

    public function dashboardCandidate()
    {
        require 'view/candidate/dashboard.php';
    }

    public function dashboardRecruteur()
    {
        require 'view/recruteur/dashboard.php';
    }
}
