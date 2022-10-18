<?php
class generomodel{
    private $db;

    function __construct(){
        $this->db=new PDO('mysql:host=localhost;'.'dbname=tpe_especial; charset=utf8','root','');
    }
    // consultas segunda tabla
function getallgeneros(){
    $querry=$this->db->prepare('SELECT * from tipogenero');
    $querry->execute();
    $genero=$querry->fetchALL(PDO::FETCH_OBJ);
    return $genero;
}
function insertargenero($tipogenero,$tipoedad){
    $existe=$this->existegenerodb($tipogenero);
    if(!$existe){
        $querry=$this->db->prepare('INSERT INTO tipogenero(Genero,Edad)VALUES(?,?)');
        $querry->execute([$tipogenero,$tipoedad]);
        return $this->db->lastInsertId();
    }
   }
   //Funcion que busca ver si el genero existe en la base de datos
 function existegenerodb($tipogenero){
    $query = $this->db->prepare('SELECT * from tipogenero WHERE Genero = ?');
    $query->execute([$tipogenero]);
    $ExisteGenero = $query->fetchAll(PDO::FETCH_OBJ);
    
    return $ExisteGenero;
    
     }
     function deletebyidgen($ID_genero){
        $querry=$this->db->prepare('DELETE FROM tipogenero WHERE ID_genero=?');
        $querry->execute([$ID_genero]);
       }
      
       function traerParecidos($busqueda){
        $query = $this->db->prepare('SELECT peliculas.*, tipogenero.Genero, tipogenero.Edad FROM peliculas JOIN tipogenero ON peliculas.ID_genero = tipogenero.ID_genero WHERE tipogenero.Genero LIKE ?');
        $query->execute(["%${busqueda}%"]);
        $resultados = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
      }   
      
      function getGEN($ID_genero){
        $querry=$this->db->prepare('SELECT tipogenero.ID_genero, tipogenero.Genero, tipogenero.Edad FROM tipogenero WHERE ID_genero= ?');
        $querry->execute(array($ID_genero));
        $generos = $querry->fetch(PDO::FETCH_OBJ);
        return $generos;
        }
        
        

          //Funcion que edita en la base de datos a traves de su ID.
function UpdateGenerofromDB($ID_genero,$Genero,$Edad){
    $query = $this->db->prepare("UPDATE tipogenero SET Genero=?,Edad=? WHERE ID_genero =?");
    $query->execute(array($Genero,$Edad,$ID_genero,));}

    //Funcion que cuenta si hay algun genero en uso en la tabla de juegos. (Hecho para el borrar Genero)
function contadorCategoriaenpelicula($ID_genero){
    $sentencia = $this->db->prepare("SELECT count(*) as contaje FROM Peliculas WHERE ID_genero = ?");
    $sentencia->execute([$ID_genero]);
    $contador = $sentencia->fetch(PDO::FETCH_OBJ);
    return $contador->contaje;}
    

}