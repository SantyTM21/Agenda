<?php
class DBConexion
{
    public $conexion;

    protected $host;
    protected $db;
    protected $usuario;
    protected $clave;
    protected $base;

    public function __construct()
    {
        $this->conexion = "";
        $this->db = "db_agenda";
        $this->host = "localhost";
        $this->usuario = "root";
        $this->clave = "";
    }

    public function conectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usuario,  $this->clave, $this->db);
        if ($this->conexion == '') die("error en la conexion con mysql");
        $this->base = mysqli_select_db($this->conexion, $this->db);
        if ($this->base == 0) die("error de conexion con la DB" . mysqli_error($this->conexion));
        return $this->conexion;
    }
}
