<?php

require '../vendor/autoload.php';

$ropa = new dwes\ropa;
//VALIDAR SI LA INFORMACIÓN NOS LLEVA A TRAVES DE POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Si vienes de REGISTRAR
    if ($_POST['accion'] === 'Registrar') {
        //Comprobamos que esten todos los datos introducidos
        if (empty($_POST['nombre'])) {
            exit('Completar Nombre');
        }
        if (empty($_POST['descripcion'])) {
            exit('Completa la Descripcion');
        }
        if (empty($_POST['categoria_id'])) {
            exit('Selecciona una Categoria válida');
        }
        if (!is_numeric($_POST['categoria_id'])) {
            exit('Selecciona una Categoria válida');
        }
        //Recogemos los datos para mandarlos
        $params = array(

            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'foto' => subirFoto(),
            'precio' => $_POST['precio'],
            'categoria_id' => $_POST['categoria_id'],
            'fecha' => date('Y-m-d')
        );

        //Creamos una variable de respuesta
        $rpt = $ropa->registrar($params);
        //Validamos si se guarda y lo mandamos al index
        if ($rpt) {
            header('Location: prendas/index.php');
        } else {
            print 'Error al registrarla';
        }

        var_dump($rpt);
    }

    if ($_POST['accion'] === 'Actualizar') {
        //Comprobamos que esten todos los datos introducidos
        if (empty($_POST['nombre'])) {
            exit('Completar Nombre');
        }
        if (empty($_POST['descripcion'])) {
            exit('Completa la Descripcion');
        }
        if (empty($_POST['categoria_id'])) {
            exit('Selecciona una Categoria válida');
        }
        if (!is_numeric($_POST['categoria_id'])) {
            exit('Selecciona una Categoria válida');
        }
        //Recogemos los datos para mandarlos
        $params = array(

            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'precio' => $_POST['precio'],
            'categoria_id' => $_POST['categoria_id'],
            'fecha' => date('Y-m-d'),
            'id' => $_POST['id']
        );
        //Validamos si no queremos cambiar la foto de la prenda
        if(!empty($_POST['foto_temp']))
            $params['foto'] = $_POST['foto_temp'];
        if(!empty($_FILES['foto']['name']))
            $params['foto'] = subirFoto();

        //Creamos una variable de respuesta
        $rpt = $ropa->actualizar($params);
        //Validamos si se guarda y lo mandamos al index
        if ($rpt) {
            header('Location: prendas/index.php');
        } else {
            print 'Error al Actualizar';
        }

        var_dump($rpt);
    }
}

//Para eliminar de la lista, ergo de la BDD
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $id = $_GET['id'];
    //Creamos una variable de respuesta
    $rpt = $ropa->eliminar($id);
    //Validamos si se guarda y lo mandamos al index
    if ($rpt) {
        header('Location: prendas/index.php');
    } else {
        print 'Error al Eliminar';
    }
}
//Función para subir foto
function subirFoto()
{
    //recojo la carpeta
    $carpeta = __DIR__ . '/../upload/';
    //recojo el archivo
    $archivo = $carpeta . $_FILES['foto']['name'];
    //lo subo con 2 parám: 1 donde esta la foto con el nombre temp, 2 a donde la subo
    move_uploaded_file($_FILES['foto']['tmp_name'], $archivo);

    return $_FILES['foto']['name'];
}
