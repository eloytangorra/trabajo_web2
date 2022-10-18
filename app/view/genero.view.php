<?php
require_once './libs/smarty-4.2.1/smarty-4.2.1/libs/Smarty.class.php';

class generoView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showgeneros($generos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('generos', $generos);
        // mostrar el tpl
        $this->smarty->display('tipogenero.tpl');
    }
    function ShowResultados($resultados){
        // asigno variables al tpl smarty
        $this->smarty->assign('resultados',$resultados);
        //mostrar el tpl
        $this->smarty->display('templates/resultados.tpl');
     
     }
     function ShowGenEdit($generos){
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('formu_edit_genero.tpl');
    }
    function MostrarGeneroView($generos){ 
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('mostrar_genero.tpl');
         }
         
         
         //Funcion que muestra el error que se produce al querer eliminar un Genero utilizado en la tabla principal.          
          function error(){
            $this->smarty->assign('Error','error');
            $this->smarty->display('error.tpl');
}

    }