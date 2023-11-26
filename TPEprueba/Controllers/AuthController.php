<?php

include_once 'Models/ModelUsuario.admin.php';
include_once 'Views/AuthView.php';
include_once 'Autenticacion.php';

class AuthController{
    private $model; 
    private $view;

    function __construct(){ 
        $this->model = new ModelUsuarioAdmin();
        $this->view = new AuthView();
    }
    function showIngreso(){ 
        $this -> view -> ShowIngreso();     
    }
    function Autenticar(){
        if(isset($_POST["user"]) && isset($_POST["pass"])){
            if(!empty($_POST["user"]) && !empty($_POST["pass"])){
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                
                $user= $this-> model->login($user);
                if($user && password_verify($pass, $user->Password_User)){
                    AutenticacionEstatica::login($user);
                    header('Location: ' . BASE_URL .'/homeAdmin');
                } else {
                    $this -> view -> ShowError("Datos erroneos");
                }
               // $this-> model->login($user, $pass);
            } else {
                $this -> view -> ShowError("Recuerda llenar todos los campos");
            }
        }
    }
    public function logout() {
        AutenticacionEstatica::logout();
        header('Location: ' . BASE_URL );    
    }
   
   
}
?>