<?php
    session_start();
    if(isset($_SESSION['user'])){
        include("conexion.php");
        $con=conectar();

        $sql="SELECT * FROM usuarios";

        $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>USUARIOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-primary">
                <div class="container-fluid">
                    <a href="alumno.php" class="navbar-brand">CRUD</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNAV">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="menuNAV" class="collapse navbar-collapse">
                        <div id="cabecera"></div>
                            <ul class="navbar-nav ms-3">
                                <li class="nav-item"><a class="nav-link" href=salir.php>Cerrar sesion</a></li>
                                <?php
                                    if ($_SESSION['user'] == 'ADMIN'){
                                        ?><li class="nav-item"><a class="nav-link" href=usuarios.php>Usuarios</a></li><?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-12 col-lg-3 p-5">
                    <h4>Ingrese datos</h4><br>
                    <form action="insertar_usuario.php" method="POST">
                        <input type="text" name="usuario" class="form-control" required placeholder="nombre de usuario"><br>
                        <input type="password" name="clave" class="form-control" required placeholder="contraseña"><br>
                        <input type="submit" value="Agregar usuario" class="btn btn-success">
                    </form>
                </div>
                <div class="col-12 col-lg-9 p-5">
                    <table class="table table-success table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Contraseña</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="contenido">
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td><?php  echo $row['usuario']?></td>
                                    <td><?php  echo $row['clave']?></td>
                                    <td><a href="actualizar.php?usuario=<?php echo $row['usuario'] ?>" class="btn btn-info">Editar</a></td>
                                    <td>
                                        <?php 
                                            if($row['usuario'] != 'ADMIN'){
                                                ?><a href="eliminar.php?usuario=<?php echo $row['usuario'] ?>" class="btn btn-danger">Eliminar</a><?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </body>
</html>
<?php
}else{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center vw-100 alto-100">
            <div class="row">
                <div class="col-12 p-5">
                    <h4>INICIAR SESIÓN</h4><br>
                    <form action="dos.php" method="post">
                        USUARIO:  <input class="form-control" type="text" name="user"> <br>
                        CONTRASEÑA:  <input class="form-control" type="password" name="pass"><br>
                        <input class="btn btn-outline-success" type=submit value="iniciar sesion"><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 p-5">
                <?php
                    if (isset($_SESSION['llene'])){
                        ?><div class="alert alert-warning" role="alert"><?php echo $_SESSION['llene']?></div><?php
                        unset($_SESSION['llene']);
                    }elseif (isset($_SESSION['error'])){
                        ?><div class="alert alert-danger" role="alert"><?php echo $_SESSION['error']?></div><?php
                        unset ($_SESSION['error']);
                    }
                    }
                ?>
                </div>
            </div>
        </div>
    </body>
    </html>