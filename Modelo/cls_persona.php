<?php
require_once("cls_conexion.php");

class persona
{
    public $cod_persona;
    public $ci_persona;
    public $nom_persona;
    public $ape_persona;
    public $dir_persona;
    public $tel_persona;
    public $usu_persona;
    public $cia_persona;


    public function __construct()
    {
        $this->cod_persona = "";
        $this->ci_persona = "";
        $this->nom_persona = "";
        $this->ape_persona = "";
        $this->dir_persona = "";
        $this->tel_persona = "";
        $this->usu_persona = "";
        $this->cia_persona = "";
    }

    public function consultar($parametro)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        if ($parametro == '') {
            $sentencia = sprintf("select * from persona");
        } else {
            $sentencia = sprintf("select * from persona where ape_persona like'%s' or ci_persona like '%s'or nom_persona like '%s'", "%" . $parametro . "%", "%" . $parametro . "%", "%" . $parametro . "%");
        }
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function  insertar($ci_persona,  $nom_persona,    $ape_persona,    $dir_persona,    $tel_persona,    $usu_persona,    $cia_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "INSERT INTO persona(ci_persona, nom_persona, ape_persona, dir_persona, tel_persona, usu_persona, cia_persona) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $conex->real_escape_string($ci_persona),
            $conex->real_escape_string($nom_persona),
            $conex->real_escape_string($ape_persona),
            $conex->real_escape_string($dir_persona),
            $conex->real_escape_string($tel_persona),
            $conex->real_escape_string($usu_persona),
            $conex->real_escape_string($cia_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function  actualizar($ci_persona, $nom_persona, $ape_persona, $dir_persona, $tel_persona, $usu_persona, $cia_persona, $cod_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "UPDATE persona SET ci_persona='%s', nom_persona='%s', ape_persona='%s', dir_persona='%s', tel_persona='%s', usu_persona='%s', cia_persona='%s' 
            WHERE cod_persona ='%s'",
            $conex->real_escape_string($ci_persona),
            $conex->real_escape_string($nom_persona),
            $conex->real_escape_string($ape_persona),
            $conex->real_escape_string($dir_persona),
            $conex->real_escape_string($tel_persona),
            $conex->real_escape_string($usu_persona),
            $conex->real_escape_string($cia_persona),
            $conex->real_escape_string($cod_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function  eliminar($cod_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "DELETE FROM persona WHERE cod_persona ='%s'",
            $conex->real_escape_string($cod_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

    public function ConsultarDato($cod_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "SELECT * FROM persona WHERE cod_persona = '%s'",
            $conex->real_escape_string($cod_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    public function vcedula($ci_persona)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia = sprintf(
            "SELECT ci_persona FROM persona WHERE ci_persona = '%s'",
            $conex->real_escape_string($ci_persona)
        );
        $result = mysqli_query($conex, $sentencia);
        $row = mysqli_fetch_array($result);
        return $row;
    }
}
