<?php
if( !empty($_POST['documento1']) && !empty($_POST['nombre1']) && !empty($_POST['apellido1']) && !empty($_POST['contrasenna1'])){
    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    $documento1 = $_POST['documento1'];
    $nombre = md5($_POST['nombre1']);
    $apellido = $_POST['apellido1'];
    $pass = $_POST['contrasenna1'];
    
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    
    
    $insertarEstudiante = $mysql->efectuarConsulta("insert into notas.estudiantes (documento_de_identificacion, nombres, apellidos, contrasenna) values(".$documento1.",'".$nombre."','".$apellido."','".$pass."')");
    
   $mysql->desconectar();
    
    if($insertarEstudiante){
        echo "Hola mundo";
        //header("Location: ../docente.php");
    }else{
        echo "Error";
    }
    
}


