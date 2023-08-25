<?php
require_once("../../Modelo/cls_contacto.php");
$contacto = new contacto();
$result = $contacto->consultar($_POST['valor'], $_POST['cod']);

echo "<table id='tabla' name='tabla' class='table table-bordered table-striped'>
                <thead class='bg-primary text-light text-center'>
                    <th>N.</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>";

if (mysqli_num_rows($result) > 0) {
    $f = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td class='text-center'>$f</td>
                    <td>{$row['nom_contacto']}</td>
                    <td>{$row['ape_contacto']}</td>
                    <td>{$row['tel_contacto']}</td>
                    <td>{$row['correo_contacto']}</td>
                    <td class='text-center'><a href='mod_contacto.php?valor=" . $row['cod_contacto'] . "&&codp=" . $row['persona_cod_persona'] . "'><img src='../../Src/img/edit.png' class='icon'></a></td>
                    <td class='text-center'><img src='../../Src/img/delete.png' onclick='eliminar_contacto(" . $row['cod_contacto'] . ")' class='icon' data-bs-toggle='modal' data-bs-target='#eliminarModal'></td>
                    
                </tr>";
        $f++;
    }
} else {
    echo "<tr><td colspan='7' class='bg-danger text-light text-center'>No existen contactos a mostrar</td></tr>";
}
echo "</table>";
