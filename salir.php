<?php
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if (isset($_SESSION['llene'])){
        unset($_SESSION['llene']);
    }
    if (isset($_SESSION['error'])){
        unset ($_SESSION['error']);
    }

    header("location:alumno.php");
?>