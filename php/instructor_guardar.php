<?php

require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombre=limpiar_cadena($_POST['nombres']);
$apellido=limpiar_cadena($_POST['apellidos']);
$instruccion=limpiar_cadena($_POST['grado_instruccion']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$firma=limpiar_cadena($_FILES['firma_digital']['name']);


if($nombre==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellido==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido es obligatorio completar,error";
    exit();
}
if($celular==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El celular es obligatorio completar,error";
    exit();
}
if($instruccion==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El instrucctor es obligatorio completar,error";
    exit();
}
if(empty($firma)){
    echo "!OOPSSS OCURRIO UN ERROR!,El firmar es obligatorio completar,error";
    exit();
}

//esto me sirve para registrar un dato en la bd

$guardar_instructor = $start->conexionbd();
$guardar_instructor= $guardar_instructor->prepare(
    'insert into categoria values (:id,:nom,:ape,g_inst,:cel,:correo,:f_dig,:genero)'
);
$array_instructor = [
    ":id"=>'DEFAULT',
    ":nom"=>$nombre,
    ":ape"=>$apellido,
    ":g_inst"=>$instruccion,
    ":cel"=>$celular,
    ":correo"=>$correo,
    ":f_dig"=>$firma,
    ":genero"=>$generos
    
];

$guardar_instructor->execute($array_instructor);

if ($guardar_instructor->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}

