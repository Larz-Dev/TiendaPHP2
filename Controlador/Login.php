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
    $pass = hash('SHA256',$_POST['pass']);



    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();


    //Realizo la consulta con mis comandos
    $usuarios = $mysql->efectuarConsulta("SELECT * FROM usuarios WHERE Correo_usuario = '" . $user . "' and Pass_usuario = '" . $pass . "' and Estado_usuario = 1");


    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();

    //Capturar los resultados de la consulta en una fila

    $fila = mysqli_fetch_assoc($usuarios);


    //validar si se encuentran resultados

    if (mysqli_num_rows($usuarios) > 0) {

session_start();

require_once '../modelo/Usuarios.php';


$usuario = new Usuarios();

$usuario ->setUser($fila['Correo_usuario']);

$usuario ->setId($fila['Id_usuario']);



$_SESSION['usuario'] = $usuario;
$_SESSION['acceso'] = true;


header("Location: ../Dashboard.php");



    } else {

        header("Location: ../index.php?Error=true&Mensaje=Verifique su correo o contraseña");
    }
    
 
}
else{

    header("Location: ../index.php?Error=true&Mensaje=Verifique su correo o contraseña");
}
?>