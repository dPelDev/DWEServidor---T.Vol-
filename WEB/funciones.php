<?php

function agregarPrenda($resultado, $id, $cantidad =1){
    //Añadimos toda esta información a la SESSION.
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'nombre' => $resultado['nombre'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad

    );

    
}


function actualizarPrenda($id, $cantidad = FALSE){
    
if ($cantidad) {
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
}else{
    $_SESSION['carrito'][$id]['cantidad'] += 1;
} 

    
}



function calcularTotal(){

    $total = 0;

    if (isset ($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $indice => $value) {
           $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;
    
    
}

function cantidadPrendas(){
    $cantidad = 0;

    if (isset ($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $indice => $value) {
           $cantidad ++;
        }
    }
    return $cantidad;

    
    
}






?>