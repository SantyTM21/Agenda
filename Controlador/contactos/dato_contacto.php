<?php
require_once('../../Modelo/cls_contacto.php');
$objc = new contacto();
$row = $objc->ConsultarDato($_POST['valor']);
$datos = json_encode(array("nombre" => $row['nom_contacto'], "apellido" => $row['ape_contacto'], "tel" => $row['tel_contacto'], "correo" => $row['correo_contacto']));
echo $datos;
