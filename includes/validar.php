<?php
$conexion= mysqli_connect("localhost", "root", "", "usuarios_bd");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre']) >=1 && strlen($_POST['apellido'])  >=1 && strlen($_POST['email'])  >=1 
    && strlen($_POST['contraseña'])  >=1 && strlen($_POST['estado'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['contraseña']);
    $estado = trim($_POST['estado']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO usuarios (nombre, apellido, emil, contraseña, estado, rol)
    VALUES ('$nombre', '$apellido', '$email', '$contraseña', '$estado', '$rol' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/admin.php');
  }
}









?>