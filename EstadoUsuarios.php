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

    <title>Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tienda PHP</div>
            </a>

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

<!-- Nav Item - Productos -->
<li class="nav-item">
    <a class="nav-link" href="Productos.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Productos</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Usuarios -->
<li class="nav-item">
    <a class="nav-link" href="Dashboard.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Usuarios</span></a>
        <!-- Divider -->
<hr class="sidebar-divider">
</li>
 <!-- Nav Item - Agregar -->
 <li class="nav-item">
    <a class="nav-link" href="Agregar.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Agregar Producto</span></a>
</li>
<hr class="sidebar-divider">
</li>
 <!-- Nav Item - Agregar -->
 <li class="nav-item">
    <a class="nav-link" href="Register.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Registrar Usuario</span></a>
</li>
<hr class="sidebar-divider">
</li>
 <!-- Nav Item - Agregar -->
 <li class="nav-item">
    <a class="nav-link" href="EstadoProductos.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Estado Producto</span></a>
</li>
<hr class="sidebar-divider">
</li>
 <!-- Nav Item - Agregar -->
 <li class="nav-item">
    <a class="nav-link" href="EstadoUsuarios.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Estado Usuario</span></a>
</li>
            



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Usuario: " . $user . " - Id: " . $id; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">



                                <div class="dropdown-divider"></div>

                                <form class="text-center" action="Controlador/cerrarsesion.php" method="post">

<p></p>
<input class="btn btn-success" type="submit" value="Cerrar Sesion">





</form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Estado Usuarios</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones:</th>
                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php






require_once 'Modelo/MySQL.PHP';
$mysql = new MySQL;
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT *
FROM usuarios
");
$mysql->desconectar();

for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
    $fila = mysqli_fetch_array($consulta);

    echo '<tr>

    <th scope="row">' . $fila[0] . '</th>
<td>' . $fila[1] . '</td>
<td>' . $fila[2] . '</td>

<td>' . $fila[3] . ' </td>

<td>   <form action="controlador/activarUsuario.php" method="post"> <input value=' . $fila[0] . ' type="hidden" name="id"> <button type="submit" Onclick="" class="btn form-control btn-success">Activar estado</button> </form></td>
<td>   <form action="controlador/desactivarUsuario.php" method="post"> <input value=' . $fila[0] . ' type="hidden" name="id"> <button type="submit" Onclick="" class="btn form-control btn-warning">Desactivar estado</button> </form></td>


</tr>';
}


?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tienda PHP 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona Cerrar si estas seguro</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="Index.php">Cerrar</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script>$(document).ready(function() {
    $('#dataTable').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    } );
} );</script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>