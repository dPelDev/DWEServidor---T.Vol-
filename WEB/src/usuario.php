<?php

namespace dwes;

use PDO;

class Usuario
{

    private $config;
    private $cn = null;
    public function __construct()
    {
        // Esto me va a devolver el contenido de config.ini
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');
        //Conectamos con la BDD
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            //Para el tratamiendo de tíldes
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }
    public function login($nombre, $clave)
    {

        $sql = "SELECT nombre_usuario FROM `usuarios` WHERE nombre_usuario= :nombre AND clave = :clave";

        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":nombre" => $nombre,
            ":clave" => $clave
        );

        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return $resultado->fetch();
        } else {
            return false;
        }
    }
}

    