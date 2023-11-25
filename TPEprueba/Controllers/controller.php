<?php

include_once 'Models/Model.php';
include_once 'Views/CardsView.php';
include_once 'Autenticacion.php';
require_once 'config.php';

class Controller{
    private $model; //declaro el modelo y la vista 
    private $view;

    function __construct(){ //constructor 
        $this->model = new Model();
        $this->view = new CardsView();
    }
    function showHomeAd(){
        AutenticacionEstatica:: verify();
        $autores = $this-> model -> showAutores();
        $cartas=$this-> model -> showCard();
        $this-> view -> showHomeAd($autores, $cartas); 
    }
    
    function showHomeGuest(){
        $autores = $this-> model -> showAutores();
        $cartas=$this-> model -> showCard();
        $this-> view -> showHomeGuest($autores, $cartas);
    }
    function verCarta($idLibro){
        $Carta = $this -> model ->devolverCarta($idLibro);
        $autor = $this-> model -> mostrarNombreAutor($Carta-> Autor_id);
        $this -> view -> verCarta($Carta,$autor);

    }
    function verCartaGuest($idLibro){
        $Carta = $this -> model ->devolverCarta($idLibro);
        $autor = $this-> model -> mostrarNombreAutor($Carta-> Autor_id);
        $this -> view -> verCartaGuest($Carta,$autor);

    }
    function verAutoresFiltrados(){

        if(isset($_POST['autorFiltrar'])){
            if(!empty($_POST['autorFiltrar'])){
                $autorId = $_POST['autorFiltrar'];
                $autores = $this-> model -> showAutores();
                $autoresFiltrados = $this -> model -> filtrarAutor($autorId);
                $this -> view -> verAutoresFiltrados($autoresFiltrados,$autores);
            }
        }
        
    }
    function eliminarCarta($idEliminar){
        $this -> model ->eliminarCarta($idEliminar);
    }

    function agregarAutor(){
        if(isset($_POST['nombreEscritor'])&&isset($_POST['ProfesionEscritor'])&&isset($_POST['FechaEscritor'])){
            if(!empty($_POST['nombreEscritor'])&&!empty($_POST['ProfesionEscritor'])&&!empty($_POST['FechaEscritor'])){
                $nombre = $_POST['nombreEscritor'];
                $profesion = $_POST['ProfesionEscritor'];
                $fecha = $_POST['FechaEscritor'];
                $fechaformateada = date('Y-m-d', strtotime($fecha));
                $this -> model -> agregarAutor($nombre,$profesion,$fechaformateada);
            }
            //en este y en agregarLibro habría que hacer un else mostrando algo de no metiste nada de datos
        }
        //agregar validaciones 
        //las validaciones irian adentro de las funciones sin los parametros 
        
      
    }
   

    function agregarLibro(){
        if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['autor']) && isset($_POST['descripcion'])){
            if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['autor']) && !empty($_POST['descripcion'])){
                $titulo = $_POST['titulo'];
                $genero = $_POST['genero'];
                $autor = $_POST['autor'];
                $descripcion = $_POST['descripcion'];
                $this -> model -> agregarLibro($titulo, $genero, $autor, $descripcion);
            }
        } 
     
    }
    
    function ModificarCarta(){
        if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['autor']) && isset($_POST['descripcion'])&& isset($_POST['idLibro'])){
            if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['autor']) && !empty($_POST['descripcion'])&& !empty($_POST['idLibro'])){
                $titulo = $_POST['titulo'];
                $genero = $_POST['genero'];
                $autor = $_POST['autor'];
                $descripcion = $_POST['descripcion'];
                $idLibro= $_POST['idLibro'];
                $this-> model -> ModificarCarta($titulo,$descripcion,$genero,$autor,$idLibro);
            }
        }
        
    }
   
}
?>
