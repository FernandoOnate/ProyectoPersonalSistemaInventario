<?php
require('../../conexion/conexion.php');
/*consulta 3*/
if (isset($_GET['id_editar_usuario'])) {
    $id_usuario = (int) $_GET['id_editar_usuario'];
    $query = "SELECT * FROM tb_usuarios where id_usuario = $id_usuario LIMIT 1";
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
    <title>Editar usuario</title>
</head>

<body><br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <h1>Editar usuario</h1><br>
                    <form action="../../variables/variables_registro_usuarios.php?id_editar_usuario=<?php echo $_GET['id_editar_usuario']; ?>" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label class="form-label" for="txtNombre">Nombre</label>
                            <input class="form-control" type="text" placeholder="Ingrese su nombre" id="txtNombre" name="name" value=<?php echo $filas['nombre']; ?> required />
                            <div class="valid-feedback">Nombre ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtApellido">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Ingrese su apellidos" id="txtApellido" name="last_name" value=<?php echo $filas['apellidos']; ?> required />
                            <div class="valid-feedback">Apellido ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un Apellido.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtCorreo">Correo</label>
                            <input class="form-control" type="email" placeholder="Ingrese su correo" id="txtCorreo" name="mail" value=<?php echo $filas['correo']; ?> required />
                            <div class="valid-feedback">Correo ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un correo.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtIde">Identificaci??n</label>
                            <input class="form-control" type="number" placeholder="Ingrese su c??dula" id="txtIde" name="ide" value=<?php echo $filas['identificacion']; ?> required />
                            <div class="valid-feedback">Identificaci??n ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una identificaci??n.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtDir">Direcci??n</label>
                            <input class="form-control" type="text" placeholder="Ingrese su direcci??n" id="txtDir" name="address" value=<?php echo $filas['direccion']; ?> required />
                            <div class="valid-feedback">Direcci??n ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una direcci??n.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtTel">Tel??fono</label>
                            <input class="form-control" type="number" placeholder="Ingrese su tel??fono" id="txtTel" name="phone" value=<?php echo $filas['telefono']; ?> required />
                            <div class="valid-feedback">Tel??fono ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un tel??fono.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtPass">Contrase??a</label>
                            <input class="form-control" type="password" placeholder="Ingrese una contrase??a" id="txtPass" name="pass" value=<?php echo $filas['clave']; ?> required />
                            <div class="valid-feedback">Contrase??a ok!</div>
                            <div class="invalid-feedback">Por favor ingrese una contrase??a.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="txtCod">C??digo de usuario</label>
                            <input class="form-control" type="text" placeholder="Ingrese un c??digo" id="txtCod" name="user_code" value=<?php echo $filas['codigo_usuario']; ?> required />
                            <div class="valid-feedback">C??digo ok!</div>
                            <div class="invalid-feedback">Por favor ingrese un c??digo.</div>
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-success fw-bold" type="submit" name="editar_usuario">Actualizar usuario</button>
                            <?php
                            if (isset($_REQUEST['id_editar_usuario'])) {
                                echo "<a class=\"btn btn-primary fw-bold\" href=\"../Mostrar/mostrar_usuarios.php\">Regresar</a>";
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