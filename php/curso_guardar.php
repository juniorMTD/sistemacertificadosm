<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$codigo=limpiar_cadena($_POST['curso_codigo']);
$nombre=limpiar_cadena($_POST['curso_nombre']);
$estado=limpiar_cadena($_POST['estado']);
$f_inicio=limpiar_cadena($_POST['inicio']);
$f_fin=limpiar_cadena($_POST['fin']);
$h_lectivas=limpiar_cadena($_POST['lectivas']);
$d_certificado=limpiar_cadena($_POST['disenio']);
$n_director=limpiar_cadena($_POST['nombre_director']);
$f_director=limpiar_cadena($_POST['firma_director']);
$n_especialista=limpiar_cadena($_POST['nombre_especialista']);
$f_especialesta=limpiar_cadena($_POST['firma_especialista']);
$n_instructor=limpiar_cadena($_POST['nombre_instructor']);
$f_instrucctor=limpiar_cadena($_POST['firma_instructor']);

//esto me sirve para registrar un dato en la bd

$guardar_curso = $start->conexionbd();
$guardar_curso= $guardar_curso->prepare(
    'insert into categoria values (:id,:cod,:c_nombre,:est,:ini,:fin,:lect,:dis,:n_dir,:f_dir,:n_espe,:f_espe,:n_inst,:f_inst)'
);
$array_curso = [
    ":id"=>'DEFAULT',
    ":cod"=>$codigo,
    ":c_nombre"=>$nombre,
    ":est"=>$estado,
    ":ini"=>$f_inicio,
    ":fin"=>$f_fin,
    ":lect"=>$h_lectivas,
    ":dis"=>$d_certificado,
    ":n_dir"=>$n_director,
    ":f_dir"=>$f_director,
    ":n_espe"=>$n_especialista,
    ":f_espe"=>$f_especialista,
    ":n_inst"=>$n_instructor,
    ":f_inst"=>$f_instructor,
];

$guardar_curso->execute($array_curso);
