<?php
require_once('../../Modelo/cls_persona.php');
$objp = new persona();
$row = $objp->ConsultarDato($_GET['valor']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Persona</title>
    <link rel="stylesheet" href="../../Libs/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Libs/style.css" />
    <script src="../../Libs/ajax.js"></script>
    <script src="../../Libs/jquery.min.js"></script>
</head>

<body>
    <form action="../../Controlador/personas/act_persona.php" class="container mt-4 form-control" method="post">
        <input type="text" hidden id="txt_cod_persona" name="txt_cod_persona" value="<?php echo $row['cod_persona'] ?>">
        <div class="alert alert light">
            <h2 class="text-primary">Actualizar Persona</h2>
        </div>
        <div class="container-fluid">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cédula</label>
                <input type="text" class="form-control col-4" name="txt_cedula" id="txt_cedula" value="<?php echo $row['ci_persona'] ?>"" required />
            </div>
            <div class=" form-group row">
                <label class="col-sm-2 col-form-label">Nombres</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $row['nom_persona'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Apellidos</label>
                <input type="text" class="form-control col-4" name="txt_apellido" id="txt_apellido" value="<?php echo $row['ape_persona'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dirección</label>
                <input type="text" class="form-control col-4" name="txt_direccion" id="txt_direccion" value="<?php echo $row['dir_persona'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teléfono</label>
                <input type="text" class="form-control col-4" name="txt_telefono" id="txt_telefono" value="<?php echo $row['tel_persona'] ?>" />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Usuario</label>
                <input type="text" class="form-control col-4" name="txt_usuario" id="txt_usuario" value="<?php echo $row['usu_persona'] ?>" required />
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Clave</label>
                <input type="password" class="form-control col-4" name="txt_clave" id="txt_clave" value="<?php echo $row['cia_persona'] ?>" required />
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center">
                    <button type="submit" class="btn btn-success mt-3 col-sm-4 mb-2">Guardar</button>
                    <button type="button" class="btn btn btn-secondary mt-3 col-sm-3 mb-2" onclick="location.href='../Personas/personas.html'">Volver</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>