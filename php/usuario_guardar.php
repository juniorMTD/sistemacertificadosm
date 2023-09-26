<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$usuario=limpiar_cadena($_POST['usuario']);
$clave=limpiar_cadena($_POST['contrasena']);
$clavex2=limpiar_cadena($_POST['contrasena_duplicado']);

//esto me sirve para registrar un dato en la bd

$guardar_usuario = $start->conexionbd();
$guardar_usuario= $guardar_usuario->prepare(
    'insert into categoria values (:id,:usu,:contra,:contra_dupli)'
);
$array_usuario= [
    ":id"=>'DEFAULT',
    ":usu"=>$nombre,
    ":contra"=>$apellido,
    ":contra_dupli"=>$generos,
];

$guardar_usuario->execute($array_usuario);