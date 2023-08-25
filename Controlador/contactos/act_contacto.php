<link rel="stylesheet" href="../../Libs/sweetalert/sweetalert.css">
<script src="../../Libs/sweetalert/sweetalert.min.js"></script>
<script src="../../Libs/jquery.min.js"></script>
<?php
require_once("../../Modelo/cls_contacto.php");
$objc = new contacto();
$result = $objc->actualizar(
    $_POST['txt_nombre'],
    $_POST['txt_apellido'],
    $_POST['txt_telefono'],
    $_POST['txt_correo'],
    $_POST['txt_cod_contacto']
);
if ($result) {
    echo "<script>jQuery(function(){swal({
        title: 'Editar Contacto', text:'Registro Actualizado', type:'success', comfirmButtomText:'Aceptar'
    }, function(){location.href='../../Vista/Contactos/contactos.php?valor=" . $_POST['txt_cod_persona'] . "';})});</script>";
} else {
    echo "<script>jQuery(function(){swal({
        title: 'Guardar Contacto', text:'Error al Actualizar!', type:'danger', comfirmButtomText:'Aceptar'
    }, function(){location.href='../../Vista/Contactos/contactos.php?valor=" . $_POST['txt_cod_persona'] . "';})});</script>";
}

?>