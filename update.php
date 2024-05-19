<?php
    include("conexion.php");
    $con=conectar();

    $id=$_POST['id'];
    $usuario=$_POST['user'];
    $clave=$_POST['pass'];

    $sql="UPDATE usuarios SET usuario='$usuario',clave='$clave' WHERE usuario='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuarios.php");
    }
?>