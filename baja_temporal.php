<?php
    include("conexion.php");
    $con=conectar();

    $clave=$_GET['clave'];
    $nombre=$_GET['nombre'];
    $edad=$_GET['edad'];
    $sexo=$_GET['sexo'];
    $telefono=$_GET['telefono'];

    $sql="INSERT INTO alumno_baja VALUES(' ','$clave','$nombre','$edad','$sexo','$telefono')";
    $query=mysqli_query($con,$sql);

    $sql="UPDATE alumno a,alumno_baja b SET b.imagen=a.imagen WHERE a.clave=b.clave";
    $query=mysqli_query($con,$sql);

    $sql="DELETE FROM alumno WHERE clave='$clave'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>