<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombres=limpiar_cadena($_POST['nombre']);
$apelllido=limpiar_cadena($_POST['apellidos']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$cargo=limpiar_cadena($_POST['cargo']);
$rol=limpiar_cadena($_POST['rol']);

//esto me sirve para registrar un dato en la bd

$guardar_empleados = $start->conexionbd();
$guardar_empleados= $guardar_empleados->prepare(
    'insert into categoria values (:id,:nom,:ape,:cel,:correo,:carg,:rol)'
);
$array_empleados = [
    ":id"=>'DEFAULT',
    ":nom"=>$codigo,
    ":ape"=>$nombre,
    ":cel"=>$estado,
    ":correo"=>$f_inicio,
    ":carg"=>$f_fin,
    ":rol"=>$h_lectivas

];

$guardar_empleados->execute($array_empleados);
