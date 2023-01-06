<?php
   
require_once ("ConexionBD.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_usuario';
            acceso_usuario();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","usuarios_bd");
		extract($_POST);
		$consulta="UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', 
		contraseña ='$contraseña', estado ='$estado', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/admin.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","usuarios_bd");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM usuarios WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/admin.php');

}

function acceso_usuario() {
    $nombre=$_POST['nombre'];
    $contraseña=$_POST['contraseña'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","usuarios_bd");
    $consulta= "SELECT * FROM usuarios WHERE nombre='$nombre' AND contraseña='$contraseña'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../views/admin.php');

    }else if($filas['rol'] == 2){//usuario
        header('Location: ../views/usuarios.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}