<?php
require('../../conexion/conexion.php');
ob_start();
session_start();
if (!$_SESSION['exito']) {
    header("location:../Login/login.php");
}
/*consulta para traerme los proveedores*/
if (isset($_GET['id_eliminar_producto'])) {
    $id_delete = (int) $_GET['id_eliminar_producto'];
    $query = "SELECT * FROM tb_productos WHERE id_producto=$id_delete LIMIT 1";
    $query_excecute = $conexion->query($query);
    $filas = $query_excecute->fetch_assoc();
} else {
    echo "<div class=\"container\">
            <div class=\"alert alert-success\" role=\"alert\">
                el producto no existe
            </div>
        </div>";
    header("refresh:2;url=../Mostrar/mostrar_productos.php");
}
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Eliminar producto</title>
</head>
<style>
    .info {
        display: inline;
        font-weight: bold;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                <div class="justify-content-between mb-4">
                    <h1>Eliminar producto</h1><br>
                    Nombre: <div class="info"><?php echo $filas['nombre']; ?></div><br>
                    Precio: <div class="info"><?php echo $filas['precio']; ?></div><br>
                    Marca: <div class="info"><?php echo $filas['marca']; ?></div><br>
                    Cantidad: <div class="info"><?php echo $filas['cantidad']; ?></div><br>
                    Referencia: <div class="info"><?php echo $filas['referencia']; ?></div><br><br>
                    <form action="../../variables/variables_registro_productos.php?id_eliminar_producto=<?php echo $filas['id_producto']; ?>" method="post">
                        <button class="btn btn-danger" type="submit" name="eliminar_producto">Eliminar</button>
                        <a href="../Mostrar/mostrar_productos.php" class="btn btn-primary" role="button">Regresar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>