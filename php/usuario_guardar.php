<?php
require_once "../conexion/coneccion.php";
require_once "./validadorsql.php";

$start = new Conexion();


$usuario=limpiar_cadena($_POST['usuario']);
$clave=limpiar_cadena($_POST['contrasena']);
$clavex2=limpiar_cadena($_POST['contrasena_duplicado']);

if($usuario==""){
    echo "!OOPSSS OCURRIO UN ERROR!, El usuario es obligatorio completar,error";
    exit();
}
if($clave==""){
    echo "!OOPSSS OCURRIO UN ERROR!,La contraseña es obligatorio completar,error";
    exit();
}
if($clavex2==""){
    echo "!OOPSSS OCURRIO UN ERROR!,Es obligatorio repetir la contraseña,error";
    exit();
}

//esto me sirve para registrar un dato en la bd

$guardar_usuario = $start->conexionbd();

$guardar_usuario= $guardar_usuario->prepare(
    'insert into usuario values (:id,:usu,:contra,:)'
);
$array_usuario= [
    ":id"=>'DEFAULT',
    ":usu"=>$usuario,
    ":contra"=>$clave
];

$guardar_usuario->execute($array_usuario);