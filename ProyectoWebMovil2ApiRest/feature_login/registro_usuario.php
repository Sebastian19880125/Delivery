<?php

require_once (dirname(__DIR__)."/db/db_config.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   $data = json_decode(file_get_contents('php://input'),true);
   
    $resultado = [];
    $regisusudocumento = (int)$data['documento'];    
    $regisusunombres = $data['nombres'];
    $regisusuapellidos = $data['apellidos'];
    $regisusudireccion = $data['direccion'];
    $regisusutelefono = (int)$data['telefono'];
    $regisusucorreo = $data['correo']; 
    $regisusupassword= $data['password'];

    $db = new DBConfig();
    $dbConnection = $db->conexion();

    $queryinsert = "INSERT INTO `tblregistrousuarios`
                    (`documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`,`password`) 
                    VALUES ('$regisusudocumento','$regisusunombres','$regisusuapellidos',
                            '$regisusudireccion','$regisusutelefono','$regisusucorreo','$regisusupassword')";
    
    $insertusuarios = $dbConnection->query($queryinsert);
    
    if($insertusuarios){
        $resultado = array("respuesta"=>"Usuario registrado correctamente");
        
    }else{
        $resultado = array("respuesta"=>"Usuario ya existe o no se logro registrar");
        
    }
    header('Content-Type: application/json');
    echo(json_encode($resultado));      
}
?>