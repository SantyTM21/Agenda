<?php
require_once('../../Modelo/cls_persona.php');
$obj = new persona();
$row = $obj->vcedula($_POST['valor']);
if (isset($row['ci_persona'])) {
    $texto = true;
} else {
    $texto = false;
}
echo $texto;
