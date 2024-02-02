<?php


require_once 'Modelo/Usuarios.PHP';


session_start();



$usuario = new Usuarios();

$usuario = $_SESSION['usuario'];


if ($_SESSION['acceso'] == true && $_SESSION['usuario'] != null) {


    $user = $usuario->getUser();
    $id = $usuario->getId();
} else {
    header("Location: ./index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrarse</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                 
                <div class="col-lg-5 d-none d-lg-block">       <img src="./img/Registro.jpeg" width="500" class=" ml-4 mt-5 img-fluid rounded border border-2 rounded-5">
                         </div>
                 
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Agregar usuario</h1>
                            </div>
                            <form class="user" action="controlador/insertar.php" method="post">

                                <div class="form-group">
                                    <input required type="email" class="form-control form-control-user" name="user" placeholder="Correo Electronico">
                                </div>
                              
                              
                              
                                <div class="form-group">
                                    <div>
                                        <input required type="password" class="form-control form-control-user" name="pass" placeholder="Contraseña">
                                    </div>

                                </div>
  <hr>
                                <input required class="btn btn-primary btn-user btn-block" type="submit" value="Agregar">


                            </form>

                            <form class="user pt-2" action="Productos.php" method="post">


                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Regresar">

                            </form>
                          

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        if (<?php echo ($_GET['Error']) ?> == true) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "<?php echo ($_GET['Mensaje']) ?>",
              
            });

        }
    </script>


</body>

</html>