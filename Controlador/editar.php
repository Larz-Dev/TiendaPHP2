<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
//Comprobar datos
if (
    (isset($_POST['user']) && !empty($_POST['user']))
) {


    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables


    $user = $_POST['user'];
    $pass = hash('SHA256',$_POST['pass']);
    $id = $_POST['id'];
  


    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();


    //Realizo la consulta con mis comandos

    $editar =true;

    $consulta = $mysql->efectuarConsulta("select * from usuarios");
 

    while (   $fila = mysqli_fetch_array($consulta)) {
       
        
     
       
    }
    $mysql->desconectar();

    $mysql->conectar();

    if ($editar == true) {

      
if(!isset($_POST['pass']) && empty($_POST['pass'])){


    $usuarios = $mysql->efectuarConsulta("UPDATE usuarios SET Correo_usuario = '$user' WHERE Id_usuario = '$id'");


}else{


    $usuarios = $mysql->efectuarConsulta("UPDATE usuarios SET Correo_usuario = '$user', Pass_usuario = '$pass' WHERE Id_usuario = '$id'");


}




        //Desconectar de la base de datos para liberar memoria

        $mysql->desconectar();

        //Capturar los resultados de la consulta en una fila

        header("Location: ../Dashboard.php");
    } else {

        header("Location: ../error.php");

    }





} else {
    header("Location: ../error.php");
}