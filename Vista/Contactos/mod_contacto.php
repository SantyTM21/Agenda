<?php
require_once('../../Modelo/cls_contacto.php');
$objc = new contacto();
$row = $objc->ConsultarDato($_GET['valor']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="../../Libs/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Libs/style.css" />
    <script src="../../Libs/ajax.js"></script>
    <script src="../../Libs/jquery.min.js"></script>
</head>

<body>
    <form action="../../Controlador/contactos/act_contacto.php" class="container mt-4 form-control" method="post">
        <input type="text" hidden id="txt_cod_contacto" name="txt_cod_contacto" value="<?php echo $row['cod_contacto'] ?>">
        <div class="alert alert light">
            <h2 class="text-primary">Actualizar Contacto</h2>
        </div>
        <div class="container-fluid">
            <div class=" form-group row">
                <label class="col-sm-2 col-form-label">Nombres</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $row['nom_contacto'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Apellidos</label>
                <input type="text" class="form-control col-4" name="txt_apellido" id="txt_apellido" value="<?php echo $row['ape_contacto'] ?>" />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teléfono</label>
                <input type="text" class="form-control col-4" name="txt_telefono" id="txt_telefono" value="<?php echo $row['tel_contacto'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Correo</label>
                <input type="text" class="form-control col-4" name="txt_correo" id="txt_correo" value="<?php echo $row['correo_contacto'] ?>" />
            </div>
            <input type="text" hidden id="txt_cod_persona" name="txt_cod_persona" value="<?php echo $_GET['codp']; ?>"></input>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center">
                    <button type="submit" class="btn btn-success mt-3 col-sm-4 mb-2">Guardar</button>
                    <button type="button" class="btn btn btn-secondary mt-3 col-sm-3 mb-2" onclick="location.href='../Contactos/contactos.php?valor=<?php echo $_GET['codp']; ?>'">Volver</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>