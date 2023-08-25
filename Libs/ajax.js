// Personas

function buscar_personas(parametro) {

    var fd = new FormData();
    fd.append('valor', parametro);
    $.ajax({
        type: 'Post',
        url: '../../Controlador/personas/buscar_personas.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $("#tabla").html(data);
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

function vcedula(cedula) {
    var fd = new FormData();
    fd.append('valor', cedula);
    $.ajax({
        type: 'Post',
        url: '../../Controlador/personas/vcedula.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            if (data == true) {
                $("#mensaje").html("Cédula ya registrada en el sistema");
                $("#txt_cedula").val("");
            } else {
                $("#mensaje").html("")
            }
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

function reporte() {
    var fd = new FormData();
    $.ajax({
        type: 'Post',
        url: '../../reportes/r_personas.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $("#visor").attr("src", "../../reportes/reporte.pdf?" + new Date().getTime());
            $('#visor').attr('src', data);
            $('#reporteModal').modal('show');
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

function eliminar(codigo) {
    $("#codigo").val(codigo);
    var fd = new FormData();
    fd.append('valor', codigo);
    $.ajax({
        type: 'Post',
        url: '../../Controlador/personas/dato_persona.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            $('#txt_cedula').val(datos.cedula);
            $('#txt_nombre').val(datos.nombre);
            $('#txt_apellido').val(datos.apellido);
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

//Contactos

function buscar_contactos(parametro, cod_persona) {

    var fd = new FormData();
    fd.append('valor', parametro);
    fd.append('cod', cod_persona);
    $.ajax({
        type: 'Post',
        url: '../../Controlador/contactos/buscar_contactos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $("#tabla").html(data);
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

function eliminar_contacto(codigo) {
    $("#codigo").val(codigo);
    var fd = new FormData();
    fd.append('valor', codigo);
    $.ajax({
        type: 'Post',
        url: '../../Controlador/contactos/dato_contacto.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            $('#txt_nombre').val(datos.nombre);
            $('#txt_apellido').val(datos.apellido);
            $('#txt_tel').val(datos.tel);
            $('#txt_correo').val(datos.correo);
        })
        .fail(function () {
            alert("error al procesar la info!")
        });
    return false;
}

function reporte_contacto(cod_persona) {

    var fd = new FormData();
    fd.append('cod_persona', cod_persona);

    $.ajax({
        type: 'Post',
        url: '../../reportes/r_contactos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $("#visor").attr("src", "../../reportes/reporte_contacto.pdf?" + new Date().getTime());
            $('#visor').attr('src', data);
            $('#reporteModal').modal('show');
        })
        .fail(function () {
            alert("Error al procesar la información!");
        });

    return false;
}

