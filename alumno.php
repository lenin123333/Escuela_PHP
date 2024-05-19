<?php
    session_start();
    if(isset($_SESSION['user'])){
        include("conexion.php");
        $con=conectar();

        $sql="SELECT * FROM alumno";

        $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PAGINA ALUMNO</title>
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
                    <form action="insertar.php" method="POST" enctype="multipart/form-data">
                        Foto de perfil: <input type="file" name="imagen" class="form-control" required><br>
                        <input type="text" name="clave" class="form-control" required placeholder="clave"><br>
                        <input type="text" name="nombre" class="form-control" required placeholder="nombre"><br>
                        <input type="number" name="edad" class="form-control" required placeholder="edad"><br>
                        <label>Sexo:</label>
                        <select id="sexo" name="sexo" class="form-select">
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                        </select><br>
                        <input type="text" name="telefono" class="form-control" required placeholder="telefono"><br>
                        <input type="submit" value="Agregar alumno" class="btn btn-success">
                    </form>
                </div>
                <div class="col-12 col-lg-9 p-5">
                    <div id="botones">
                        <input type="button" class="btn btn-primary" id="t" value="TODOS">&nbsp;&nbsp;
                        <input type="button" class="btn btn-outline-dark" id="h" value="HOMBRES" onclick="h();">&nbsp;&nbsp;
                        <input type="button" class="btn btn-outline-dark" id="m" value="MUJERES" onclick="m();"><br><br>
                    </div>
                    <table class="table table-success table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="contenido">
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="" width="100"></td>
                                    <td><?php  echo $row['clave']?></td>
                                    <td><?php  echo $row['nombre']?></td>
                                    <td><?php  echo $row['edad']?></td>
                                    <td><?php  echo $row['sexo']?></td> 
                                    <td><?php  echo $row['telefono']?></td> 
                                    <td><a href="baja_temporal.php?clave=<?php echo $row['clave'] ?>&nombre=<?php echo $row['nombre'] ?>&edad=<?php echo $row['edad'] ?>&sexo=<?php echo $row['sexo'] ?>&telefono=<?php echo $row['telefono'] ?>" class="btn btn-danger">Baja temporal</a></td>                                      
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                    <div id="botones2">
                        <input type="button" class="btn btn-info" id="baja" value="ESTUDIANTES CON BAJA TEMPORAL" onclick="baja();">
                    </div>
                </div>
            </div>  
        </div>
        <script>
            function t(){
                <?php 
                    $sql="SELECT * FROM alumno";
                    $query=mysqli_query($con,$sql);
                ?>
                document.getElementById("botones").innerHTML = '<input type="button" class="btn btn-primary" id="t" value="TODOS">&nbsp;&nbsp;<input type="button" class="btn btn-outline-dark" id="h" value="HOMBRES" onclick="h();">&nbsp;&nbsp;<input type="button" class="btn btn-outline-dark" id="m" value="MUJERES" onclick="m();"><br><br>';

                document.getElementById("contenido").innerHTML = '<?php while($row=mysqli_fetch_array($query)){?><tr><td><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="" width="100"></td><td><?php  echo $row['clave']?></td><td><?php  echo $row['nombre']?></td><td><?php  echo $row['edad']?></td><td><?php  echo $row['sexo']?></td> <td><?php  echo $row['telefono']?></td><td><a href="baja_temporal.php?clave=<?php echo $row['clave'] ?>&nombre=<?php echo $row['nombre'] ?>&edad=<?php echo $row['edad'] ?>&sexo=<?php echo $row['sexo'] ?>&telefono=<?php echo $row['telefono'] ?>" class="btn btn-danger">Baja temporal</a></td></tr><?php }?>';
            }

            function h(){
                <?php 
                    $sqlH = "SELECT * FROM alumno WHERE sexo='hombre'";
                    $query=mysqli_query($con,$sqlH);
                ?>
                document.getElementById("botones").innerHTML = '<input type="button" class="btn btn-outline-dark" id="t" value="TODOS" onclick="t();">&nbsp;&nbsp;<input type="button" class="btn btn-primary" id="h" value="HOMBRES">&nbsp;&nbsp;<input type="button" class="btn btn-outline-dark" id="m" value="MUJERES" onclick="m();"><br><br>';

                document.getElementById("contenido").innerHTML = '<?php while($row=mysqli_fetch_array($query)){?><tr><td><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="" width="100"></td><td><?php  echo $row['clave']?></td><td><?php  echo $row['nombre']?></td><td><?php  echo $row['edad']?></td><td><?php  echo $row['sexo']?></td> <td><?php  echo $row['telefono']?></td><td><a href="baja_temporal.php?clave=<?php echo $row['clave'] ?>&nombre=<?php echo $row['nombre'] ?>&edad=<?php echo $row['edad'] ?>&sexo=<?php echo $row['sexo'] ?>&telefono=<?php echo $row['telefono'] ?>" class="btn btn-danger">Baja temporal</a></td></tr><?php }?>';
            }

            function m(){
                <?php 
                    $sqlM = "SELECT * FROM alumno WHERE sexo='mujer'";
                    $query=mysqli_query($con,$sqlM);
                ?>
                document.getElementById("botones").innerHTML = '<input type="button" class="btn btn-outline-dark" id="t" value="TODOS" onclick="t();">&nbsp;&nbsp;<input type="button" class="btn btn-outline-dark" id="h" value="HOMBRES" onclick="h();">&nbsp;&nbsp;<input type="button" class="btn btn-primary" id="m" value="MUJERES"><br><br>';

                document.getElementById("contenido").innerHTML = '<?php while($row=mysqli_fetch_array($query)){?><tr><td><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="" width="100"></td><td><?php  echo $row['clave']?></td><td><?php  echo $row['nombre']?></td><td><?php  echo $row['edad']?></td><td><?php  echo $row['sexo']?></td> <td><?php  echo $row['telefono']?></td><td><a href="baja_temporal.php?clave=<?php echo $row['clave'] ?>&nombre=<?php echo $row['nombre'] ?>&edad=<?php echo $row['edad'] ?>&sexo=<?php echo $row['sexo'] ?>&telefono=<?php echo $row['telefono'] ?>" class="btn btn-danger">Baja temporal</a></td></tr><?php }?>';
            }

            function baja(){
                <?php 
                    $sql="SELECT * FROM alumno_baja";
                    $query=mysqli_query($con,$sql);
                ?>
                document.getElementById("botones").innerHTML = '';

                document.getElementById("contenido").innerHTML = '<?php while($row=mysqli_fetch_array($query)){?><tr><td><img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="" width="100"></td><td><?php  echo $row['clave']?></td><td><?php  echo $row['nombre']?></td><td><?php  echo $row['edad']?></td><td><?php  echo $row['sexo']?></td> <td><?php  echo $row['telefono']?></td><td><a href="inscripcion.php?clave=<?php echo $row['clave'] ?>&nombre=<?php echo $row['nombre'] ?>&edad=<?php echo $row['edad'] ?>&sexo=<?php echo $row['sexo'] ?>&telefono=<?php echo $row['telefono'] ?>" class="btn btn-success">Reinscribir</a></td></tr><?php }?>';

                document.getElementById("botones2").innerHTML = '<input type="button" class="btn btn-info" id="inscripcion" value="ESTUDIANTES INSCRITOS" onclick="inscritos();">';
            }

            function inscritos(){
                t();
                document.getElementById("botones2").innerHTML = '<input type="button" class="btn btn-info" id="baja" value="ESTUDIANTES CON BAJA TEMPORAL" onclick="baja();">';
            }
        </script>
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