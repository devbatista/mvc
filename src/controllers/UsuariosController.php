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

    public function list()
    {
        $this->usuarios->getAll();
    }

    public function add()
    {
        $this->loadView('add');
    }

    public function addAction()
    {
        $dados['nome'] = filter_input(INPUT_POST, 'nome');
        $dados['email'] = filter_input(INPUT_POST, 'email');

        if ($dados['nome'] && $dados['email']) {
            $retorno = $this->usuarios->getByEmail($dados['email']);
            if ($retorno === 0) {
                $this->usuarios->addUser($dados);

                $this->redirect('/');
            }
        }
        $this->redirect('/novo');
    }

    public function edit($dados)
    {
        $usuario = $this->usuarios->getById($dados['id']);

        if (empty($usuario)) {
            $this->redirect('/');
        } else {
            $this->loadView('edit', ['usuario' => $usuario]);
        }
    }

    public function editAction($dados)
    {
        $dados['nome'] = filter_input(INPUT_POST, 'nome');
        $dados['email'] = filter_input(INPUT_POST, 'email');

        if ($dados['nome'] && $dados['email']) {
           $this->usuarios->editUser($dados);

            $this->redirect('/');
        } else {
            $this->redirect('/usuario/edit/' . $dados['id'] . '');
        }
    }

    public function del($dados)
    {
        $this->usuarios->delUser($dados['id']);
        $this->redirect('/');
    }
}
