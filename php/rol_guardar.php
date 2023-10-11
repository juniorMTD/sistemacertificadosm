<?php

require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$nombre_rol=limpiar_cadena($_POST['rol_nombre']);

if($nombre_rol==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}


//esto me sirve para registrar un dato en la bd
$guardar_rol = $start->conexionbd();
$guardar_rol= $guardar_rol->prepare(
    'insert into rol values (:id,:n)'
);
$array_rol = [
    ":id"=>'DEFAULT',
    ":n"=>$nombre_rol
];

$guardar_rol->execute($array_rol);









