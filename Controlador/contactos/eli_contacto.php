<link rel="stylesheet" href="../../Libs/sweetalert/sweetalert.css">
<script src="../../Libs/sweetalert/sweetalert.min.js"></script>
<script src="../../Libs/jquery.min.js"></script>
<?php
require_once('../../Modelo/cls_contacto.php');
$objc = new contacto();
$result = $objc->eliminar($_POST['codigo']);
if ($result) {
    echo "<script>jQuery(function(){swal({
            title: 'Borrar Contacto', text:'Registro Eliminado', type:'success', comfirmButtomText:'Aceptar'
        }, function(){location.href='../../Vista/Contactos/contactos.php?valor=" . $_POST['txt_cod_persona'] . "';})});</script>";
} else {
    echo "<script>jQuery(function(){swal({
            title: 'Borrar Contacto', text:'Error al Eliminar!', type:'danger', comfirmButtomText:'Aceptar'
        }, function(){location.href='../../Vista/Contactos/contactos.php?valor=" . $_POST['txt_cod_persona'] . "';})});</script>";
}
?>