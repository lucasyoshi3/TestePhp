<?php 
    $hostname = "localhost";
    $bd = "usuario";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bd);

    if($mysqli->connect_errno){
        echo $mysqli-> connect_errno;
    }
?>