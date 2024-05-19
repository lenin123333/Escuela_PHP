<?php
    include("conexion.php");
    $con=conectar();

    $usuario=$_GET['usuario'];
        
    $sql="DELETE FROM usuarios WHERE usuario='$usuario'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }
?>
