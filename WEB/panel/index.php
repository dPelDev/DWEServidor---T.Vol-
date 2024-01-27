<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SERVERSKATEBOARDING.CLOTHES</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

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
                <a class="navbar-brand texto-google" href="index.php">ServerSkateboarding.Clothes</a>
            </div>

        </div>
    </nav>
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="../assets/imagenes/logo.jpg" alt="" width="500px" style="margin-left: -150px;">
        </div>
    </div>

    <div class="container" id="main" style="margin-top: -150px;">
        <div class="main-login text-center">
            <form action="login.php" method="post">
                <div class="card" style="width: 18rem;">
                    <div class="panel-heading">
                        <h3 class="text-center">ACCESOS</h3>
                        <h6>AL PANEL DE CONTROL</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Usario</label>
                            <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="clave" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <button class="btn btn-danger btn-block"><a href="../index.php" style="color:white; text-decoration:none">Volver</a></button>
                    </div>
                </div>
            </form>
        </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>