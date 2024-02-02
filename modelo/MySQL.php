<?php

class MySQL
{


    private $ipServidor = "localhost";
    private $user = "root";
    private $pass = '';
    private $bd = "productosphp";

    private $conexion;


    public function conectar()
    {
        $this->conexion = mysqli_connect($this->ipServidor, $this->user, $this->pass, $this->bd);
    }

    public function desconectar()
    {
        mysqli_close($this->conexion);
    }
    private $resultadoConsulta;

    public function efectuarConsulta($consulta)
    {
        mysqli_query($this->conexion, "SET lc_time_names = 'es_ES'");
        //Configurar la base de datos para manipular caráteres especiales (ó,ñ,etc..)
        mysqli_query($this->conexion, "SET NAMES 'utf8'");

        $this->resultadoConsulta = mysqli_query($this->conexion, $consulta);

        return $this->resultadoConsulta;
    }
}
