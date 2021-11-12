<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Index</title>
</head><br><br><br>

<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
include("../conexion/conexion.php");
ob_start();
session_start();
if (isset($_POST['loguear'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['pass'];

    if (!empty($correo) && !empty($contraseña)) {
        try {
            $query = "SELECT id_usuario FROM tb_usuarios WHERE correo='$correo' and clave='$contraseña'";
            $query_excecute = $conexion->query($query);
            $filas = $query_excecute->fetch_assoc();
            
            if (count($filas)==1) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            Ha iniciado sesión.
                        </div>
                    </div>";
                $_SESSION['exito'] = $filas['id_usuario'];
                
                header("refresh:2;url=../index.php");
                exit();
            }else{
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            Correo o contraseña incorrectos
                        </div>
                    </div>" ;
                    exit();
                header("refresh:2;url=../vistas/Login/login.php");
            }
        } catch (\Throwable $th) {
            echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            Correo o contraseña incorrectos
                        </div>
                    </div>" . $th;
            
            header("refresh:2;url=../vistas/Login/login.php");
            exit();
        }
    } else {
        echo "<div class=\"container\">
                    <div class=\"alert alert-danger\" role=\"alert\">
                        Faltaron campos por rellenar
                    </div>
                </div>" . $th;
       
        header("refresh:3;url=../vistas/Login/login.php");
        exit();
    }
}
?>
</body>
</html>