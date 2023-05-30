<?php 

$server = "localhost";
$user = "admin";
$pass = "";
$database = "db_catastro";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die("Conexión fallida");
}

?>