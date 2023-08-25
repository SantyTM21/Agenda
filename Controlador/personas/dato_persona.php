<?php
require_once('../../Modelo/cls_persona.php');
$objp = new persona();
$row = $objp->ConsultarDato($_POST['valor']);
$datos = json_encode(array("cedula" => $row['ci_persona'], "nombre" => $row['nom_persona'], "apellido" => $row['ape_persona']));
echo $datos;
