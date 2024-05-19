<?php
    include("conexion.php");
    $con=conectar();

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $sql="INSERT INTO usuarios VALUES('$usuario','$clave')";
    $query= mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }else {
    }
?>