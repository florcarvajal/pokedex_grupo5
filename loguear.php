<?php
session_start();
include_once('funciones/login.php');
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
if($usuario=='' || $contrasena=='')
    die('error, faltan parametros');
$login= new Login();
$usuario=$login->validar_usuario($usuario,md5($contrasena));
if($usuario['usuario']){
    $_SESSION['usuario_nombre']=$usuario['usuario'][0]['usuario'];
    echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}else{
    echo '<meta http-equiv="Refresh" content="0;url=index.php?error=1">';
}

?>