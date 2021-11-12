<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Procesando...</title>
</head>

<body><br><br><br>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php
    include("../conexion/conexion.php");

    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['ape'];
        $correo = $_POST['correo'];
        $identificacion = $_POST['cedula'];
        $telefono = $_POST['tel'];
        $direccion = $_POST['dir'];
        $contraseña = $_POST['contra'];

        if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($identificacion) && !empty($telefono) && !empty($contraseña) && !empty($direccion)) {
            try {
                $query = "INSERT INTO tb_clientes(nombre,apellidos,identificacion,correo,direccion,telefono,clave) VALUES('$nombre','$apellidos','$identificacion','$correo','$direccion','$telefono','$contraseña')";

                $insertar = $conexion->query($query);
                echo "<div class=\"container\">
            <div class=\"alert alert-success\" role=\"alert\">
            el cliente se ha agregado correctamente
            </div></div>";
                header("refresh:2;url=../vistas/Crear/crearCliente.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el cliente no se ha agregado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:3;url=../vistas/Crear/crearCliente.php");
            }
        } else {
            echo "<div class=\"container\">
            <div class=\"alert alert-danger\" role=\"alert\">
            Faltaron campos por rellenar
            </div></div>" . $th;
            header("refresh:2;url=../vistas/Crear/crearCliente.php");
        }
    } else if (isset($_POST['actualizar_cliente'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['ape'];
        $correo = $_POST['correo'];
        $identificacion = $_POST['cedula'];
        $telefono = $_POST['tel'];
        $direccion = $_POST['dir'];
        $contraseña = $_POST['contra'];

        if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($identificacion) && !empty($telefono) && !empty($contraseña) && !empty($direccion)) {
            try {
                $id_c = (int) $_GET['id_editar_cliente'];

                $query = "UPDATE tb_clientes SET nombre='$nombre',apellidos='$apellidos',identificacion='$identificacion',correo='$correo',direccion='$direccion',telefono='$telefono',clave='$contraseña' WHERE id_cliente='$id_c'";

                $query_run = $conexion->query($query);
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el cliente se ha actualizado correctamente
                        </div>
                    </div>";
                header("refresh:2;url=../vistas/Mostrar/mostrar_clientes.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el cliente no se ha actualizado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:2;url=../vistas/Mostrar/mostrar_clientes.php");
            }
        } else {
            echo "<div class=\"container\">
            <div class=\"alert alert-danger\" role=\"alert\">
            Faltaron campos por rellenar
            </div></div>" . $th;
            header("refresh:2;url=../vistas/Mostrar/mostrar_clientes.php");
        }
    } else if (isset($_POST['eliminar_cliente'])) {
        try {

            $id_d = (int) $_GET['id_eliminar_cliente'];
            $query = "DELETE FROM tb_clientes WHERE id_cliente=$id_d LIMIT 1";
            $query_excecute = $conexion->query($query);

            echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            El cliente se ha eliminado correctamente
                        </div>
                    </div>";
            header("refresh:2;url=../vistas/Mostrar/mostrar_clientes.php");
        } catch (\Throwable $th) {
            echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            El cliente no se ha eliminado correctamente
                        </div>
                    </div>" . $th;
            header("refresh:2;url=../vistas/Mostrar/mostrar_clientes.php.php");
        }
    }
    ?>
</body>

</html>