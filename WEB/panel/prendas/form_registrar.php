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

  <title>SSK8.CLOTHES - REGISTRAR</title>

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
          <li>
            <a href="../pedidos/index.php" class="btn">Pedidos</a>
          </li>
          <li class="active">
            <a href="index.php" class="btn">Ropa</a>
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
          <legend>Datos de la prenda</legend>
          <form class="row" action="../acciones.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" name="nombre" placeholder="Nombre de la prenda" required>
            </div>
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="descripcion" placeholder="Añade una descripción de la prenda..." required>
            </div>
            <div class="form-group col-md-4">
              <label>Categoría</label>
              <select class=" form-control" name="categoria_id" required>
                <option value="">--SELECCIONE--</option>
                <?php
                //realizamos una instancia
                require '../../vendor/autoload.php';
                $categoria = new dwes\categoria;
                //lanzamos la función mostrar del objeto ropa y recogemos la cantidad.
                $info_categoria = $categoria->mostrar();
                $cantidad = count($info_categoria);

                for ($i = 0; $i < $cantidad; $i++) {
                  $item = $info_categoria[$i];


                ?>
                  <option value="<?php print $item['id'] ?>"><?php print $item['nombre_categoria'] ?></option>



                <?php
                } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Foto</label>
              <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="form-group col-md-4">
              <label>Precio</label>
              <input type="text" class="form-control" name="precio" placeholder="0.0€" required>
            </div>
            <div class="form-group col-md-12">
              <input type="submit" name="accion" class="btn btn-info" value="Registrar">
              <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
          </form>
        </fieldset>
      </div>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>