<?php

namespace src\controllers;

use \core\Controller;

class HomeController extends Controller
{

    public $usuarios;

    public function __construct()
    {
        
    }

    public function index()
    {
        $data = $this->usuarios->getAll();

        $this->loadView('home');
    }
}
