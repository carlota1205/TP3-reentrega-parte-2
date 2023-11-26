<?php
require_once 'Models/Model.php';

class ModelLibros extends Model{

    function __construct(){
        parent::__construct();
    }
    public function showCard(){
        $query = $this->db->prepare("SELECT * FROM libros");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $datos;
    }
    public function devolverCarta($idCarta){
        $query = $this->db->prepare("SELECT Libro_id, Titulo, Descripcion, Genero, Autor_id FROM libros WHERE Libro_id = ?");
        $query->execute([$idCarta]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return $libro;
    }
    public function eliminarCarta($idEliminar){
        $query = $this->db->prepare("DELETE FROM libros WHERE Libro_id = ?");
        $query->execute([$idEliminar]);
       
    }
   
    public function filtrarAutor($autor){
        $query = $this->db->prepare("SELECT * FROM libros WHERE Autor_id = ?");
        $query->execute([$autor]);
        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        return $libro;
    }
    public function ModificarCarta($Titulo, $Descripcion, $Genero,$id_Autor, $libro_id){
        $query = $this->db->prepare("UPDATE libros SET Titulo=?, Descripcion=?, Genero=?,Autor_id=? WHERE Libro_id=? ");
        $query->execute([$Titulo, $Descripcion, $Genero,$id_Autor, $libro_id]);
    }
   
    function agregarLibro($titulo, $genero, $autor, $descripcion){
        $query = $this->db->prepare("INSERT INTO libros (Titulo, Descripcion, Genero, Autor_id) VALUES (?, ?, ?, ?)");
        $query->execute([$titulo, $descripcion, $genero, $autor]);
        return $this->db->lastInsertId();
        
    
    }
    
}