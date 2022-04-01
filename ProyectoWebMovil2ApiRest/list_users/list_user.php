<?php
require_once (dirname(__DIR__)."/db/db_config.php");

$db = new DBConfig();
$dbConnection = $db->conexion();

$queryselect = "select documento,nombres,apellidos,
                       direccion,telefono,correo,password
                from tblregistrousuarios";

$consultausers = $dbConnection->query($queryselect)->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo(json_encode($consultausers));