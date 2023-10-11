<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();

$nombres=limpiar_cadena($_POST['nombre']);
$apellido=limpiar_cadena($_POST['apellidos']);
$celular=limpiar_cadena($_POST['celular']);
$correo=limpiar_cadena($_POST['correo']);
$cargo=limpiar_cadena($_POST['cargo']);

if($nombres==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El nombre es obligatorio completar,error";
    exit();
}
if($apellido==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El apellido es obligatorio completar,error";
    exit();
}
if($celular==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El número de celular es obligatorio completar,error";
    exit();
}
if($correo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El correo es obligatorio completar,error";
    exit();
}
if($cargo==""){
    echo "!OOPSSS OCURRIO UN ERROR!,El cargo es obligatorio completar,error";
    exit();
}

//esto me sirve para registrar un dato en la bd

$guardar_empleados = $start->conexionbd();
$guardar_empleados= $guardar_empleados->prepare(
    'insert into empleado values (:id,:nom,:ape,:cel,:corre,:carg)'
);
$array_empleados = [
    ":id"=>'DEFAULT',
    ":nom"=>$nombres,
    ":ape"=>$apellido,
    ":cel"=>$celular,
    ":corre"=>$correo,
    ":carg"=>$cargo
];

$guardar_empleados->execute($array_empleados);
if ($guardar_empleados->rowCount() == 1) {
    echo "!REGISTRADO!,Es usuario se registro correctamente,success";
    exit();
} else {
    echo "!OOPSSS OCURRIO UN ERROR!,No se registro al usuario,error";
}

