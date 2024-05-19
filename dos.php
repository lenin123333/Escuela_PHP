<?php
	include("conexion.php");
	$con=conectar();

	session_start();

	$sql="SELECT * FROM usuarios";
	$query=mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($query)){
		echo $row['usuario'];
		echo $row['clave']; 
		if ($_POST['user'] !="" AND $_POST['pass']!=""){
			if($_POST['user']==$row['usuario'] and $_POST['pass']==$row['clave']){
				$_SESSION['user']=$_POST['user'];
			}else{
				$_SESSION['error']="login incorrecto";
			}
		}else{
			$_SESSION['llene']="llene los campos";
		}
	}

	header("location:alumno.php");
?>