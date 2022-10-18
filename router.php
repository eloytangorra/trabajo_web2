<?php
require_once './app/controller/peliculas.controller.php';
require_once './app/controller/genero.controller.php';
require_once './app/controller/user.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

//instancio el unico controller que existe por ahora


// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new userController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new userController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new userController();
        $authController->logout();
        break;
    case 'home':
        $peliculasController = new peliculasController();
        $peliculasController->showformularios();
        break;
    case 'add':
        $peliculasController = new peliculasController();
        $peliculasController->addpelicula();
        break;
        case'addgenero':
            $generocontroller= new generoController();
            $generocontroller->addgenero();
            break;
        case 'delete':
        // obtengo el parametro de la acción
        $peliculasController = new peliculasController();   
        $Pelicula_ID = $params[1];
            $peliculasController->deletepelicula($Pelicula_ID);
        break;
        case 'deleteGEN':
            $generocontroller= new generoController();
            $ID_genero =$params[1];
            $generocontroller->deleteGEN($ID_genero);
            break;
            case 'edit':
                $peliculasController = new peliculasController();
                $peliculasController->editpeliculaAction($params[1]);
                break;
                case 'editadopeli':
                    $peliculasController = new peliculasController();
                    $peliculasController->editpelicula();
                    break;
                case 'mostrargeneros':
                    $generocontroller= new generoController();
                    $generocontroller->mostrarResultadosParecidos();
                    break; 
                    case 'pelicula':
                        $peliculasController = new peliculasController();
                        $peliculasController->MostrarPeliculas($params[1]);
                        break;
                        case 'editGEN':
                            $generocontroller= new generoController();
                            $generocontroller->ShowEditGen($params[1]);
                            break;        
                        case 'generos':
                            $generocontroller= new generoController();
                            $generocontroller->MostrarGenero($params[1]);
                            break;    
                        case 'editadoGEN':
                            $generocontroller= new generoController();
                            $generocontroller->Editgeneropelicula();        
                
    default:
        echo('404 Page not found');
        break;
}
