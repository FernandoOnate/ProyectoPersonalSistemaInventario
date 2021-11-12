<?php
require('conexion/conexion.php');
ob_start();
session_start();
if (!isset($_SESSION['exito'])) {
    header("location:vistas/Login/login.php");
    exit();
} else {
    $user_id = $_SESSION['exito'];
    $query = "SELECT * FROM tb_usuarios WHERE id_usuario='$user_id'";
    $query_excecute = $conexion->query($query);
    $resultado = $query_excecute->fetch_assoc();
}
$ruta = "index";
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Index</title>
</head>

<body><br><br>
    <div class="container">
        <div class="row">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                <div class="justify-content-between mb-4">
                    <h1>Bienvenido <?php echo $resultado['nombre']; ?>, elige una opción</h1><br>
                    <a href="vistas/Mostrar/mostrar_clientes.php?r=<?php echo $ruta; ?>" class="btn btn-primary" role="button">Mostrar clientes</a>
                    <a href="vistas/Mostrar/mostrar_usuarios.php?r=<?php echo $ruta; ?>" class="btn btn-primary" role="button">Mostrar usuarios</a>
                    <a href="vistas/Mostrar/mostrar_productos.php?r=<?php echo $ruta; ?>" class="btn btn-primary" role="button">Mostrar productos</a>
                    <a href="vistas/Mostrar/mostrar_proveedores.php?r=<?php echo $ruta; ?>" class="btn btn-primary" role="button">Mostrar proveedores</a>
                    <a href="conexion/cerrar_conexxion.php" class="btn btn-danger" role="button">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>