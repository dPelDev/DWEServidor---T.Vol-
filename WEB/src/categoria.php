<?php

namespace dwes;

use PDO;

class Categoria{
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
    public function mostrar()
    {
        $sql = "SELECT * FROM categorias";

        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);


        //Ejecutando la consulta
        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }
    }

}



?>