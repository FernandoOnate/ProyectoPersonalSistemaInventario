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
    if (isset($_POST['editar_usuario'])) {
        $nombre = $_POST['name'];
        $apellidos = $_POST['last_name'];
        $correo = $_POST['mail'];
        $identificacion = $_POST['ide'];
        $telefono = $_POST['phone'];
        $direccion = $_POST['address'];
        $contraseña = $_POST['pass'];
        $codigo_u = $_POST['user_code'];

        if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($identificacion) && !empty($codigo_u) && !empty($telefono) && !empty($contraseña) && !empty($direccion)) {
            try {
                $id_usuario = (int) $_GET['id_editar_usuario'];

                $querya = "UPDATE tb_usuarios SET nombre='$nombre',apellidos='$apellidos',correo='$correo',identificacion='$identificacion',direccion='$direccion',telefono='$telefono',clave='$contraseña',codigo_usuario='$codigo_u' WHERE id_usuario='$id_usuario'";

                $resultac = $conexion->query($querya);
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el usuario se ha actualizado correctamente
                        </div>
                    </div>";
                header("refresh:2;url=../vistas/Mostrar/mostrar_usuarios.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el usuario no se ha actualizado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:2;url=../vistas/Mostrar/mostrar_usuarios.php");
            }
        } else {
            echo "<div class=\"container\">
            <div class=\"alert alert-danger\" role=\"alert\">
            Faltaron campos por rellenar
            </div></div>" . $th;
            header("refresh:2;url=../vistas/Mostrar/mostrar_usuarios.php");
        }
    } else if (isset($_POST['enviar'])) {
        $nombre = $_POST['name'];
        $apellidos = $_POST['last_name'];
        $correo = $_POST['mail'];
        $identificacion = $_POST['ide'];
        $telefono = $_POST['phone'];
        $direccion = $_POST['address'];
        $contraseña = $_POST['pass'];
        $codigo_u = $_POST['user_code'];

        if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($identificacion) && !empty($codigo_u) && !empty($telefono) && !empty($contraseña) && !empty($direccion)) {
            try {
                $query = "INSERT INTO tb_usuarios(nombre,apellidos,correo,identificacion,direccion,telefono,clave,codigo_usuario) VALUES('$nombre','$apellidos','$correo','$identificacion','$direccion','$telefono','$contraseña','$codigo_u')";

                $insertar = $conexion->query($query);
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el usuario se ha agregado correctamente
                        </div>
                    </div>";
                header("refresh:3;url=../vistas/Crear/crearUsuario.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el usuario no se ha agregado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:3;url=../vistas/Crear/crearUsuario.php");
            }
        } else {
            echo "<div class=\"container\">
            <div class=\"alert alert-danger\" role=\"alert\">
            Faltaron campos por rellenar
            </div></div>" . $th;
            header("refresh:3;url=../vistas/Crear/crearUsuario.php");
        }
    }else if (isset($_POST['eliminar_usuario'])) {
        try {

            $id_d = (int) $_GET['id_eliminar_usuario'];
            $query = "DELETE FROM tb_usuarios WHERE id_usuario=$id_d LIMIT 1";
            $query_excecute = $conexion->query($query);

            echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el usuario se ha eliminado correctamente
                        </div>
                    </div>";
            header("refresh:2;url=../vistas/Mostrar/mostrar_usuarios.php");
        } catch (\Throwable $th) {
            echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el usuario no se ha eliminado correctamente
                        </div>
                    </div>" . $th;
            header("refresh:3;url=../vistas/Mostrar/mostrar_usuarios.php.php");
        }
    }
    ?>
</body>

</html>