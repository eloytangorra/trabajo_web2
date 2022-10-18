<?php
require_once './app/model/genero.model.php';
require_once './app/view/genero.view.php';
require_once './app/helper/user.helper.php';

class generoController{
    private $modelgenero;
    private $viewgenero;
    private $UserHelper;

public function __construct(){
    $this->modelgenero=new generomodel();
    $this->viewgenero=new generoview();
    $this->UserHelper = new UserHelper();
    if(strnatcmp(phpversion(), '5.4.0') >= 0) {
        if (session_status() == PHP_SESSION_NONE) {
         session_start();
        }else if(session_id() == ''){
         session_start();}}
    }
      //validar datos de segunda tabla 
function addgenero(){
    $this->UserHelper->checkLoggedIn();
    if(isset($_POST['Genero']) && isset($_POST['Edad'])){
    if(!empty($_POST['Genero']) && !empty($_POST['Edad'])){  
    if(trim($_POST['Genero']) && trim($_POST['Edad'])){  
    $tipogenero=$_POST['Genero'];
    $tipoedad=$_POST['Edad'];
    $id=$this->modelgenero->insertargenero($tipogenero,$tipoedad);
    header("Location: " . BASE_URL);}}}
    else {header("Location: " . BASE_URL);}
    }
    

function deleteGEN($ID_genero){
    $this->UserHelper->checkLoggedIn();
    $contador = $this->modelgenero->contadorCategoriaenpelicula($ID_genero);
if ($contador > 0){
$this->viewgenero->error();} 
    else{$this->modelgenero->deletebyidgen($ID_genero);
        header("Location: " . BASE_URL);
}}

function mostrarResultadosParecidos(){
    if(isset($_POST["busqueda"]) && !empty($_POST["busqueda"])){
      $resultados = $this->modelgenero->traerParecidos($_POST["busqueda"]);
    $this->viewgenero->ShowResultados($resultados);
      
    }
  }

function ShowEditGen($ID_genero){
    $this->UserHelper->checkLoggedIn();
    $generos = $this->modelgenero->getGEN($ID_genero);
    $this->viewgenero->ShowGenEdit($generos);
    
    }
    
function MostrarGenero($ID_genero){
$generos = $this->modelgenero->getGEN($ID_genero);
$this->viewgenero->MostrarGeneroView($generos);
}
// Funcion que toma los valores del Input y los pasa como parametros a la funcion que los updatea a la base de datos.
function editgeneropelicula(){
    $this->UserHelper->checkLoggedIn();
    if(isset($_POST['ID_genero']) && isset($_POST['Genero']) && isset($_POST['Edad'])){
    if(!empty($_POST['ID_genero']) && !empty($_POST['Genero']) && !empty($_POST['Edad'])){ 
    if(trim($_POST['ID_genero']) && trim($_POST['Genero']) && trim($_POST['Edad'])){  
    $this->modelgenero->updateGeneroFromDB($_POST['ID_genero'], $_POST['Genero'],$_POST['Edad']);
     header("Location: " . BASE_URL);}}}
     else {header("Location: " . BASE_URL);}
    }
  
}
