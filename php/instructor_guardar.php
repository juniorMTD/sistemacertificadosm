<?php

require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombre=limpiar_cadena($_POST['nombres']);
$apellido=limpiar_cadena($_POST['apellidos']);
$generos=limpiar_cadena($_POST['genero']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$instruccion=limpiar_cadena($_POST['grado_instruccion']);
$firma=limpiar_cadena($_POST['firma_digital']);

//esto me sirve para registrar un dato en la bd

$guardar_instructor = $start->conexionbd();
$guardar_instructor= $guardar_instructor->prepare(
    'insert into categoria values (:id,:nom,:ape,:genero,:cel,:correo,:g_inst,:f_dig)'
);
$array_instructor = [
    ":id"=>'DEFAULT',
    ":nom"=>$nombre,
    ":ape"=>$apellido,
    ":genero"=>$generos,
    ":cel"=>$celular,
    ":correo"=>$correo,
    ":g_inst"=>$instruccion,
    ":f_dig"=>$firma

];

$guardar_instructor->execute($array_instructor);

