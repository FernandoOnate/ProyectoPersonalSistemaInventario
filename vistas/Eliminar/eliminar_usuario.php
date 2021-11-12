<?php
require('../../conexion/conexion.php');
ob_start();
session_start();
if (!$_SESSION['exito']) {
    header("location:../Login/login.php");
}
/*consulta para traerme los usuarios*/
if (isset($_GET['id_eliminar_usuario'])) {
    $id_delete = (int) $_GET['id_eliminar_usuario'];
    $query = "SELECT * FROM tb_usuarios WHERE id_usuario=$id_delete LIMIT 1";
    $query_excecute = $conexion->query($query);
    $filas = $query_excecute->fetch_assoc();
} else {
    echo "<div class=\"container\">
            <div class=\"alert alert-success\" role=\"alert\">
                el usuario no existe
            </div>
        </div>";
    header("refresh:2;url=../Mostrar/mostrar_usuarios.php");
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

    <title>Eliminar usuario</title>
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
                    <h1>Eliminar usuario</h1><br>
                    Nombre: <div class="info"><?php echo $filas['nombre']; ?></div> <br>
                    Apellidos: <div class="info"><?php echo $filas['apellidos']; ?></div> <br>
                    Correo: <div class="info"><?php echo $filas['correo']; ?></div><br>
                    Identificación: <div class="info"></div> <?php echo $filas['identificacion']; ?><br>
                    Dirección: <div class="info"><?php echo $filas['direccion']; ?></div> <br>
                    Teléfono: <div class="info"><?php echo $filas['telefono']; ?></div> <br>
                    Contraseña: <div class="info"> <?php echo $filas['clave']; ?></div><br>
                    Código de usuario: <div class="info"> <?php echo $filas['codigo_usuario']; ?></div><br><br>
                    <form action="../../variables/variables_registro_usuarios.php?id_eliminar_usuario=<?php echo $filas['id_usuario']; ?>" method="post">
                        <button class="btn btn-danger" type="submit" name="eliminar_usuario">Eliminar</button>
                        <a href="../Mostrar/mostrar_usuarios.php" class="btn btn-primary" role="button">Regresar</a>
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