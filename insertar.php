<?php
    include("conexion.php");
    $con=conectar();

    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $clave=$_POST['clave'];
    $nombre=$_POST['nombre'];
    $edad=$_POST['edad'];
    $sexo=$_POST['sexo'];
    $telefono=$_POST['telefono'];

    $sql="INSERT INTO alumno VALUES('$imagen','$clave','$nombre','$edad','$sexo','$telefono')";
    $query= mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }else {
    }
?>