<?php
require_once './app/model/peliculas.model.php';
require_once './app/view/peliculas.view.php';
require_once './app/model/genero.model.php';
require_once './app/view/genero.view.php';
require_once './app/helper/user.helper.php';


class peliculasController{
    private $model;
    private $view;
    private $modelgenero;
    private $viewgenero;
    private $UserHelper;
    

public function __construct(){
    $this->model=new peliculasmodel();
    $this->view=new peliculasview();
    $this->modelgenero=new generomodel();
    $this->viewgenero=new generoview();
    $this->UserHelper = new UserHelper();
    if(strnatcmp(phpversion(), '5.4.0') >= 0) {
        if (session_status() == PHP_SESSION_NONE) {
         session_start();
        }else if(session_id() == ''){
         session_start();}}
    }

public function showformularios(){
    $todas = $this->model->getAllfilms();
    $tipogeneros=$this->modelgenero->getallgeneros();
    $this->view->showformularios($todas, $tipogeneros);
    $this->viewgenero->showgeneros($tipogeneros);

   } 
public function addpelicula(){
    $this->UserHelper->checkLoggedIn();
    if(isset($_POST['Titulo']) && isset($_POST['ID_genero']) && isset($_POST['Duracion']) && isset($_POST['Fecha_de_estreno'])){
    if(!empty($_POST['Titulo']) && !empty($_POST['ID_genero']) && !empty($_POST['Duracion']) && !empty($_POST['Fecha_de_estreno'])){ 
    if(trim($_POST['Titulo']) && trim($_POST['ID_genero']) && trim($_POST['Duracion']) && trim($_POST['Fecha_de_estreno'])){
    $Titulo = $_POST['Titulo'];
    $Genero = $_POST['ID_genero'];
    $Duracion = $_POST['Duracion'];
    $Fecha_de_estreno = $_POST['Fecha_de_estreno'];
    $id = $this->model->insertpelicula($Titulo,$Genero,$Duracion,$Fecha_de_estreno);
    header("Location: " . BASE_URL);}}}else {header("Location: " . BASE_URL);}
    }


function MostrarPeliculas($Pelicula_ID) {
        $pelicula = $this->model->getPelicula($Pelicula_ID);
        $this->view->MostrarPeli($pelicula);
        
        }

public function deletepelicula($Pelicula_ID){
    $this->UserHelper->checkLoggedIn();    
    $this->model-> deletepeliculaid($Pelicula_ID);
        header("Location: " . BASE_URL);
    }



  function editpeliculaAction($Pelicula_ID){
    $this->UserHelper->checkLoggedIn();
    $pelicula = $this->model->getPelicula($Pelicula_ID);
    $genero = $this->modelgenero->getallgeneros();
    $this->view->showEdit($pelicula,$genero);
}
function editpelicula(){
    $this->UserHelper->checkLoggedIn();
    if(isset($_POST['Titulo']) && isset($_POST['ID_genero']) && isset($_POST['Duracion'])&& isset($_POST['Fecha_de_estreno'])){
    if(!empty($_POST['Titulo']) && !empty($_POST['ID_genero']) && !empty($_POST['Duracion'])&& !empty($_POST['Fecha_de_estreno'])){
    if(trim($_POST['Titulo']) && trim($_POST['ID_genero']) && trim($_POST['Duracion']&& trim($_POST['Fecha_de_estreno']))){  
    $this->model->updatepeliculaFromDB($_POST['Titulo'],$_POST['ID_genero'],$_POST['Duracion'],$_POST['Fecha_de_estreno'],$_POST['Pelicula_ID']);
    header("Location: " . BASE_URL);}}}else {header("Location: " . BASE_URL);}
    }

}