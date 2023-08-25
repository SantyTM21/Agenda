<?php
require_once("cls_conexion.php");

class contacto
{
    public $cod_contacto;
    public $nom_contacto;
    public $ape_contacto;
    public $tel_contacto;
    public $correo_contacto;
    public $persona_cod_persona;

    public function __construct()
    {
        $this->cod_contacto = "";
        $this->nom_contacto = "";
        $this->ape_contacto = "";
        $this->tel_contacto = "";
        $this->correo_contacto = "";
        $this->persona_cod_persona = "";
    }

    public function consultar($parametro, $cod)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        if ($parametro == '') {
            $sentencia = sprintf(
                "SELECT * FROM contacto WHERE persona_cod_persona = '%s'",
                $conex->real_escape_string($cod)
            );
        } else {
            $sentencia = sprintf(
                "SELECT * FROM contacto WHERE ape_contacto LIKE'%s' OR nom_contacto LIKE '%s' AND persona_cod_persona = '%s'",
                "%" . $parametro . "%",
                "%" . $parametro . "%",
                $cod
            );
        }
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function insertar($nom_contacto, $ape_contacto, $tel_contacto, $correo_contacto, $persona_cod_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "INSERT INTO contacto(nom_contacto, ape_contacto, tel_contacto, correo_contacto, persona_cod_persona) 
            VALUES('%s', '%s', '%s', '%s','%s')",
            $conex->real_escape_string($nom_contacto),
            $conex->real_escape_string($ape_contacto),
            $conex->real_escape_string($tel_contacto),
            $conex->real_escape_string($correo_contacto),
            $conex->real_escape_string($persona_cod_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function actualizar($nom_contacto, $ape_contacto, $tel_contacto, $correo_contacto, $cod_contacto)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "UPDATE contacto SET nom_contacto='%s', ape_contacto='%s', tel_contacto='%s', correo_contacto='%s'
            WHERE cod_contacto ='%s'",
            $conex->real_escape_string($nom_contacto),
            $conex->real_escape_string($ape_contacto),
            $conex->real_escape_string($tel_contacto),
            $conex->real_escape_string($correo_contacto),
            $conex->real_escape_string($cod_contacto)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function eliminar($cod_contacto)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "DELETE FROM contacto WHERE cod_contacto ='%s'",
            $conex->real_escape_string($cod_contacto)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function ConsultarDato($cod_contacto)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "SELECT * FROM contacto WHERE cod_contacto = '%s'",
            $conex->real_escape_string($cod_contacto)
        );
        $result = mysqli_query($conex, $sentencia);
        $row = mysqli_fetch_array($result);
        return $row;
    }
}
