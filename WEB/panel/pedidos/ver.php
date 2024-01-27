<?php

session_start();

if (!isset($_SESSION['usuario_info']) or empty(print $_SESSION['usuario_info'])) {
  header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SSK8.CLOTHES - VER PEDIDOS</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
  <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand texto-google" href="../dashboard.php">ServerSkateboarding.Clothes</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li class="active">
            <a href="pedidos/index.php" class="btn">Pedidos</a>
          </li>
          <li>
            <a href="../prendas/index.php" class="btn">Ropa</a>
          </li>
          <li>
            <a href="#" class="btn"><?php print $_SESSION['usuario_info']['nombre_usuario']?></a>
          </li>
          <li>
            <a href="../cerrar_session.php" class="btn">Cerrar Sesión</a>
          </li>
        </ul>




      </div><!--/.nav-collapse -->
    </div>
  </nav>



  <div class="container" id="main">
    <div class="row">
      <div class="col-md-12">
        <fieldset>
        <?php
        require '../../vendor/autoload.php';

        $id = $_GET['id'];
        $pedido = new dwes\Pedido;
        $info_pedido = $pedido->mostrarPorId($id);
        $info_detalle = $pedido->mostrarDetallePorId($id);

        ?>
            <legend class="text-center">Información del Pedido</legend>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" readonly value="<?php print $info_pedido['nombre']  ?>">
            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text" class="form-control" readonly value="<?php print $info_pedido['apellidos']  ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" readonly value="<?php print $info_pedido['email']  ?>">
            </div>
            <div class="form-group">
                <label for="">Fecha</label>
                <input type="text" class="form-control" readonly value="<?php print $info_pedido['fecha']  ?>">
            </div>

            <hr>
            <h4 class="text-center">Productos Adquiridos</h4>
            <hr>
            <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Foto</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            $cantidad = count($info_detalle);
            //Si la cantidad >0, muestrame la tabla con sus datos
            if ($cantidad > 0) {
              $c = 0; //Contador para listar.
              for ($i = 0; $i < $cantidad; $i++) {
                $c++;
                $item = $info_detalle[$i];
                $total = $item['precio'] * $item['cantidad'];

            ?>
                <tr>
                  <td><?php print $c   ?></td>
                  <td><?php print  $item['nombre'];  ?></td>
                  <td class="text-center">

                    <?php
                    $foto = '../../upload/' . $item['foto'];
                    if (file_exists($foto)) {
                    ?>
                      <img src="<?php print $foto ?>" width="50">
                    <?php
                    } else { ?>
                      SIN FOTO
                    <?php }

                    ?>
                  </td>
                  <td><?php print  $item['precio']  ?> €</td>
                  <td><?php print  $item['cantidad']  ?></td>
                  <td><?php print  $total  ?></td>
                  
                
                </tr>
              <?php
              }
            } else {
              ?>
              <!-- Si no hay, muestrame esto otro. -->
              <tr>
                <td colspan="6">NO HAY REGISTROS</td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
        <div class="col-md-3">
        <div class="form-group">
                <label for="">Total Compra</label>
                <input type="text" class="form-control" readonly value="<?php print $info_pedido['total']  ?>">
            </div>
        </div>
    

        </fieldset>
        <div class="pull-left">
            <a href="index.php" class="btn btn-default hidden-print">Cancelar</a>
        </div>
        <div class="pull-right">
            <a href="#" id="btnImprimir" class="btn btn-danger hidden-print " onclick="window.print()">Imprimir</a>
        </div>
        
        
      </div>
    </div>


  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../sets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  

</body>

</html>