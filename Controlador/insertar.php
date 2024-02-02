<?php
//Comprobar datos
if (
    (isset($_POST['user']) && !empty($_POST['user'])) &&
    (isset($_POST['pass']) && !empty($_POST['pass']))
) {

    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables


    $user = $_POST['user'];
    $pass = hash('SHA256', $_POST['pass']);



    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();

    $editar = true;

    $consulta = $mysql->efectuarConsulta("select * from usuarios");


    while ($fila = mysqli_fetch_array($consulta)) {


        if ($user ==  $fila[1]) {
            $editar = false;
        }
    }
    $mysql->desconectar();

    $mysql->conectar();

    if ($editar == true) {
        //Realizo la consulta con mis comandos
        $usuarios = $mysql->efectuarConsulta("  INSERT INTO usuarios (Id_usuario, Correo_usuario, Pass_usuario,Estado_usuario) VALUES (NULL, '$user','$pass',1)
    ");

        //Desconectar de la base de datos para liberar memoria

        $mysql->desconectar();

        //Capturar los resultados de la consulta en una fila

        header("Location: ../dashboard.php");
    } else {

        header("Location: ../Register.php?Error=true&Mensaje=Este usuario ya existe");
    }
} else {

    header("Location: ../formulario.php");
}
