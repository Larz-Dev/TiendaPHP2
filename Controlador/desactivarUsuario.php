<?php
//Comprobar datos
if (
    (isset($_POST['id']) && !empty($_POST['id']))

) {

    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables


    $id = $_POST['id'];




    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();


    //Realizo la consulta con mis comandos
    $consulta = $mysql->efectuarConsulta("select * from usuarios");

    $fila =[];
   
    while (mysqli_fetch_array($consulta)) { 

            if ($fila[3] != 1) {
                $usuarios = $mysql->efectuarConsulta("UPDATE Usuarios SET Estado_usuario = 0 WHERE Id_usuario = '$id'");
            
            }
           
        }
  


 


    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();

    //Capturar los resultados de la consulta en una fila




    //validar si se encuentran resultados
    header("Location: ../EstadoUsuarios.php");
}
