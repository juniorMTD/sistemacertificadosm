<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$usuario=limpiar_cadena($_POST['nombre']);


//esto me sirve para registrar un dato en la bd

$guardar_usuario = $start->conexionbd();

$guardar_usuario= $guardar_usuario->prepare(
    'insert into usuario values (:id,:nombre_modulo)'
);
$array_usuario= [
    ":id"=>'DEFAULT',
    ":nombre_modulo"=>$nombre,
];

$guardar_usuario->execute($array_usuario);