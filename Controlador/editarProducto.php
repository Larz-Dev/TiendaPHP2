<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    $image_file = $_FILES["imagenfile"];
    $nombre = $image_file['name'];


    $id = $_POST['id'];




    // Get reference to uploaded image
    

   
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








    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();


    //Realizo la consulta con mis comandos

    $editar = true;

    $consulta = $mysql->efectuarConsulta("select * from productos");


  
    $mysql->desconectar();

    $mysql->conectar();

    if ($editar == true) {

        $usuarios = $mysql->efectuarConsulta("UPDATE productos SET Nombre_producto = '$producto', Cantidad_producto = '$cantidad' , Imagen_producto = '$guardar_imagen'  WHERE Id_producto = '$id'");

        //Desconectar de la base de datos para liberar memoria

        $mysql->desconectar();

        //Capturar los resultados de la consulta en una fila

        header("Location: ../Productos.php");
    } else {

        header("Location: ../error.php");
    }
} else {
    header("Location: ../error.php");
}
