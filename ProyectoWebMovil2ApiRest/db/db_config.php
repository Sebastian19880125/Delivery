<?php

class DBConfig{

    //Usuario
   private $user = "root";
    //Contrasena
   private $password = "";
    //Nombre base datos
   private $dbName = "proyectowebmovilii";
    //Host
   private $host = "localhost";

   public function conexion ()
   {
       try{       
            $dns = "mysql:host=$this->host;dbname=$this->dbName";
            $conection = new PDO($dns, $this->user, $this->password);
            $conection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conection;
            echo "Conexion Exitosa";
       }
       catch(PDOException $exception){
           echo "Error en la db ". $exception->getMessage();
       }
   }
}

