<?php

namespace dwes;

use PDO;

class Ropa
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
        $sql = "INSERT INTO `prendas`( `nombre`, `descripcion`, `foto`, `precio`, `categoria_id`, `fecha`)
     VALUES (:nombre, :descripcion, :foto, :precio, :categoria_id, :fecha)";
        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha']
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `prendas` SET `nombre`=:nombre,`descripcion`=:descripcion,`foto`=:foto,`precio`=:precio,
    `categoria_id`=:categoria_id,`fecha`=:fecha WHERE `id`=:id";
        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            "id" => $_params['id']
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM `prendas` WHERE `id` = :id";

        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            "id" => $id
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        $sql = "SELECT prendas.id, prendas.nombre, nombre_categoria, descripcion, foto, precio, fecha, estado  FROM prendas
    INNER JOIN categorias
    ON prendas.categoria_id = categorias.id ORDER BY prendas.id DESC
    ";

        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);


        //Ejecutando la consulta
        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }

    }


    // public function mostrar()
    // {
    //     $sql = "SELECT prendas.id, prendas.nombre, categorias.nombre, descripcion, foto, precio, fecha, estado  FROM prendas
    // INNER JOIN categorias
    // ON prendas.categoria_id = categorias.id ORDER BY prendas.id DESC
    // ";

    //     //Preparando la consulta
    //     $resultado = $this->cn->prepare($sql);


    //     //Ejecutando la consulta
    //     if ($resultado->execute()) {
    //         return $resultado->fetchAll();
    //     } else {
    //         return false;
    //     }

    // }

    public function mostrarPorId($id)
    {

        $sql = "SELECT * FROM `prendas` WHERE id=:id";

        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            "id" => $id
        );

        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return $resultado->fetch();
        } else {
            return false;
        }
    }
}
