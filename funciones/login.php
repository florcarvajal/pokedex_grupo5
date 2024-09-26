<?php
class Login{
  function __construct(){
    
  } 
  
  
  public function validar_usuario($user,$contrasena){
    $respuesta=[];
    try{
        if($user!='' && $contrasena!=''){
          include './conexion.php';
          $consulta_login="SELECT * FROM usuario WHERE usuario = ? AND password=?";
          $print="SELECT * FROM usuario WHERE usuario = '$user' AND password='$contrasena'";
          $resultado = $conn->prepare($consulta_login);
          $resultado->bind_param('ss',$user,$contrasena);
          $resultado->execute();
          $respuesta['estado'] = 1;
          $respuesta['usuario'] =$resultado->get_result()->fetch_all(MYSQLI_ASSOC);         
        }else{
            throw new Exception('Faltan datos para el login.', 401);
        }

    }catch (Exception $e) {
        $respuesta['estado'] = 2;
        $respuesta['mensaje'] = $e->getMessage();
    }
    return $respuesta;
  }
}
?>