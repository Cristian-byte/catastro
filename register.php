<?php

include "config.php";
error_reporting(0);
session_start();

if(isset($_SESSION["nombre_usuario"]))
{
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $cpassword=md5($_POST["cpassword"]);

    if($password==$cpassword){
        $sql="SELECT * FROM usuarios WHERE email='$email'";
        $result= mysqli_query($conn, $sql);
        if(!$result->num_rows > 0){
            $sql= "INSERT INTO db_catastro (username, email, password)";

            $result=mysqli_query($conn, $sql);

            if($result){
                "<script>alert('Usuario registrado con éxito')</script>";
                $username="";
                $email="";
                $_POST["password"]="";
                $_POST["cpassword"]="";
            }else{
                echo "<script>alert('Se encontró un error')</script>";
            }
        }else{
            echo "<script>alert('El correo ya exite')</script>";
        }
    }else{
        echo "<script>alert('Las contraseñas no coinciden')</script>";
    }
}

?>