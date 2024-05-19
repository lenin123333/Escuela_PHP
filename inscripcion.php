<?php
    include("conexion.php");
    $con=conectar();

    $clave=$_GET['clave'];
    $nombre=$_GET['nombre'];
    $edad=$_GET['edad'];
    $sexo=$_GET['sexo'];
    $telefono=$_GET['telefono'];

    $sql="INSERT INTO alumno VALUES(' ','$clave','$nombre','$edad','$sexo','$telefono')";
    $query=mysqli_query($con,$sql);

    $sql="UPDATE alumno_baja a,alumno b SET b.imagen=a.imagen WHERE a.clave=b.clave";
    $query=mysqli_query($con,$sql);

    $sql="DELETE FROM alumno_baja WHERE clave='$clave'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>