<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$codigo=limpiar_cadena($_POST['curso_codigo']);
$nombre=limpiar_cadena($_POST['curso_nombre']);
$f_inicio=limpiar_cadena($_POST['inicio']);
$f_fin=limpiar_cadena($_POST['fin']);
$h_lectivas=limpiar_cadena($_POST['lectivas']);
$d_certificado=limpiar_cadena($_FILES['disenio']['name']);
$n_director=limpiar_cadena($_POST['nombre_director']);
$f_director=limpiar_cadena($_FILES['firma_director']['name']);
$n_especialista=limpiar_cadena($_POST['nombre_especialista']);
$f_especialista=limpiar_cadena($_FILES['firma_especialista']['name']);
$n_instructor=limpiar_cadena($_POST['nombre_instructor']);
$f_instructor=limpiar_cadena($_FILES['firma_instructor']['name']);

if($codigo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El codigo del curso es obligatorio completar,error";
    exit();
}
if($nombre==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del curso es obligatorio completar,error";
    exit();
}


if($f_inicio==""){
    echo "!OOPSSS OCURRIO UN ERROR!,La fecha de inicio es obligatorio completar,error";
    exit();
}
if($f_fin==""){
    echo "!OOPSSS OCURRIO UN ERROR!,La fecha fin es obligatorio completar,error";
    exit();
}
if($h_lectivas==""){
    echo "!OOPSSS OCURRIO UN ERROR!,Las horas lectivas es obligatorio completar,error";
    exit();
}
if(empty($d_certificado)){
    echo "!OOPSSS OCURRIO UN ERROR!,El diseño del certificado es obligatorio completar,error";
    exit();
}
if($nombn_director==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del director es obligatorio completar,error";
    exit();
}
if(empty($f_director)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del director es obligatorio completar,error";
    exit();
}
if($n_especialista==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del especialista es obligatorio completar,error";
    exit();
}
if(empty($f_especialista)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del especialista es obligatorio completar,error";
    exit();
}
if($n_instructor==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre del instructor es obligatorio completar,error";
    exit();
}
if(empty($f_instructor)){
    echo "!OOPSSS OCURRIO UN ERROR!,La firma del instructuor es obligatorio completar,error";
    exit();
}
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
