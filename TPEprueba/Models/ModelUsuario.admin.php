<?php
require_once 'config.php';
require_once 'Models/Model.php';
class ModelUsuarioAdmin extends Model{

    function __construct(){
        parent::__construct();
    }

    public function login($user){
        $query = $this->db->prepare("SELECT * FROM usuario_admin WHERE Nombre_Usuario = ?");
        $query->execute([$user]);
        $datos = $query->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
   
    
}