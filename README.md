# TP3-reentrega-parte-2

Se trabajo en las siguientes correcciones:

-Tienen un unico model/controller/view. Es un error grave ya que hay gran diferencia entre las tablas Autores y Libro.
  Se agrego un modelo por cada tabla de la base de datos.
  Se realizaron dos controladores: AuthController y CardsController
  Se realizaron dos vistas: AuthView y CardsView
  
-Contraseña sin hashear en bbdd y comprueban como si estuviera.
  ![hashContraseña jpg](https://github.com/carlota1205/TP3-reentrega-parte-2.git/imagenes/hashContraseña.jpg)

-No implementan listar autores.
 Se implementa lista de autores.

-Si no estoy logueado, puedo borrar ingresando a través de la URL.
 Se implemento correctamente la clase autenticacion para que esto no suceda, redirigiendo al usuario al login en caso de que intente entrar por la URL.

-No esta implementado el editar autor ni borrar autor.
 Se implementaron ambos items.
