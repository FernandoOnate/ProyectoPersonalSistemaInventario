<?php
require('../../conexion/conexion.php');
ob_start();
session_start();
if (!$_SESSION['exito']) {
    header("location:../Login/login.php");
}
$rows = false;
if (isset($_GET['b_usuario'])) {
    $buscar = $_GET['b_usuario'];
    $query = "SELECT * FROM tb_usuarios WHERE CONCAT(nombre,apellidos,correo,identificacion,direccion,telefono,clave,codigo_usuario) LIKE '%$buscar%'";
    $query_excetute = mysqli_query($conexion, $query);
    if (mysqli_num_rows($query_excetute) > 0) {
        while ($row = $query_excetute->fetch_array()) {
            $rows[] = $row;
        }
    } else {
        $rows = false;
    }
} else if (!isset($_GET['b_usuario'])) {
    /*consulta para traerme los usuarios*/
    $query = "SELECT * FROM tb_usuarios";
    $query_excetute = $conexion->query($query);
    while ($row = $query_excetute->fetch_array()) {
        $rows[] = $row;
    }
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

    <title>Ver usuarios</title>
</head>
<style>
    table {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                <div class="d-sm-flex justify-content-between mb-4">
                    <h1>Tabla de usuarios disponibles</h1>
                </div>
                <div class="d-flex m-auto ">
                    <div class="m-2">
                        <a href="../../index.php" class="btn btn-outline-primary" role="button">Ir al inicio</a>
                    </div>
                    <div class="m-2">
                        <a href="../Crear/crearUsuario.php" class="btn btn-success" role="button">Agregar nuevo</a>
                    </div>
                    <div class="m-2">
                        <form class="d-flex" action="" method="GET">
                            <input class="form-control me-2" name="b_usuario" type="search" placeholder="Buscar usuario" value="<?php if (isset($_GET['b_usuario'])) {
                                                                                                                                    echo $_GET['b_usuario'];
                                                                                                                                } ?>" />
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="m-2">
                        <a href="../../conexion/cerrar_conexxion.php" class="btn btn-danger" role="button">Cerrar sesi??n</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover caption-top">
                    <caption>Lista de usuarios</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Identificaci??n</th>
                            <th scope="col">Direcci??n</th>
                            <th scope="col">Tel??fono</th>
                            <th scope="col">Contrase??a</th>
                            <th scope="col">C??digo usuario</th>
                            <th scope="col" colspan="2">Acci??n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $v = 1;
                        if (!$rows && !isset($_GET['b_usuario'])) {
                            echo "
                            <tr>
                                <td colspan=\"10\">No hay usuarios en la base de datos.</td>
                            </tr>";
                        } else if (!$rows) {
                            echo "
                            <tr>
                                <td colspan=\"10\">No hay usuarios que conicidan con la b??squeda.</td>
                            </tr>";
                        } else {
                            foreach ($rows as $contenido) : ?>
                                <tr>
                                    <th scope="row"><?php echo $v; ?></th>
                                    <td><?php echo $contenido['nombre']; ?></td>
                                    <td><?php echo $contenido['apellidos']; ?></td>
                                    <td><?php echo $contenido['correo']; ?></td>
                                    <td><?php echo $contenido['identificacion']; ?></td>
                                    <td><?php echo $contenido['direccion']; ?></td>
                                    <td><?php echo $contenido['telefono']; ?></td>
                                    <td><?php echo $contenido['clave']; ?></td>
                                    <td><?php echo $contenido['codigo_usuario']; ?></td>
                                    <td>
                                        <a href="../Editar/editar_usuario.php?id_editar_usuario=<?php echo $contenido['id_usuario']; ?>" class="btn btn-success">Editar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="../Eliminar/eliminar_usuario.php?id_eliminar_usuario=<?php echo $contenido['id_usuario']; ?>" onclick="if(!confirm('Seguro que quieres borrar este cliente?'))
                                    return false" class="btn btn-danger">Eliminar
                                        </a>
                                    </td>
                                    <?php $v++; ?>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>