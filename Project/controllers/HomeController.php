<?php

// home controller
class HomeController
{
    // method to display homepage
    public function index()
    {
        include 'views/layout/header.php';
        include 'views/home.php';
        include 'views/layout/footer.php';
    }
}
?>