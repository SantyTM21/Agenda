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
    <title>Contacto</title>
    <link rel="stylesheet" href="../../Libs/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Libs/style.css" />
    <script src="../../Libs/ajax.js"></script>
    <script src="../../Libs/jquery.min.js"></script>
    <script src="../../Libs/bootstrap/bootstrap.min.js"></script>
</head>

<body onload="buscar_contactos('', <?php echo $_GET['valor']; ?>)">
    <div class="alert alert-light">
        <h2 class="text-primary">Gestión de contactos de: <b><?php echo $row['nom_persona'] . ' ' . $row['ape_persona']; ?></b></h2>
        <button class="btn btn-success" onclick="location.href='contacto.php?valor=<?php echo $_GET['valor']; ?>'">Nuevo</button>
        <button class="btn btn-success" onclick="reporte_contacto(<?php echo $_GET['valor']; ?>)">Reporte</button>
        <button class="btn btn btn-secondary" onclick="location.href='../Personas/personas.html'">Volver</button>
    </div>
    <div class="alert alert-info bg-success-subtle">
        <h3>Buscar:</h3>
        <div class="form-row">
            <label class="col-4">Nombre o Apellido </label>
            <input class="form-control col-5 mt-1" type="text" id="txt_buscar" name="txt_buscar" onkeyup="buscar_contactos(this.value, <?php echo $_GET['valor']; ?>)" />
        </div>
    </div>
    <table id="tabla" name="tabla" class="table table-bordered">
        <thead class="bg-primary text-light text-center">
            <th>N.</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
    </table>

    <!-- Modal -->

    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../Controlador/contactos/eli_contacto.php" method="post">
                        <input type="text" hidden id="codigo" name="codigo" />
                        <div class="container">
                            <div class="row">
                                <label><b>Nombre: </b></label><input type="text" id="txt_nombre" name="txt_nombre" class="form-control" />
                            </div>
                            <div class="row">
                                <label><b>Apellido: </b></label><input type="text" id="txt_apellido" name="txt_apellido" class="form-control" />
                            </div>
                            <div class="row">
                                <label><b>Teléfono: </b></label><input type="text" id="txt_tel" name="txt_tel" class="form-control" />
                            </div>
                            <div class="row">
                                <label><b>Correo: </b></label><input type="mail" id="txt_correo" name="txt_correo" class="form-control" />
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-center">
                                    <span class="text-danger text-center h3">¿Está seguro de eliminar el registro?</span>
                                </div>
                            </div>
                            <input type="text" hidden id="txt_cod_persona" name="txt_cod_persona" value="<?php echo $_GET['valor']; ?>"></input>
                            <div class="row mt-5">
                                <div class="col-12 text-center">
                                    <button type="submit" id="btn_eliminar" name="btn_eliminar" class="btn btn-danger text-light">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Reporte -->
    <div class="modal fade" id="reporteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="../../reportes/reporte_contacto.pdf" name="visor" id="visor"></iframe>
                </div>
                <div class="modal-footer">
                    <a href="../../reportes/reporte_contacto.pdf" download="reporte_contacto.pdf" class="btn btn-primary">Descargar PDF</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>