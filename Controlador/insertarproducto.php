<?php
//Comprobar datos
if (
    (isset($_POST['producto']) && !empty($_POST['producto'])) && (isset($_POST['cantidad']) && !empty($_POST['cantidad']))
) {
    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables


    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
  








    // Get reference to uploaded image
    $image_file = $_FILES["file"];

    $nombre = $image_file['name'];
    // Image not defined, let's exit


    if (isset($_POST['imagenurl']) && !empty($_POST['imagenurl'])) {

        $guardar_imagen =  $_POST["imagenurl"];
    } else {

        // Move the temp image file to the images/ directory

        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location, __DIR__ is the location of the current PHP file
            $imagen = (__DIR__ . "/images/$nombre")

        );

        $guardar_imagen = "./Controlador/" . "/images/$nombre";
    }


    if ( $_POST['imagenurl']== "" && $nombre == "") {

        $guardar_imagen = "./Controlador//images/nod.png";
    }


    $autor = $_POST['autor'];



    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();

    $editar = true ;

    $consulta = $mysql->efectuarConsulta("select * from productos");
 

    while ( $fila = mysqli_fetch_array($consulta)) {
       
        
        if ($producto ==  $fila[1]) {
            $editar = false;
        }
      
    }
    $mysql->desconectar();

    $mysql->conectar();

    if ($editar == true) {
    //Realizo la consulta con mis comandos
    $usuarios = $mysql->efectuarConsulta("  INSERT INTO productos (Id_producto, Nombre_producto, Cantidad_producto,Imagen_producto,Id_usuario) VALUES (NULL, '$producto','$cantidad','$guardar_imagen','$autor')
    ");
  
    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();

    //Capturar los resultados de la consulta en una fila

    header("Location: ../Productos.php");
    }
    else
    {

        header("Location: ../Agregar.php?Error=true&Mensaje=Este Producto ya existe");
    }
 
}
else{

    header("Location: ../Productos.php");
}
?>
