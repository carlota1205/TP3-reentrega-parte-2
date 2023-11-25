<?php

include_once 'Models/ModelLibros.php';
include_once 'Models/ModelAutores.php';
include_once 'Views/CardsView.php';
include_once 'Autenticacion.php';

class CardsController{
    private $modelLibros;
    private $modelAutores; 
    private $view;

    function __construct(){  
        AutenticacionEstatica:: verify();
        $this->modelLibros = new ModelLibros();
        $this->modelAutores = new ModelAutores();
        $this->view = new CardsView();
    }
    function showHomeAd(){ 
        $autores = $this-> modelAutores -> showAutores();
        $cartas=$this-> modelLibros -> showCard();
        $this-> view -> showHomeAd($autores,$cartas); 
    }
    
    function showHomeGuest(){
        $autores = $this-> modelAutores -> showAutores();
        $cartas=$this-> modelLibros -> showCard();
        $this-> view -> showHomeGuest($autores, $cartas);
    }
    function verCarta($idLibro){
        $Carta = $this -> modelLibros ->devolverCarta($idLibro);
        $autor = $this-> modelAutores -> mostrarNombreAutor($Carta-> Autor_id);
        $this -> view -> verCarta($Carta,$autor);

    }
    function verCartaGuest($idLibro){
        $Carta = $this -> modelLibros ->devolverCarta($idLibro);
        $autor = $this-> modelAutores -> mostrarNombreAutor($Carta-> Autor_id);
        $this -> view -> verCartaGuest($Carta,$autor);

    }
    
    function eliminarCarta($idEliminar){
        $this -> modelLibros ->eliminarCarta($idEliminar);
        header('Location: ' . BASE_URL.'/homeAdmin');
    }
    function eliminarAutor($idEliminar){
        $this -> modelAutores ->eliminarAutor($idEliminar);
        header('Location: ' . BASE_URL.'/homeAdmin');
    }

    function agregarLibro(){
        if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['autor']) && isset($_POST['descripcion'])){
            if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['autor']) && !empty($_POST['descripcion'])){
                $titulo = $_POST['titulo'];
                $genero = $_POST['genero'];
                $autor = $_POST['autor'];
                $descripcion = $_POST['descripcion'];
                $libro=$this -> modelLibros -> agregarLibro($titulo, $genero, $autor, $descripcion);
            }
        } 
        if($libro){
            header('Location: ' . BASE_URL.'/homeAdmin');
        }
        else{
            $this->view->showError('Error al ingresar un nuevo libro');
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
                $this-> modelLibros -> ModificarCarta($titulo,$descripcion,$genero,$autor,$idLibro);
                header('Location: ' . BASE_URL.'/homeAdmin');
            }
        }
        else{
            $this->view->showError('Debe completar los campos');
        }
    }
    function ModificarAutor(){
        if(isset($_POST['Autor_id']) && isset($_POST['Nombre']) && isset($_POST['Profesion']) && isset($_POST['Fecha'])){
            if(!empty($_POST['Autor_id']) && !empty($_POST['Nombre']) && !empty($_POST['Profesion']) && !empty($_POST['Fecha'])){
               
                $nombre = $_POST['Nombre'];
                $profesion = $_POST['Profesion'];
                $fecha = $_POST['Fecha'];
                $id = $_POST['Autor_id'];
               
                $this-> modelAutores -> modificarAutor($nombre,$profesion,$fecha,$id);
                header('Location: ' . BASE_URL.'/homeAdmin');
            }
        }
        else{
            $this->view->showError('Debe completar los campos');
        }
    }
    function verAutoresFiltrados(){

        if(isset($_POST['autorFiltrar'])){
            if(!empty($_POST['autorFiltrar'])){
                $autorId = $_POST['autorFiltrar'];
                $autores = $this-> modelAutores -> showAutores();
                $autoresFiltrados = $this -> modelAutores -> filtrarAutor($autorId);
                $this -> view -> verAutoresFiltrados($autoresFiltrados,$autores);
            }
        }
        
    }
    function agregarAutor(){
        if(isset($_POST['nombreEscritor'])&&isset($_POST['ProfesionEscritor'])&&isset($_POST['FechaEscritor'])){
            if(!empty($_POST['nombreEscritor'])&&!empty($_POST['ProfesionEscritor'])&&!empty($_POST['FechaEscritor'])){
                $nombre = $_POST['nombreEscritor'];
                $profesion = $_POST['ProfesionEscritor'];
                $fecha = $_POST['FechaEscritor'];
                $fechaformateada = date('Y-m-d', strtotime($fecha));
                $autor=$this -> modelAutores -> agregarAutor($nombre,$profesion,$fechaformateada);
                if(!$autor){
                    header('Location: ' . BASE_URL.'/homeAdmin');
                }
                else{
                    $this->view->showError('El autor ya existe');
                }
            }
           
        }
        else{
            $this->view->showError('Debe completar los campos');
        }
        
        
    }
   
}


?>