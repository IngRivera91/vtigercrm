<?php
$typeAlert = "danger";
$messageAlert = "Error al crear contacto.";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>External Form</title>
</head>
<body>
<br>
<?php if (isset($_GET['create'])){ ?>
<?php if($_GET['create'] == "success") $typeAlert = "success" ?>
<?php if($_GET['create'] == "success") $messageAlert = "Contacto Creado." ?>
    <div class="row justify-content-md-center">
        <div class="col-4">
            <div class="alert alert-<?php echo $typeAlert ?> alert-dismissible fade show" role="alert">
                <?php echo $messageAlert ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php } // end if (isset($_GET['mensaje'])) ?>
<br>
    <div class="container-fluid">
        <form id="form" name="form" action="FormController.php" method="POST">
            <div class="row justify-content-md-center ">
                <div class="col-4 bg-light" style="border-radius: 5px;">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Telefono</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Telefono" required>
                    </div>
                    <a onclick="validaFormulario()" class="btn btn-primary">Enviar</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>