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


if($nombre==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellido==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido es obligatorio completar,error";
    exit();
}
if($generos==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El genero es obligatorio completar,error";
    exit();
}
if($celular==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El celular es obligatorio completar,error";
    exit();
}
if($correo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El correo es obligatorio completar,error";
    exit();
}
if($instruccion==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El instrucctor es obligatorio completar,error";
    exit();
}
if($firma==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El firmar es obligatorio completar,error";
    exit();
}


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

if ($guardar_instructor->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}

