<?php

class HomeController
{
    public function index()
    {
        // Load the home view
        require_once __DIR__ . '/../views/home.php';
    }

    public function debug()
    {
        // Load the view
        require_once __DIR__ . '/../views/debug.php';
    }
}
