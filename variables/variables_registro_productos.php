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
    if (isset($_POST['actualizar_producto'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $cantidad = $_POST['cantidad'];
        $referencia = $_POST['ref'];

        if (!empty($nombre) && !empty($precio) && !empty($marca) && !empty($cantidad) && !empty($referencia)) {
            try {
                $id_prod = (int) $_GET['id_editar_producto'];

                $query = "UPDATE tb_productos SET nombre='$nombre',precio='$precio',marca='$marca',cantidad='$cantidad',referencia='$referencia' WHERE id_producto='$id_prod'";

                $query_excecute = $conexion->query($query);
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el producto se ha actualizado correctamente
                        </div>
                    </div>";
                header("refresh:2;url=../vistas/Mostrar/mostrar_productos.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el producto no se ha actualizado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:2;url=../vistas/Mostrar/mostrar_productos.php");
            }
        } else {
            echo "<div class=\"container\">
                    <div class=\"alert alert-danger\" role=\"alert\">
                        Faltaron campos por rellenar
                    </div>
                </div>" . $th;
            header("refresh:3;url=../vistas/Mostrar/mostrar_productos.php");
        }
    }else if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $cantidad = $_POST['cantidad'];
        $referencia = $_POST['ref'];

        if (!empty($nombre) && !empty($precio) && !empty($marca) && !empty($cantidad) && !empty($referencia)) {
            try {
                $query = "INSERT INTO tb_productos(nombre,precio,marca,cantidad,referencia) VALUES('$nombre','$precio','$marca','$cantidad','$referencia')";

                $insertar = $conexion->query($query);
                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el producto se ha agregado correctamente
                        </div>
                    </div>";
                header("refresh:3;url=../vistas/Crear/crearProducto.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el producto no se ha agregado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:3;url=../vistas/Crear/crearProducto.php");
            }
        } else {
            echo "<div class=\"container\">
                    <div class=\"alert alert-danger\" role=\"alert\">
                        Faltaron campos por rellenar
                    </div>
                </div>" . $th;
            header("refresh:3;url=../vistas/Crear/crearProducto.php");
        }
    } else if (isset($_POST['eliminar_producto'])) {
        try {
            $id_p = (int) $_GET['id_eliminar_producto'];
            $query = "DELETE FROM tb_productos WHERE id_producto=$id_p LIMIT 1";
            $query_excecute = $conexion->query($query);

            echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            El producto se ha eliminado correctamente
                        </div>
                    </div>";
            header("refresh:2;url=../vistas/Mostrar/mostrar_productos.php");
        } catch (\Throwable $th) {
            echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                           El producto no se ha eliminado correctamente
                        </div>
                    </div>" . $th;
            header("refresh:3;url=../vistas/Mostrar/mostrar_productos.php");
        }
    }
    ?>
</body>

</html>