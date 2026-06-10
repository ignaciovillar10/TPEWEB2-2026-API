<?php
require_once './libs/router/router.php';

require_once './app/controllers/HistoriaControllerApi.php';


// instancio el router
$router = new Router();

// defino los endpoints
$router->addRoute('historia_equipo',     'GET',     'HistoriaControllerApi',    'getHistorias');
$router->addRoute('historia_equipo',     'POST',     'HistoriaControllerApi',    'insertHistoria');
$router->addRoute('historia_equipo/:id',     'GET',     'HistoriaControllerApi',    'getHistoriaById');
$router->addRoute('historia_equipo/:id',     'PUT',     'HistoriaControllerApi',    'updateHistoriaById');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
