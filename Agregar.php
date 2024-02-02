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

<p></p>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">


                            <div class="col-lg-6 d-none d-lg-block" id="cargarimagen">

                            </div>



                            <div class="col-lg-6">
                                <div class="mt-2 px-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Agregar Producto</h1>
                                    </div>
                                    <form class="user" form action="controlador/insertarproducto.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user" name="producto" aria-describedby="emailHelp" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user" name="cantidad" placeholder="Cantidad">
                                        </div>
                                        <div class="form-group">




                                            <div class="" id="accordionExample">
                                                <div class="accordion-item">

                                                
                                                    <h2 class="accordion-header">
                                                        <button class="btn btn-primary btn-user btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Subir imagen
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="  accordion-collapse collapse show" data-bs-parent="#accordionExample">

                                                        <div class="accordion-body mtb1 mt-2">
                                                            Ruta: <input  value="" id="imagen" onchange="cargarimagen(value)" type="text" class="form-control form-control-user" name="imagenurl" placeholder="URL Imagen">

                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div id="collapseOne" class="  accordion-collapse collapse show" data-bs-parent="#accordionExample">

                                                        <div class="accordion-body">
                                                            Imagen local:
                                                            <input id="archivoima" value="" type="file" accept="image/*" onchange="cargararchivo(value)" class="btn btn-primary btn-user btn-block" name="file" placeholder="URL Imagen">

                                                        </div>
                                                        <br>
                                                    </div>

                                                </div>

                                           
                                                <script>
                                                let imagen = document.getElementById("imagen");
                                                let url = imagen.value
                                           
                                                function cargarimagen(value) {
                                                    document.getElementById("archivoima").value = null;  
                                                 if(value == ""){

                                                    document.getElementById("cargarimagen").innerHTML = ""

                                                 }else{

                                                    document.getElementById("cargarimagen").innerHTML = `<img src="${value}" class="col-lg-12 ml-3 mt-5 d-none d-lg-block rounded-5">`;

                                                 }
                                                }

                                                function cargararchivo(value) {
                                                    document.getElementById("imagen").value = "";  
                                                    
let archivoima = document.getElementById("archivoima");

const archivo = archivoima.files[0];



    const reader = new FileReader();
   
    reader.onload=function(e) {
        document.getElementById("cargarimagen").innerHTML = `<img src="${this.result}" class="col-lg-12 ml-3 mt-5 d-none d-lg-block rounded-5">`;

};
reader.readAsDataURL(archivo);





}
                                                
                                            </script>




                                                <input required required hidden class=" form-control rounded-2 "  value="<?php echo $id ?>" type="text" name="autor">

                                            </div>

                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="Agregar">

                                </div>

                                </form>

                                <form class="user px-5" action="Productos.php" method="post">


                                    <input class="btn btn-primary btn-user btn-block" type="submit" value="Regresar">

                                </form>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


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