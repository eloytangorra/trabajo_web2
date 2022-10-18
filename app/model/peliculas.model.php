<?php
class peliculasmodel{
    private $db;

    function __construct(){
        $this->db=new PDO('mysql:host=localhost;'.'dbname=tpe_especial; charset=utf8','root','');
    }
    //funcion devolver peliculas
     public function getAllfilms(){
        //abro conexion a la db 
        // ya esta abierta por el constructor 
        // ejecuto la sentencia
        $querry = $this->db->prepare('SELECT peliculas.*, tipogenero.* FROM peliculas JOIN tipogenero ON peliculas.ID_genero = tipogenero.ID_Genero');
        $querry->execute();

        //obtengo los resultados
        $pelis=$querry->fetchAll(PDO::FETCH_OBJ);

        return $pelis;
    }
    function insertpelicula($Titulo,$Genero,$Duracion,$Fecha_de_estreno){
        $querry = $this->db->prepare('INSERT INTO peliculas (Titulo,ID_genero,Duracion,Fecha_de_estreno) VALUES (?,?,?,?)');
        $querry->execute([$Titulo,$Genero,$Duracion,$Fecha_de_estreno]);
        
        return $this->db->lastInsertId();
}


    
    function deletepeliculaid($Pelicula_ID){
        $querry = $this->db->prepare('DELETE FROM peliculas WHERE Pelicula_ID=?');
        $querry->execute([$Pelicula_ID]);
    }

    function getPelicula($Pelicula_ID){
        $querry = $this->db->prepare( "SELECT peliculas.Pelicula_ID, peliculas.Titulo, peliculas.ID_genero, peliculas.Duracion, peliculas.Fecha_de_estreno, tipogenero.Genero , tipogenero.Edad FROM peliculas JOIN tipogenero ON peliculas.ID_genero = tipogenero.ID_genero WHERE Pelicula_ID=?;");
        $querry->execute(array($Pelicula_ID));
        $pelicula =$querry->fetch(PDO::FETCH_OBJ);
      
        return $pelicula;
      }
   
  function updatepeliculaFromDB( $Pelicula_ID, $Titulo,$Genero,$Duracion,$Fecha_de_estreno){
    $query = $this->db->prepare("UPDATE peliculas SET Titulo=?,ID_genero=?, Duracion=?,Fecha_de_estreno=? WHERE Pelicula_ID =?");
    $query->execute(array($Pelicula_ID, $Titulo,$Duracion, $Genero,$Fecha_de_estreno));
}

}  