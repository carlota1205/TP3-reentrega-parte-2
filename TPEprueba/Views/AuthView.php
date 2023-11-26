<?php
class AuthView {
    function ShowIngreso(){
        require './Templates/login.phtml';             
    }
    function ShowError($msj){
        require './Templates/error.phtml';
    }
   
}