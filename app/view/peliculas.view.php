<?php
require_once './libs/smarty-4.2.1/smarty-4.2.1/libs/Smarty.class.php';

class peliculasView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showformularios($pelis, $genero) {
        // asigno variables al tpl smarty
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('pelis', $pelis);
        
        // mostrar el tpl
        $this->smarty->display('templates/peliculas.tpl');
    }
    
     function MostrarPeli($pelicula){
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->display('templates/Mostrarpelicula.tpl');
        
        }
        
function showEdit($pelicula,$genero){
    $this->smarty->assign('pelicula', $pelicula);
    $this->smarty->assign('genero', $genero);
    $this->smarty->display('templates/formu_edit_pelicula.tpl');
  }

 
}





