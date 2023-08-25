<link rel="stylesheet" href="../../Libs/sweetalert/sweetalert.css">
<script src="../../Libs/sweetalert/sweetalert.min.js"></script>
<script src="../../Libs/jquery.min.js"></script>
<?php
require_once("../../Modelo/cls_persona.php");
$objp = new persona();
$result = $objp->insertar(
    $_POST['txt_cedula'],
    $_POST['txt_nombre'],
    $_POST['txt_apellido'],
    $_POST['txt_direccion'],
    $_POST['txt_telefono'],
    $_POST['txt_usuario'],
    $_POST['txt_clave']
);
if ($result) {
    echo "<script>jQuery(function(){swal({
        title: 'Guardar Persona', text:'Registro Guardado', type:'success', comfirmButtomText:'Aceptar'
    }, function(){location.href='../../Vista/Personas/personas.html';})});</script>";
} else {
    echo "<script>jQuery(function(){swal({
        title: 'Guardar Persona', text:'Error al Guardar!', type:'danger', comfirmButtomText:'Aceptar'
    }, function(){location.href='../../Vista/Personas/personas.html';})});</script>";
}

?>