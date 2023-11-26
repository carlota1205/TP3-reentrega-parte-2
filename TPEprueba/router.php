<?php
include_once 'Controllers/AuthController.php';
include_once 'Controllers/CardsController.php';
define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/' );


$action = "homeInvitado";
if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
$params = explode('/', $action);


switch($params[0]){
    case "login":
        $controller = new AuthController();
        $controller -> showIngreso();
        break;
    case "Autenticar":
        $controller = new AuthController();
        $controller -> Autenticar();
        break;
    case "homeAdmin":
        $controller = new CardsController();
        $controller -> showHomeAd();
        break;
    case "homeInvitado":
        $controller = new CardsController();
        $controller -> showHomeGuest();
        break;
    case "verMas":
        $controller = new CardsController();
        $controller -> verCarta($params[1]);
        break;
    case "verMasGuest":
        $controller = new CardsController();
        $controller -> verCartaGuest($params[1]);
        break;
    case "delete":
        $controller = new CardsController();
        $controller -> eliminarCarta($params[1]);
        break;
    case "deleteAutor":
            $controller = new CardsController();
            $controller -> eliminarAutor($params[1]);
    break;
    case "actualizar":
        $controller = new CardsController();
        $controller-> ModificarCarta();
        break;
    case "actualizarAutor":
        $controller = new CardsController();
        $controller-> ModificarAutor();
    break;
    case "agregar":
        $controller = new CardsController();
        $controller -> agregarAutor();
       break;
    case "agregarLibro":
        $controller = new CardsController();
        $controller-> agregarLibro();
        break;
    case "filtrarAutor":
        $controller = new CardsController();
        $controller -> verAutoresFiltrados();
        break;
    case "logout":
        $controller = new AuthController();
        $controller -> logout();
        break;
    default:
        $controller = new CardsController();
        $controller -> showHomeGuest();
        break;
}


?>