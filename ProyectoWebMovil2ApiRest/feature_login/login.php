<?php
// echo(dirname(__DIR__)); --instruccion para ver la ruta del proyecto

require_once (dirname(__DIR__)."/db/db_config.php");

/*if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $documento = (int)$_GET['Documento'];

    $db = new DBConfig();
    $dbConnection = $db->conexion();

    $queryselect = "select Documento, Nombres, Apellidos,
                           Direccion, Telefono, Correo
                        from tblusuarios
                            where Documento = $documento";

    $consultausuarios = $dbConnection->query($queryselect)->fetchAll(PDO::FETCH_ASSOC);
    
    echo(json_encode($consultausuarios));      
}
else
{
    echo "No se puede";
}*/

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $data = json_decode(file_get_contents('php://input'),true);

    $regisusudocumento = $data['Documento'];    
    $regisusunombres = $data['Nombres'];
    $regisusuapellidos = $data['Apellidos'];
    $regisusudireccion = $data['Direccion'];
    $regisusutelefono = $data['Telefono'];
    $regisusucorreo = $data['Correo'];

    $db = new DBConfig();
    $dbConnection = $db->conexion();

    $queryinsert = "INSERT INTO `tblusuarios`
                    (`Documento`, `Nombres`, `Apellidos`, `Direccion`, `Telefono`, `Correo`) 
                    VALUES ('$regisusudocumento','$regisusunombres','$regisusuapellidos',
                            '$regisusudireccion','$regisusutelefono','$regisusucorreo')";
    
    $insertusuarios = $dbConnection->query($queryinsert);
    
    if($insertusuarios){
        $resultado["respuesta"] = "OK";
        $resultado["mensaje"] = "Usuario registrado correctamente";
    }else{
        $resultado["respuesta"] = "Error";
        $resultado["mensaje"] = "Usuario ya existe o se logro registrar";
    }
    
    echo(json_encode($resultado)); 
    //var_dump($data);
}
else
{
    echo "No se puede";
}
