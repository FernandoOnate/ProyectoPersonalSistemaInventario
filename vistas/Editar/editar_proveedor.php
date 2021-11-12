<?php
require('../../conexion/conexion.php');
/*consulta 3*/
if (isset($_GET['id_editar_proveedor'])) {
    $id_prov = (int) $_GET['id_editar_proveedor'];
    $query = "SELECT * FROM tb_proveedores where id_proveedor = $id_prov LIMIT 1";
    $query_excecute = $conexion->query($query);
    $filas = $query_excecute->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Acualizar proveedor</title>
</head>

<body><br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <h1>Editar proveedor</h1><br>
                    <form action="../../variables/variables_registro_proveedores.php?id_editar_proveedor=<?php echo $_GET['id_editar_proveedor']; ?>" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label class="form-label" for="txtNombre">Nombre del proveedor</label>
                            <input class="form-control" type="text" placeholder="Ingrese el nombre" id="txtNombre" name="razon" value=<?php echo $filas['nombre']; ?> required />
                            <div class="valid-feedback">Nombre ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtIde">NIT</label>
                            <input class="form-control" type="number" placeholder="Ingrese el NIT" id="txtIde" name="nit" value=<?php echo $filas['nit']; ?> required />
                            <div class="valid-feedback">NIT ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un NIT.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtCorreo">Correo</label>
                            <input class="form-control" type="email" placeholder="Ingrese el correo" id="txtCorreo" name="correo" value=<?php echo $filas['correo']; ?> required />
                            <div class="valid-feedback">Correo ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un correo.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="txtDir">Dirección</label>
                            <input class="form-control" type="text" placeholder="Ingrese la dirección" id="txtDir" name="dir" value=<?php echo $filas['direccion']; ?> required />
                            <div class="valid-feedback">Dirección ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una dirección.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtTel">Teléfono</label>
                            <input class="form-control" type="number" placeholder="Ingrese el teléfono" id="txtTel" name="tel" value=<?php echo $filas['telefono']; ?> required />
                            <div class="valid-feedback">Teléfono ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un teléfono.</div><br>
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-success fw-bold" type="submit" name="actualizar_proveedor">Agregar proveedor</button>
                            <?php
                            if (isset($_REQUEST['id_editar_proveedor'])) {
                                    echo "<a class=\"btn btn-primary fw-bold\" href=\"../Mostrar/mostrar_proveedores.php\">Regresar</a>";
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