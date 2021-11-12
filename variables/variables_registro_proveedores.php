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
        if (isset($_POST['actualizar_proveedor'])) {
            $nombre = $_POST['razon'];
            $nit = $_POST['nit'];
            $correo = $_POST['correo'];
            $direccion = $_POST['dir'];
            $telefono = $_POST['tel'];

            if (!empty($nombre) && !empty($nit) && !empty($correo) && !empty($direccion) && !empty($telefono)) {
                try {
                    $id_prov = (int) $_GET['id_editar_proveedor'];

                    $query = "UPDATE tb_proveedores SET nombre='$nombre',nit='$nit',correo='$correo',direccion='$direccion',telefono='$telefono' WHERE id_proveedor='$id_prov'";

                    $query_excecute = $conexion->query($query);
                    echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el proveedor se ha actualizado correctamente
                        </div>
                    </div>";
                    header("refresh:2;url=../vistas/Mostrar/mostrar_proveedores.php");
                } catch (\Throwable $th) {
                    echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el proveedor no se ha actualizado correctamente
                        </div>
                    </div>" . $th;
                    header("refresh:2;url=../vistas/Mostrar/mostrar_proveedores.php");
                }
            } else {
                echo "<div class=\"container\">
            <div class=\"alert alert-danger\" role=\"alert\">
            Faltaron campos por rellenar
            </div></div>" . $th;
                header("refresh:2;url=../vistas/Mostrar/mostrar_proveedores.php");
            }
        }else if (isset($_POST['enviarp'])) {
            $nombre = $_POST['razon'];
            $nit = $_POST['nit'];
            $correo = $_POST['correo'];
            $direccion = $_POST['dir'];
            $telefono = $_POST['tel'];

            if (!empty($nombre) && !empty($nit) && !empty($correo) && !empty($direccion) && !empty($telefono)) {
                try {
                    $query = "INSERT INTO tb_proveedores(nombre,nit,correo,direccion,telefono) VALUES('$nombre','$nit','$correo','$direccion','$telefono')";

                    $insertar = $conexion->query($query);
                    echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            el proveedor se ha agregado correctamente
                        </div>
                    </div>";
                    header("refresh:2;url=../vistas/Crear/crearProveedor.php");
                } catch (\Throwable $th) {
                    echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            el proveedor no se ha agregado correctamente
                        </div>
                    </div>" . $th;
                    header("refresh:2;url=../vistas/Crear/crearProveedor.php");
                }
            } else {
                echo "<div class=\"container\">
                    <div class=\"alert alert-danger\" role=\"alert\">
                        Faltaron campos por rellenar
                    </div>
                </div>" . $th;
                header("refresh:2;url=../vistas/Crear/crearProveedor.php");
            }
        }else if (isset($_POST['eliminar_proveedor'])) {
            try {

                $id_p = (int) $_GET['id_eliminar_proveedor'];
                $query = "DELETE FROM tb_proveedores WHERE id_proveedor=$id_p LIMIT 1";
                $query_excecute = $conexion->query($query);

                echo "<div class=\"container\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            El proveedor se ha eliminado correctamente
                        </div>
                    </div>";
                header("refresh:2;url=../vistas/Mostrar/mostrar_proveedores.php");
            } catch (\Throwable $th) {
                echo "<div class=\"container\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                           El proveedor no se ha eliminado correctamente
                        </div>
                    </div>" . $th;
                header("refresh:3;url=../vistas/Mostrar/mostrar_proveedores.php.php");
            }
        }
        ?>
 </body>

 </html>