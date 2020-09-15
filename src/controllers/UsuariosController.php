<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller
{

    public $usuarios;

    public function __construct()
    {
        $this->usuarios = new Usuario();
    }

    public function listarTodos()
    {
        $data = $this->usuarios->getAll();
        echo json_encode($data);
    }
}
