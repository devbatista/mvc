<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/novo', 'UsuariosController@add');
$router->post('/novo', 'UsuariosController@addAction');

$router->get('/usuario/edit/{id}', 'UsuariosController@edit');
$router->post('/usuario/edit/{id}', 'UsuariosController@editAction');

$router->get('/usuario/del/{id}', 'UsuariosController@del');