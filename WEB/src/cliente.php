<?php

namespace dwes;


class Cliente
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
    public function registrar($_params)
    {
        $sql = "INSERT INTO `clientes`( `nombre`, `apellidos`, `email`, `telefono`, `comentario`) VALUES 
        (:nombre,:apellidos,:email,:telefono,:comentario)";
        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":nombre" => $_params['nombre'],
            ":apellidos" => $_params['apellidos'],
            ":email" => $_params['email'],
            ":telefono" => $_params['telefono'],
            ":comentario" => $_params['comentario']
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return $this->cn->lastInsertId();//Recogemos el último ID que se registró
        } else {
            return false;
        }
    }}

    ?>