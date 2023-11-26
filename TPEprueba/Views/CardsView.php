<?php

class CardsView{

    function ShowError($msj){
          require './Templates/error.phtml';
            
    }
     
    function showHomeAd($Autores,$Cartas){ 
          require './Templates/mainadmin.phtml';      
    }
    function showHomeGuest($Autores,$Cartas){ 
          require './Templates/header.phtml';  
          require './Templates/mainguest.phtml';  
    }
        
    function verCarta($carta,$autor){ 
          require './Templates/header.phtml';
          require './Templates/mainvercarta.phtml';    
    }
    function verCartaGuest($carta,$autor){ 
          require './Templates/header.phtml';
          require './Templates/mainvercartaguest.phtml';     
    }
    function verAutoresFiltrados($idAutor, $autores){ 
          require './Templates/mainverautoresfiltrados.phtml';     
    }

}
?>