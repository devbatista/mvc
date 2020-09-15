<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/usuarios/listar-todos', 'UsuariosController@listarTodos');