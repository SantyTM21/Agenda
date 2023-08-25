<?php
require_once("../../Modelo/cls_persona.php");
$persona = new persona();
$result = $persona->consultar($_POST['valor']);

echo "<table id='tabla' name='tabla' class='table table-bordered table-striped'>
                <thead class='bg-primary text-light text-center'>
                    <th>N.</th>
                    <th class='col-2'>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Contactos</th>
                </thead>";

if (mysqli_num_rows($result) > 0) {
    $f = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td class='text-center'>$f</td>
                    <td>{$row['ci_persona']}</td>
                    <td>{$row['nom_persona']}</td>
                    <td>{$row['ape_persona']}</td>
                    <td class='text-center'><a href='mod_persona.php?valor=" . $row['cod_persona'] . "'><img src='../../Src/img/edit.png' class='icon' title='Editar / Actualizar Persona'></a></td>
                    <td class='text-center'><img src='../../Src/img/delete.png' onclick='eliminar(" . $row['cod_persona'] . ")' class='icon' data-bs-toggle='modal' data-bs-target='#eliminarModal' title='Eliminar Persona'></td>
                    <td class='text-center'><a href='../../Vista/Contactos/contactos.php?valor=" . $row['cod_persona'] . "'><img src='../../Src/img/contacto.png' onclick='contacto(" . $row['cod_persona'] . ")' class='icon' title='Ver / Administrar contactos' ></a></td>
                </tr>";
        $f++;
    }
} else {
    echo "<tr><td colspan='7' class='bg-danger text-light text-center'>No existen registros a mostrar</td></tr>";
}
echo "</table>";
