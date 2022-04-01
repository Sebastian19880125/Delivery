<?php

require_once (dirname(__DIR__)."/db/db_config.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $data = json_decode(file_get_contents('php://input'),true);

    $loginusuario = $data['usuario'];    
    $loginpassword = $data['password'];

    $db = new DBConfig();
    $dbConnection = $db->conexion();

    $queryselect = "select usuario,password
                    from tbllogin
                    where usuario = '$loginusuario'
                    and password = '$loginpassword'";

    $login = $dbConnection->query($queryselect)->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');

    echo(json_encode($login[0]));      
}
else{
    echo "No se puede conectar";
}
?>