<?php


class Conexion
{


    function conexionbd(){
        $host = '127.0.0.1';
        $dbname = 'bd_certificado_iestp';
        $username = 'root';
        $pasword = '';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pasword);
            $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            echo ("Se conecto correctamente a la base de datos, error:$exp");
        }
    
    return $conn;
    }
}