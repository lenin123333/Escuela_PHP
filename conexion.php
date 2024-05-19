<?php
    function conectar(){
        $host = "localhost";
        $user = "root";
        $pass = "lenin123";

        $db = "escuela";
        $con = mysqli_connect($host,$user,$pass);

        mysqli_select_db($con,$db);

        return $con;
    }
?>