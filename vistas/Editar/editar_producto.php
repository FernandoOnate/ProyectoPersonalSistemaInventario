<?php
require('../../conexion/conexion.php');
/*consulta sql*/
if (isset($_GET['id_editar_producto'])) {
    $id_prod = (int) $_GET['id_editar_producto'];
    $query = "SELECT * FROM tb_productos where id_producto = $id_prod LIMIT 1";
    $query_excecute = $conexion->query($query);
    $filas = $query_excecute->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Actualizar producto</title>
</head>

<body><br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <h1>Editar producto</h1><br>
                    <form action="../../variables/variables_registro_productos.php?id_editar_producto=<?php echo $_GET['id_editar_producto']; ?>" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label class="form-label" for="txtNombre">Nombre del producto</label>
                            <input class="form-control" type="text" placeholder="Ingrese el nombre" id="txtNombre" name="nombre" value=<?php echo $filas['nombre']; ?> required />
                            <div class="valid-feedback">Nombre ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtIde">Precio</label>
                            <input class="form-control" type="number" placeholder="Ingrese el precio" id="txtIde" name="precio" value=<?php echo $filas['precio']; ?> required />
                            <div class="valid-feedback">Precio ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un precio.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtDir">Marca</label>
                            <input class="form-control" type="text" placeholder="Ingrese la marca" id="txtDir" name="marca" value=<?php echo $filas['marca']; ?> required />
                            <div class="valid-feedback">Marca ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una marca.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtTel">Cantidad</label>
                            <input class="form-control" type="number" placeholder="Ingrese la cantidad" id="txtTel" name="cantidad" value=<?php echo $filas['cantidad']; ?> required />
                            <div class="valid-feedback">Cantidad ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una cantidad.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtCod">Referencia</label>
                            <input class="form-control" type="text" placeholder="Ingrese la referencia" id="txtCod" name="ref" value=<?php echo $filas['referencia']; ?> required />
                            <div class="valid-feedback">Referencia ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una referencia.</div><br>
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-success fw-bold" type="submit" name="actualizar_producto">Actualizar producto</button>
                            <?php
                            if (isset($_REQUEST['id_editar_producto'])) {
                                echo "<a class=\"btn btn-primary fw-bold\" href=\"../Mostrar/mostrar_productos.php\">Regresar</a>";
                            } ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>