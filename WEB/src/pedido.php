<?php

namespace dwes;


class Pedido{

    private $config;
    private $cn = null;
    public function __construct(){
        // Esto me va a devolver el contenido de config.ini
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');
        //Conectamos con la BDD
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            //Para el tratamiendo de tíldes
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }
    public function registrar($_params){
        $sql = "INSERT INTO `pedidos`( `cliente_id`, `total`, `fecha`) 
        VALUES (:cliente_id,:total,:fecha)";
        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":cliente_id" => $_params['cliente_id'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha']
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return $this->cn->lastInsertId();//Recogemos el último ID que se registró
        } else {
            return false;
        }
    }

    public function registrarDetalles($_params)
    {
        $sql = "INSERT INTO `detalle_pedidos`( `pedidos_id`, `prendas_id`, `precio`, `cantidad`) 
        VALUES (:pedido_id,:prendas_id,:precio,:cantidad)";
        //Preparando la consulta
        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":pedido_id" => $_params['pedido_id'],
            ":prendas_id" => $_params['prendas_id'],
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad']
        );
        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarPedidos()  {

        $sql ="SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p INNER JOIN clientes c
        ON p.cliente_id = c.id ORDER BY p.id DESC";
        $resultado = $this->cn->prepare($sql);
        


        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }
    }

    public function mostrarPorId($id)  {

        $sql ="SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p INNER JOIN clientes c
        ON p.cliente_id = c.id WHERE p.id = :id";
        
        $resultado = $this->cn->prepare($sql);
        
        $array = array(
            ":id" => $id
        );

        //Ejecutando la consulta
        if ($resultado->execute($array)) {
            return $resultado->fetch();
        } else {
            return false;
        }
            }

    public function mostrarUltimos()  {

                $sql ="SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p INNER JOIN clientes c
                ON p.cliente_id = c.id ORDER BY p.id DESC LIMIT 10";
                $resultado = $this->cn->prepare($sql);
                
        
        
                if ($resultado->execute()) {
                    return $resultado->fetchAll();
                } else {
                    return false;
                }
            }
            

    public function mostrarDetallePorId($id)  {

        $sql ="SELECT dp.id, p.nombre, dp.precio, dp.cantidad, p.foto FROM detalle_pedidos dp 
        INNER JOIN prendas p ON p.id = dp.prendas_id
        WHERE dp.pedidos_id = :id";
        $resultado = $this->cn->prepare($sql);
        
        $array = array(
            ":id" => $id
        );



        if ($resultado->execute($array)) {
            return $resultado->fetchAll();
        } else {
            return false;
        }
    }

}

    ?>