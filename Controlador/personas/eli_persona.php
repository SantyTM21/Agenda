<link rel="stylesheet" href="../../Libs/sweetalert/sweetalert.css">
<script src="../../Libs/sweetalert/sweetalert.min.js"></script>
<script src="../../Libs/jquery.min.js"></script>
<?php
require_once('../../Modelo/cls_persona.php');
$objp = new persona();
$result = $objp->eliminar($_POST['codigo']);
if ($result) {
    echo "<script>jQuery(function(){swal({
            title: 'Borrar Persona', text:'Registro Eliminado', type:'success', comfirmButtomText:'Aceptar'
        }, function(){location.href='../../Vista/Personas/personas.html';})});</script>";
} else {
    echo "<script>jQuery(function(){swal({
            title: 'Borrar Persona', text:'Error al Eliminar!', type:'danger', comfirmButtomText:'Aceptar'
        }, function(){location.href='../../Vista/Personas/personas.html';})});</script>";
}
?>