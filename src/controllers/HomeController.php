<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class HomeController extends Controller
{

    public $usuarios;

    public function __construct()
    {
        $this->usuarios = new Usuario();
    }

    public function index()
    {
        $data = $this->usuarios->getAll();

        $this->loadView('home', ['usuarios' => $data]);
    }
}
