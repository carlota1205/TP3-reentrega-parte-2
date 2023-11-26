<?php
require_once 'Models/Model.php';  

class ModelAutores extends Model{
    
    function __construct(){
        parent::__construct();
    }
    public function showAutores(){
        $query = $this->db->prepare("SELECT * FROM autores");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $datos;
    }
    public function mostrarNombreAutor($idAutor){
        $query = $this->db->prepare("SELECT Nombre_Autor, Profesion_Autor, Fecha_Autor FROM autores WHERE Autor_id = ?");
        $query->execute([$idAutor]);
        $autor = $query->fetch(PDO::FETCH_OBJ);
        return $autor;
    }
    public function agregarAutor($name, $Profesion_Autor, $Fecha_Autor){
        $query = $this->db->prepare("INSERT INTO autores (Nombre_Autor, Profesion_Autor, Fecha_Autor) VALUES (?, ?, ?)");
        $query->execute([$name, $Profesion_Autor, $Fecha_Autor]);
        return $this->db->lastInsertId();
    }
    public function eliminarAutor($idEliminar){
        $query = $this->db->prepare("DELETE FROM autores WHERE Autor_id = ?");
        $query->execute([$idEliminar]);

    }
    public function modificarAutor($nombre,$profesion,$fecha,$id){
        $query = $this->db->prepare("UPDATE autores SET Nombre_Autor=?, Profesion_Autor=?, Fecha_Autor=? WHERE Autor_id=? ");
        $query->execute([$nombre,$profesion,$fecha,$id]);
    }
    public function filtrarAutor($autor){
        $query = $this->db->prepare("SELECT * FROM libros WHERE Autor_id = ?");
        $query->execute([$autor]);
        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        return $libro;
    }

    
}


