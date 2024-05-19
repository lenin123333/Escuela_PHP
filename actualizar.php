<?php 
    include("conexion.php");
    $con=conectar();

    $usuario=$_GET['usuario'];

    $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center vw-100 alto-100">
            <div class="row">
                <div class="col-12 p-5">
                    <h4>MODIFICAR REGISTRO</h4><br>
                    <form action="update.php" method="post">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $row['usuario']  ?>">
                        <?php if($row['usuario'] != 'ADMIN'){ ?>
                            USUARIO:  <input class="form-control" type="text" name="user" value="<?php echo $row['usuario']  ?>"> <br>
                        <?php }else{ ?>
                            USUARIO:  <input class="form-control" type="text" name="user" value="<?php echo $row['usuario']  ?>" disabled> <br>
                        <?php } ?>
                        CONTRASEÑA:  <input class="form-control" type="password" name="pass" value="<?php echo $row['clave']  ?>"><br>
                        <input class="btn btn-warning" type=submit value="Actualizar">
                        <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>